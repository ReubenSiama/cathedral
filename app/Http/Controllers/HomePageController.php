<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function index()
    {
        $massTimings = \App\Models\MassTiming::all();
        $institutions = \App\Models\Institution::all();
        $about = \App\Models\Setting::where('key', 'history-of-aizawl-diocese')->first();
        $banner = \App\Models\Setting::where('key', 'banner')->first();
        $stationsIntro = \App\Models\Setting::where('key', 'stations-intro')->first();
        $stations = \App\Models\Parish::all();

        return view('home', compact(
            'massTimings',
            'institutions',
            'about',
            'banner',
            'stationsIntro',
            'stations'
        ));
    }

    public function aboutUs()
    {
        $about = \App\Models\Setting::where('key', 'history-of-aizawl-diocese')->first();

        return view('pages.about-us', compact('about'));
    }
}
