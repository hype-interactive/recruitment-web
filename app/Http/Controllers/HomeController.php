<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $job_posts=app('App\Http\Controllers\JobPostController')->getPostsData(8);
        return view('home',['posts'=>$job_posts]);
    }
}
