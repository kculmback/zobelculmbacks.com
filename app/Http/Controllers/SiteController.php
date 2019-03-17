<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function comingSoon()
    {
        return view('comingSoon');
    }

    public function main(Request $request)
    {
        $name = $request->route()->getName() ?? 'default';
        $meta_title = config("metadata.title.{$name}");
        $meta_description = config("metadata.description.{$name}");
        return view('main')->with(compact('meta_title', 'meta_description'));
    }
}
