<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Region;
use App\Models\JobCategory;
use Illuminate\Validation\Validator;
class JobPostController extends Controller
{
    public function getJopPosts()
    {
        // $regions= Region::all();
        // $industies=JobCategory::all();
        // $job_posts=$this->getPostsData(20);
        // return view('jobs',['regions'=>$regions,'industies'=>$industies,'job_posts'=>$job_posts]);
        return view('jobs');
    }

    public function getPostsData($limit)
    {
        // $job_posts=JobPost::latest()->take($limit)->get();
        return "";
    }
}
