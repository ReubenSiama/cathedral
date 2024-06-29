<?php

namespace App\Http\Controllers;

use App\Models\Parish;

class StationsController extends Controller
{
    public function show(Parish $parish)
    {
        return view('stations.show', compact('parish'));
    }
}
