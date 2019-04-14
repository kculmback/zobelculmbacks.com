<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class RsvpController extends Controller
{
    public function search(Request $request)
    {
        try {
            $results = Guest::search($request->input('q'))->get();
        } catch (\Exception $error) {
            if ($error instanceof \GuzzleHttp\Exception\ConnectException) {
                return response()->json(['message' => 'timeout', 408]);
            } else {
                return $error;
            }
        }

        return $results;
    }
}
