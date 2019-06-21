<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $take = $request->input('take') ?? 15;
        $status = $request->input('status');

        if ($status === 'yes') {
            $guests = Guest::rsvpedYes()->get();
        } else if ($status === 'no') {
            $guests = Guest::rsvpedNo()->get();
        } else if ($status === 'hasnt') {
            $guests = Guest::hasntRsvped()->get();
        } else {
            $guests = Guest::all();
        }

        return response()->json(['guests' => $guests]);
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
