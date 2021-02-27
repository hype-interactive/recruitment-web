<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use Illuminate\Validation\Validator;
use App\Models\Region;
use App\Models\JobCategory;

class JobPostController extends Controller
{
     
    public function show()
    {
        return view('admin/dashboard');
    }
    public function addJobPost(Request $request)
    {
        // var_dump($request->all()); exit();

        // $validator= Validator::make($request->all(),[ ]);
        // if($validator->fails()) return redirect()->back()->with("msg","Failed !".$validator->errors());
        $job_post= new JobPost();
        $job_post->title= $request->title;
        $job_post->deadline = $request->deadline;
        $job_post->type= $request->type;
        $job_post->description = $request->description;
        $job_post->job_category_id = $request->category;
        $job_post->region_id = $request->region;

        if($job_post->save()) return redirect()->back()->with("msg","job post added successfully");

    }

    public function createJobPost()
    {
        $regions = Region::all();

        return view('admin/add_job_post',["regions"=>$regions,'job_categories'=>$this->getJobCategories()]);
    }

    public function editJobPost(Request $request)
    {
        // $validator= Validator::make($request->all(),[ ]);

        $job_post= JobPost::find($request->job_post_id);
        // var_dump($request->job_category_id); exit();
        $job_post->title= $request->title;
        $job_post->deadline = $request->deadline;
        $job_post->type= $request->type;
        $job_post->description = $request->description;
        $job_post->job_category_id = $request->job_category_id == "" ? $job_post->job_category_id : $request->job_category_id;
        $job_post->region_id = $request->region; 

        if($job_post->update()) return redirect(route('admin.job_posts'));

    }

    public function getJobPosts()
    {
        $job_posts= JobPost::with('jobCategory','region')->latest()->get();
        // var_dump($job_posts[0]->title); exit();
        return view('admin/job_posts',['posts' => $job_posts]);
    }

    public function getJobPost($job_post_id)
    {
        $job_post=JobPost::find($job_post_id);
        $applications= app('App\Http\Controllers\Admin\ApplicationController')->getJobPostApplications($job_post_id);

        // var_dump($applications);

        return view('admin/post',['post'=> $job_post, 'applications'=>$applications]);

    }

    public function showEditPostPanel($job_post_id)
    {
        $regions = Region::all();
        $job_post=JobPost::find($job_post_id);
        return view('admin/edit_job_post',['post'=>$job_post,'regions'=>$regions,'job_categories'=>$this->getJobCategories()]);
    }

    public function deleteJobPost($job_post_id)
    {
        # code...
    }

    public function getJobCategories()
    {
        return JobCategory::all();
    }
}
