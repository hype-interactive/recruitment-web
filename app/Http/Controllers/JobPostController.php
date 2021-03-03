<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Region;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use phpDocumentor\Reflection\Types\Null_;

class JobPostController extends Controller
{
    public function getJobPosts(Request $request )
    {
        // var_dump($request->all()); exit();

        if($request->all() != null){
            // var_dump("here"); exit();
            $job_posts=$this->getPostsData(20,$request->region_id, $request->category_id);
        }else {
            $job_posts=$this->getPostsData(20);
        
        }
        $regions= Region::all();
        $industries=JobCategory::all();
        return view('jobs',['regions'=>$regions,'industries'=>$industries,'job_posts'=>$job_posts]);
    }
    public function getJobPost($job_post_id)
    {
        $post=JobPost::with('region','jobCategory')->find($job_post_id);
        return view('job',['post'=>$post]);
    }


    public function getPostsData($limit , $region_id = null , $category_id = null)
    {
        // $query=DB::table('job_posts');
        // if($region_id){
        //     $query->where('region_id','=',$region_id);
        // }
        // if($category_id ){
        //     $query->where('job_category_id','=',$category_id);
        // }
        
        // $results = $query
        //         ->select('job_posts.*','regions.name','job_categories.name')
        //         ->join('regions','job_posts.region_id','=','regions.id')
        //         ->join('job_categories','job_posts.job_category_id','=','job_categories.id')
        //         ->take($limit)->get();

        // var_dump($results[0]); exit();
        $results=JobPost::latest()->take($limit)->get();
        return $results;
    }

    public function searchJobs(Request $request)
    {
        // if($request->q[0] == 0){
        //     $without_identifire=substr($request->q,4);
        //     // $filter_array= explode(",",$without_identifire);
        //     // $jobs=[$without_identifire];
        //     $jobs=DB::table('job_posts')
        //             ->join('regions','job_posts.region_id','=','regions.id')
        //             ->join('job_categories','job_categories.id','=','job_posts.job_category_id')
        //             ->select('job_posts.*','regions.name','job_categories.name')
        //             ->whereIn('region_id',[$without_identifire])->get();

        //     echo \json_encode($jobs);

        // }

        $jobs=JobPost::with('region','jobCategory')->where('title','LIKE','%'. $request->q.'%')->get();

        echo \json_encode($jobs);
    }


}
// $jobs = Job::select()
//         ->where(‘id’, ‘>’, 0);
// If($request->region_1){
//      $jobs = $cart->orWhere(‘region’,$request->region_1)
// }

// If($request->region_2){
//      $jobs = $cart->orWhere(‘region’,$request->region_2)
// }

// $jobs = $jobs->get();