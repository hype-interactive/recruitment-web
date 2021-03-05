<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\App;

class ApplicationController extends Controller
{
    public function getJobPostApplications($job_post_id)
    {
        $applications=Application::with('user')->where('job_post_id',$job_post_id)->latest()->get();
        return $applications;
    }

    public function getApplication($application_id)
    {
        $application=Application::find($application_id);

        // var_dump($application->applicationDocument->type); exit();
        return view('admin/application',['application'=> $application]);
    }

   public function countApplications()
   {
       $applications=Application::all();
       return count($applications);
   }

    public function searchApplication(Request $request )
    {
        if($request->q == "_all"){
             $application = Application::with('user')->take(20)->get();
        }
        if($request->q == "_selected" or $request->q == "_rejected" or $request->q == "_reserved") {
            $value = substr($request->q,1);
            $application = Application::with('user')->where('status','Like','%'.$value.'%')->take(20)->get();

        }
        else{
        // $application = Application::with('user')->where('status','LIKE','%'. $request->q.'%')->take(20)->get();
        $application=Application::with(['user' => function($query , $request){
            $query->where('fname','like','%'. $request->q.'%')->or_where('lname','like','%'.$request->q.'%');
        }])->take(20)->get();

        }
        
		echo \json_encode($application);

    }

    public function accept($application_id)
    {
        $application= Application::find($application_id);
        $application->status="selected";
        if($application->update()) return back();
    }

    public function reject($application_id)
    {
        $application= Application::find($application_id);
        $application->status="rejected";
        if($application->update()) return back();
    }

    public function reserve($application_id)
    {
        $application= Application::find($application_id);
        $application->status="reserved";
        if($application->update()) return back();
    }

}
