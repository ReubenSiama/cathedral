<?php

namespace App\Http\Controllers;

use App\Models\NewsInfo;
use Illuminate\Http\Request;

class NewsInfoController extends Controller
{
    public function index()
    {
        $publications = NewsInfo::latest()->paginate(10);
        return view('pages.publications', compact('publications'));
    }
}
