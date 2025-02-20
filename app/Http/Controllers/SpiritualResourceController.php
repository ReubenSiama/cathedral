<?php

namespace App\Http\Controllers;

use App\Models\SpiritualResource;
use App\Models\SpiritualResourceCategory;

class SpiritualResourceController extends Controller
{
    public function index(SpiritualResourceCategory $spiritualResourceCategory)
    {
        $spiritualResources = SpiritualResource::where('spiritual_resource_category_id', $spiritualResourceCategory->id)
            ->paginate(10);
        return view('pages.spiritual-resource', compact('spiritualResources', 'spiritualResourceCategory'));
    }

    public function show(SpiritualResourceCategory $spiritualResourceCategory, SpiritualResource $spiritualResource)
    {
        $title = $spiritualResource->title;
        return view('pages.spiritual-resource-view', compact('spiritualResource', 'title'));
    }
}
