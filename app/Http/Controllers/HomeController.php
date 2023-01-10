<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\JobCategory;
use App\Models\BlogPost;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Admin\ApplicationController;

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
        $blog_posts= BlogPost::latest()->take(3)->get();

        $applications = app('App\Http\Controllers\Admin\ApplicationController')->countApplications();
        // dd($applications);

        // var_dump(count($blog_posts)); exit();
        $job_posts = app('App\Http\Controllers\JobPostController')->getPostsData(8);
        return view('home', 
        [
            'posts'=>$job_posts,
            'regions'=>$regions,
            'categories'=>$categories,
            'blog_posts'=> $blog_posts,
            'applications'=>$applications
        ]);
    }
}
