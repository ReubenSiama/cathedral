<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function index()
    {
        $massTimings = \App\Models\MassTiming::all();
        $institutions = \App\Models\Institution::all();

        return view('home', compact('massTimings', 'institutions'));
    }
}
