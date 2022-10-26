<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use Illuminate\Validation\Validator;
use App\Models\Region;
use App\Models\JobCategory;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Database\QueryException;

class JobPostController extends Controller
{
   

      protected $applications;
      protected $users;

     public function __construct(ApplicationController $applications,UserController $users)
     {
         $this->middleware('auth');
         $this->middleware('admin');
         $this->applications = $applications;
         $this->users = $users;

     }

    public function show()
    {
        $this_month=date('Y-m');

        //total application
        $total_applications=$this->applications->countApplications();
        //total signup
        $total_signups=$this->users->countUsers();
        //mothly_signups
        $monthly_signups=$this->users->countSignUpsMonthly($this_month);
        // $date = new date();
        //newpost monthly
        $monthly_posts=$this->countPostMonthly($this_month);
        //this month job seeker
        $monthly_job_seekers=$this->users->countNewApplicants($this_month);
        // var_dump($employers); exit();
        //total job seeker(applicant);
        $job_seekers=$this->users->countUserGroup('applicant');

        return view('admin/dashboard',['applications'=>$total_applications,'signups'=>$total_signups,'msignups'=>$monthly_signups,'mposts'=>$monthly_posts,'job_seekers'=>$job_seekers,'mseekers'=>$monthly_job_seekers]);
    }
    public function addJobPost(Request $request)
    {
        // var_dump($request->all()); exit();
        // dd($request->description);

        // $validator= Validator::make($request->all(),[ ]);
        // if($validator->fails()) return redirect()->back()->with("msg","Failed !".$validator->errors());

        $data = $this->setLocalStorage($request->title, $request->deadline);

        // dd($data);

        $job_post= new JobPost();
        $job_post->title= $request->title ? $request->title: 'NULL';
        $job_post->deadline = $request->deadline ? $request->deadline: 'NULL';
        $job_post->type= $request->type ? $request->type: 'Part time';
        $job_post->description = $request->description;
        $job_post->job_category_id = $request->category;
        $job_post->region_id = $request->region;

        if($job_post->save()) return redirect('/admin/job-posts')->with("msg","Job post added successfully");

    }

    public function createJobPostPanel()
    {
        $regions = Region::all();
        return view('admin/add_job_post',["regions"=>$regions,'job_categories'=>$this->getJobCategories()]);
    }

    public function editJobPost(Request $request)
    {

        $job_post= JobPost::find($request->job_post_id);
        $job_post->title= $request->title;
        $job_post->deadline = $request->deadline;
        $job_post->type= $request->type;
        $job_post->description = $request->description;
        $job_post->job_category_id = $request->job_category_id == "" ? $job_post->job_category_id : $request->job_category_id;
        $job_post->region_id = $request->region; 

        if($job_post->update()) return redirect(route('admin.job_posts'))->with('msg','Post updated successfully!');

    }

    public function deleteJobPost(Request $request)
    {
        $post=JobPost::find($request->post_id);

        try {
            $post->delete();
        } catch (QueryException $e) {
            
            return back()->with('msg','This post can not be deleted');
        }
        return back()->with('msg','Post deleted successfully');

    }

    public function getJobPosts()
    {
        $job_posts= JobPost::with('jobCategory','region')->latest()->get();
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

    public function getJobCategories()
    {
        return JobCategory::all();
    }
    
    public function countPostMonthly($month){
        $post=JobPost::where('created_at','like', $month.'%')->get();
        return count($post);
    }

    // Helper functions
    public function setLocalStorage($jobTitle, $jobDeadline)
    {
        return "<script>
                    localStorage.setItem('job_title', {$jobTitle});
                    localStorage.setItem('job_deadline', {$jobDeadline});
                </script>";
    }
}
