<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
use App\Http\Requests\CreateInviteRequest;
use App\Models\Guest;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $take = $request->input('take') ?? 15;

        return response()
            ->json(
                Invite::with('guests')->simplePaginate($take)
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInviteRequest $request)
    {
        $invite = $this->createInvite();
        $invite = $this->createGuests($invite, $request->input('guests'));
        $invite->load('guests');
        return $invite;
    }

    private function createInvite()
    {
        $invite = Invite::create();
        $code = 1000 + $invite->id;
        $invite['code'] = (string)$code;
        $invite->save();

        return $invite;
    }

    private function createGuests(Invite $invite, array $guests)
    {
        $invite->guests()->createMany($guests);
        return $invite;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function show(Invite $invite)
    {
        $invite->load('guests');

        return response()->json($invite);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function update(CreateInviteRequest $request, Invite $invite)
    {
        $guests = $request->input('guests');
        $current_guests = $this->filterGuests($guests, true);
        $new_guests = $this->filterGuests($guests, false);

        if (count($current_guests)) {
            $this->updateGuests($current_guests);

            $guests_to_delete = $this->getGuestsToDelete($invite, $current_guests);
            if (count($guests_to_delete)) {
                $this->deleteGuests($guests_to_delete);
            }
        }

        if (count($new_guests)) {
            $this->createGuests($invite, $new_guests);
        }

        return Invite::with('guests')->find($invite->id);
    }

    private function filterGuests($guests, $has_id)
    {
        return array_filter($guests, function ($guest) use ($has_id) {
            return $has_id === !empty($guest['id']);
        });
    }

    private function getGuestsToDelete(Invite $invite, array $new_guests)
    {
        $invite->load('guests');

        $to_delete = [];

        foreach ($invite->guests as $guest) {
            $new_guests_contains_guest = count(array_filter($new_guests, function ($new_guest) use ($guest) {
                return $new_guest['id'] === $guest->id;
            }));

            if (!$new_guests_contains_guest) {
                $to_delete[] = $guest;
            }
        }

        return $to_delete;
    }

    private function deleteGuests(array $guests)
    {
        foreach ($guests as $guest) {
            $guest->delete();
        }
    }

    private function updateGuests(array $guests)
    {
        foreach ($guests as $guest) {
            $guest_model = Guest::findOrFail($guest['id']);
            $guest_model->fill($guest);
            $guest_model->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invite $invite)
    {
        $invite->delete();
        return response()->json(['message' => 'Success']);
    }
}
