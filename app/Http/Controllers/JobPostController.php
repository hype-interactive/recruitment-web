<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Region;
use App\Models\JobCategory;
use Illuminate\Validation\Validator;
use phpDocumentor\Reflection\Types\Null_;

class JobPostController extends Controller
{
    public function getJobPosts(Request $request=NULL)
    {
        $regions= Region::all();
        $industries=JobCategory::all();
        $job_posts=$this->getPostsData(20);
        return view('jobs',['regions'=>$regions,'industries'=>$industries,'job_posts'=>$job_posts]);
    }
    public function getJobPost($job_post_id)
    {
        $post=JobPost::with('region','jobCategory')->find($job_post_id);
        return view('job',['post'=>$post]);
    }


    public function getPostsData($limit)
    {
        $job_posts=JobPost::latest()->take($limit)->get();
        return $job_posts;
    }

    public function searchJobs(Request $request)
    {
        $jobs=JobPost::with('region','jobCategory')->where('title','LIKE','%'. $request->q.'%')->get();

        echo \json_encode($jobs);
    }
}
