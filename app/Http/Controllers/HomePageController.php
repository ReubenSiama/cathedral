<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function index()
    {
        $massTimings = \App\Models\MassTiming::all();
        $institutions = \App\Models\Institution::all();
        $bishop = \App\Models\Bishop::current();
        $parishPriest = \App\Models\Priest::parishPriest();
        $assistantParishPriest = \App\Models\Priest::assistantParishPriest();
        $about = \App\Models\Setting::where('key', 'history-of-aizawl-diocese')->first();

        return view('home', compact(
            'massTimings',
            'institutions',
            'bishop',
            'parishPriest',
            'assistantParishPriest',
            'about'
        ));
    }

    public function aboutUs()
    {
        $about = \App\Models\Setting::where('key', 'history-of-aizawl-diocese')->first();

        return view('pages.about-us', compact('about'));
    }
}
