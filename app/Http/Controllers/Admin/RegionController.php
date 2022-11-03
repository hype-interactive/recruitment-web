<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function addRegion(Request $request)
    {
        if (Region::where('name', $request->region)->count() <= 0) {
            $region = new Region();
            $region->name = $request->region;
            if($region->save()) return back()->with('msg','Region created successfully');
        } else {
            return back()->with('msg', 'Region already exists');
        }
    }
}
