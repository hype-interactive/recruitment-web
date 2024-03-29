<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmission;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }                                                                                   

    public function showPanel($post_id)
    {
        $application=Application::with('applicationDocument')->where('job_post_id','=',$post_id)->where('user_id','=',Auth::user()->id)->get();
        $post=JobPost::find($post_id);
        if(count($application) != 0){
            return view('application_form',['post'=> $post,'application' => $application]);
        }else{
            return view('application_form',['post'=>$post]);
        }
    }

    public function add(Request $request)
    {

        $document= app('App\Http\Controllers\ApplicationDocumentController')->add($request);
        if($document){

            $user = User::find(Auth::user()->id);
            $user->type="applicant";

            $application = new Application();
            $application->user_id=$request->user_id;
            $application->job_post_id=$request->post_id;
            $application->application_document_id=$document->id;

            if($application->save() && $user->update()){
                try {
                    Mail::to($user->email)->send(new ApplicationSubmission($user, $application->jobPost)); // send email to user informing successful application submission

                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }
                return back()->with('msg','You have successfully submitted application');
            } 
        }

        return back()->with('msg','Failed to submit application');
    }
}
