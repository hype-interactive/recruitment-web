<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;

use App\Models\Document;
use App\Models\UserDocument;
use App\Models\EducationRecord;
use App\Models\ProfessionalCertificationRecord as ProfessionalRecord;
use App\Models\ExperienceRecord;

use Illuminate\Support\Facades\Log;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->fname=$request->fname;
        $user->sname=$request->sname;
        $user->lname=$request->lname;
        $user->phone=$request->phone;

        if($user->save()) return back()->with('msg','Successful updated information');
    }

    public function getUser()
    {
        $user_id=Auth::user()->id;
        $applications= Application::where('user_id','=',$user_id)->latest()->get();
        // var_dump($applications[0]->jobPost); exit();
        return view('user_profile',['applications'=>$applications]);
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required_with:password_confirmation|string|confirmed'
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Validation Failed');

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return redirect()->back()->with('msg', 'Your current password is incorrect');
        };

        if ($user->update(['password' => Hash::make($request->password)])) {
            return redirect()->back()->with('msg', 'Password changed successfully');
        } else return redirect()->back()->with('msg', 'Failed to change password');
    }

    // User Profile Documents to be added here
    public function completeProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->type = 'applicant';
        $user->date_of_birth = $request->date_of_birth ? $request->date_of_birth : NULL;
        
        DB::transaction(function () use ($request, $user) {
            
            $user->save();
            $user_id = $user->id;

            //store education records
            $this->createEducationRecord($user_id,$request->institution_name,$request->study_level,$request->education_start_date,$request->education_end_date,$request);

            // store professional records
            $profession = new ProfessionalRecord;
            $profession->name=$request->certification_name;
            // $profession->institution_name=$request->profession_institute;
            $profession->user_id= $user_id;
            $profession->start_date = $request->certification_start_date;
            $profession->end_date = $request->certification_end_date;

            if(!$profession->save()){
                Log::error("Professional Record failed to be recorded ///".$request);
            }
            
            // store experience records 
            // Note job_title refers to profession name of the applicant at the area of work
            $this->createExperienceRecord($user_id,$request->employment_company,$request->job_title,$request->experience_start_date,$request->experience_end_date,$request);

            // store documents
            if($request->hasFile('edu_certificate')) $this->createDocumentRecord($user_id,'edu_certificate',$request);
            if($request->hasFile('prof_certificate')) $this->createDocumentRecord($user_id,'prof_certificate',$request);
            
        });

        return redirect()->back()->with('msg','Profile completed successfully');
    }

    public function createEducationRecord($user_id, $institution_name, $study_level,$start_date, $end_date, $request)
    {
        $education = new EducationRecord;
        $education->institution_name=$institution_name;
        $education->study_level=$study_level;
        $education->start_date=$start_date;
        $education->end_date=$end_date;
        $education->user_id=$user_id;

        if(!$education->save()) {
            Log::error("Education Record failed to be recorded ///".$request);
        }
    }

    public function createExperienceRecord($user_id,$company,$profession_name,$start_date,$end_date,$request)
    {
        $employment= new ExperienceRecord;
        $employment->company_name=$company;
        $employment->profession_name=$profession_name;
        $employment->start_date=$start_date;
        $employment->end_date=$end_date;
        $employment->user_id=$user_id;

        if(!$employment->save()) {
            Log::error("Employment   failed to be recorded ///".$request);
        }

    }

    public function createDocumentRecord($user_id,$doc_name,$request)
    {
        $doc = new Document;
        $name = $request->file($doc_name)->getClientOriginalName();
        $doc->name = $name;
        $doc->path = $request->file($doc_name)->storeAs('public/applicants/documents', $name);
        $doc->owner = 'applicant';
        if($doc->save()){

            UserDocument::insert([
                'type'=> $doc_name == "edu_certificate" ? 'educational_certificate' : 'professional_certificate',
                'user_id' => $user_id,
                'document_id' => $doc->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        else{

            Log::error("Document   failed to be recorded ///".$request);

        }
    }
}
