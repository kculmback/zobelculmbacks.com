<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function comingSoon()
    {
        return view('comingSoon');
    }

    public function main()
    {
        return view('main');
    }
}