<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SongsRequest;
use App\Models\Song;

class SongsController extends Controller
{
    public function add(SongsRequest $request)
    {
        $songs = $request->input('songs');

        foreach ($songs as $song) {
            $new_song = new Song();
            $new_song->name = $song['name'];
            $new_song->artist = $song['artist'];
            $new_song->save();
        }

        return response(['message' => 'success']);
    }
}
