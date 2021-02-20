<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;


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

        return view('admin/application',['application'=> $application]);
    }

    public function searchApplication(Request $request )
    {
        $application = Application::where('status','LIKE','%'. $request->q.'%')->take(20)->get();
        
		echo \json_encode($application);

    }

}
