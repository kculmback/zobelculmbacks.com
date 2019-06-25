<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invite;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $take = $request->input('take') ?? 15;
        $status = $request->input('status');

        // $closure = function ($query) use ($status) {
        //     if ($status === 'yes') {
        //         $query->rsvpedYes();
        //     } elseif ($status === 'no') {
        //         $query->rsvpedNo();
        //     } elseif ($status === 'hasnt') {
        //         $query->hasntRsvped();
        //     }
        // };

        // $invites = Invite::whereHas('guests', $closure)
        //     ->with(['guests' => $closure])
        //     ->get();
        if ($status = 'yes') {
            $query = Guest::rsvpedYes();
        } elseif ($status === 'no') {
            $query = Guest::rsvpedNo();
        } else {
            $query = Guest::hasntRsvped();
        }
        $invites = $query
            ->orderBy('updated_at', 'desc')
            ->get()
            ->groupBy('invite_id');

        return response()->json(['invites' => $invites]);
    }

    public function getCount(Request $request)
    {
        $status = $request->input('status');

        if ($status === 'yes') {
            $count = count(Guest::rsvpedYes()->get());
        } else if ($status === 'no') {
            $count = count(Guest::rsvpedNo()->get());
        } else if ($status === 'hasnt') {
            $count = count(Guest::hasntRsvped()->get());
        } else {
            $count = count(Guest::all());
        }

        return response()->json(['count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
