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

        return view('home', compact(
            'massTimings',
            'institutions',
            'bishop',
            'parishPriest',
            'assistantParishPriest'
        ));
    }
}
