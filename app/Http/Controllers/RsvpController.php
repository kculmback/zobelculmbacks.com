<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Invite;
use App\Http\Requests\RsvpRequest;
use App\Events\Rsvp;

class RsvpController extends Controller
{
    public function search(Request $request)
    {
        try {
            $results = Guest::search($request->input('q'))->get();
        } catch (\GuzzleHttp\Exception\ConnectException $error) {
            return response()->json(['message' => 'timeout'], 408);
        } catch (\Exception $error) {
            return $error;
        }

        return $results;
    }

    public function getInvite(Invite $invite)
    {
        $invite->load('guests');
        return $invite;
    }

    public function updateInvite(Invite $invite, RsvpRequest $request)
    {
        $guests = $request->input('guests');

        foreach ($guests as $guest) {
            $guest_model = $invite->guests()->find($guest['id']);
            if (!empty($guest_model)) {
                $guest_model->rsvp = $guest['rsvp'];
                $guest_model->save();
            }
        }

        $invite->load('guests');
        event(new Rsvp($invite));

        return $invite;
    }
}
