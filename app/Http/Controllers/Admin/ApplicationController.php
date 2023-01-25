<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatus;

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
             $application = Application::with('user')->get();
        }

        if($request->q == "_selected" || $request->q == "_rejected" || $request->q == "_reserved") {

            $value = substr($request->q,1);
            $application = Application::with('user')->where('status','Like','%'.$value.'%')->get();
        }
        else{
            $application=Application::with(['user' => function($query )use($request){
            $query->where('fname','like','%'. $request->q.'%')->orWhere('lname','like','%'.$request->q.'%');
        }])->get();

        }

        
		echo \json_encode($application);

    }

    public function accept($application_id)
    {
        $application = Application::find($application_id);
        $application->status="selected";
        if($application->update()) {
            try {
                Mail::to($application->user->email)->send(new ApplicationStatus($application->user, $application->status, $application->jobPost));

            } catch (\Throwable $th) {
                Log::error($th->getMessage());
            }
            return back();
        } 

    }

    public function reject($application_id)
    {
        $application= Application::find($application_id);
        $application->status="rejected";
        if($application->update()) {
            try {
                Mail::to($application->user->email)->send(new ApplicationStatus($application->user, $application->status, $application->jobPost));
            } catch (\Throwable $th) {
                throw $th;
            }
            return back();
        } 
    }

    public function reserve($application_id)
    {
        $application= Application::find($application_id);
        $application->status="reserved";
        if($application->update()) {
            try {
                Mail::to($application->user->email)->send(new ApplicationStatus($application->user, $application->status, $application->jobPost));
            } catch (\Throwable $th) {
                throw $th;
            }
            return back();
        }
    }

}
