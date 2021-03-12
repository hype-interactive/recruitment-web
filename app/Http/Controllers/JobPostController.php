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

        if($request->region_id != "null" || $request->category_id != "null" || $request->keyword != null){

            $job_posts=$this->getPostsData(20,$request->region_id, $request->category_id, $request->keyword);
        }else {

            $job_posts=$this->getPostsData(20);
        
        }
        //get regions tagged from post only
        
        $regions= Region::all();

        $industries=JobCategory::all();
        return view('jobs',['regions'=>$regions,'industries'=>$industries,'job_posts'=>$job_posts]);
    }
    public function getJobPost($job_post_id)
    {
        $post=JobPost::with('region','jobCategory')->find($job_post_id);
        // var_dump($job_post_id); exit();
        return view('job',['post'=>$post]);
    }


    public function getPostsData($limit , $region_id = null , $category_id = null , $keyword = null)
    {

        $query=JobPost::query();
        if($region_id != "null" && $region_id != null){
            $query->where('region_id','=',$region_id);
        }
        if($category_id != "null" && $category_id != null){
            $query->where('job_category_id','=',$category_id);
        }
        if($keyword != null){
            $query->where('title','like','%'.$keyword.'%');
        }
        $results = $query->whereDate('deadline','>=',date('Y-m-d'))->take($limit)->get();

        return $results;
    }

    public function searchJobs(Request $request)
    {

        if(strlen($request->q) >4){

            // $query=JobPost::query();

            if(str_starts_with($request->q,'000')){

                $jobs=JobPost::with('region','jobCategory')->whereIn('region_id',$this->makeArray($request->q))->latest()->get();
                // $query->whereIn('region_id',$this->makeArray($request->q));
            }
            if(str_starts_with($request->q,'111')){

                $jobs=JobPost::with('region','jobCategory')->whereIn('job_category_id',$this->makeArray($request->q))->latest()->get();
                // $query->whereIn('job_category_id',$this->makeArray($request->q));
            }
            if(str_starts_with($request->q,'222')){
                $single=substr($request->q,4);
                if(strlen($single) < 2 ){

                    $jobs=JobPost::with('region','jobCategory')->where('type','like','%'.$single.'%')->latest()->get();
                }else {

                    $jobs=JobPost::with('region','jobCategory')->where('type','Part time')->orWhere('type','Full time')->latest()->get();

                }

            }
            echo \json_encode($jobs);   

            // $query->with('region','jobCategory')->latest()->get();

            // echo \json_encode($query);   
        }else {
            $jobs=JobPost::with('region','jobCategory')->where('title','like','%'.$request->q.'%')->latest()->get();
            echo \json_encode($jobs);
        }



    }

    public function makeArray($str)
    {
                $filter_str=substr($str,4);
                return explode(",",$filter_str);
    }
}
