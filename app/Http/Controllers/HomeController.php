<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\JobCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $regions=Region::all();
        $categories= JobCategory::all();

        $job_posts=app('App\Http\Controllers\JobPostController')->getPostsData(8);
        return view('home',['posts'=>$job_posts,'regions'=>$regions,'categories'=>$categories]);
    }
}
