<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        if(Str::startsWith($request->q,'000')){
            $str=substr($request->q,3);
            $jobs=JobPost::with('region','jobCategory')->where('title','like','%'.$str.'%')->whereDate('deadline','>=',date('Y-m-d'))->latest()->get();
            echo \json_encode($jobs);
        }else{

            $regions = array();
            $job_categories = array();
            $working_hours = array();
            foreach (explode(",",$request->q) as $item) {

                if($this->lastChar($item)== 'T'){
                    array_push($working_hours, $this->getId($item));

                }
                if($this->lastChar($item)== 'C'){
                    array_push($job_categories, $this->getId($item));
                }
                if($this->lastChar($item)== 'R'){
                    array_push($regions, $this->getId($item));
                }
                
            }

            $query = JobPost::query(); 

            if(count($regions)!=0){
                $query->whereIn('region_id',$regions);
            }
            if(count($job_categories)!=0 ){
                $query->whereIn('job_category_id',$job_categories);
            }
            if(count($working_hours) != 0 && count($working_hours) < 2){
                if($working_hours[0] == "1"){
                    $query->where('type','Full time');
                }else{
                    $query->where('type','Part time');
                }
            }

            $jobs = $query->with('region','jobCategory')
                    ->whereDate('deadline','>=',date('Y-m-d'))
                    ->get();

            echo \json_encode($jobs);
        }

    }

    public function destroyArray($array)
    {
        global $array;
        unset($array);
    }

    public function lastChar($str)
    {
        return substr($str,-1);
    }
    public function getId($str)
    {
        return substr($str,0,-1);
    }
    public function makeArray($str)
    {
                $filter_str=substr($str,4);
                return explode(",",$filter_str);
    }
}
