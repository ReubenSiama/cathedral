<?php

namespace App\Http\Controllers;

use App\Models\Parish;
use App\Models\Setting;

class StationsController extends Controller
{
    public function index()
    {
        $stations = Parish::all();
        $stationsIntro = Setting::where('key', 'stations-intro')->first();

        return view('pages.stations', compact('stations', 'stationsIntro'));
    }

    public function show(Parish $parish)
    {
        return view('stations.show', compact('parish'));
    }
}
