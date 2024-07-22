<?php

namespace App\Http\Controllers;

class HomePageController extends Controller
{
    public function index()
    {
        $massTimings = \App\Models\MassTiming::all();
        $institutions = \App\Models\Institution::institutions()->get();
        $about = \App\Models\Setting::where('key', 'history-of-aizawl-diocese')->first();
        $banner = \App\Models\Setting::where('key', 'banner')->first();
        $stationsIntro = \App\Models\Setting::where('key', 'stations-intro')->first();
        $stations = \App\Models\Parish::displayAtHomepage()->get();

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

    public function parishPastoralCouncil()
    {
        $parishPastoralCouncil = \App\Models\Setting::where('key', 'parish-pastoral-council')->first();

        return view('pages.parish-pastoral-council', compact('parishPastoralCouncil'));
    }

    public function bishopsAndPriests()
    {
        $bishops = \App\Models\Bishop::display()->orderBy('order')->get();
        $parishPriests = \App\Models\PriestInParish::parishPriest()->get();
        $assistantParishPriests = \App\Models\PriestInParish::assistantPriest()->get();

        return view('pages.bishops-and-priests', compact('bishops', 'parishPriests', 'assistantParishPriests'));
    }

    public function religiousAndCatechists()
    {
        $dioceseCatechists = \App\Models\Catechist::diocese()->get();
        $localTillNow = \App\Models\Catechist::localTillNow()->first();
        $localPast = \App\Models\Catechist::pastLocal()->get();
        $localCatechistWriteup = \App\Models\Setting::where('key', 'local-catechists-writeup')->first();

        $parishSisters = \App\Models\ParishMissionary::sisters()->get();
        $parishBrothers = \App\Models\ParishMissionary::brothers()->get();
        $parishPriests = \App\Models\ParishMissionary::priests()->get();

        return view('pages.religious-and-catechists', compact(
            'dioceseCatechists',
            'localTillNow',
            'localPast',
            'localCatechistWriteup',
            'parishSisters',
            'parishBrothers',
            'parishPriests'
        ));
    }

    public function institutions()
    {
        $institutions = \App\Models\Institution::institutions()->get();
        $title = 'Institutions';

        return view('pages.institutions', compact('institutions', 'title'));
    }

    public function others()
    {
        $institutions = \App\Models\Institution::others()->get();
        $title = 'Others';

        return view('pages.institutions', compact('institutions', 'title'));
    }

    public function associations()
    {
        return view('pages.associations');
    }
}
