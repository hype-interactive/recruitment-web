<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function countSignupsMonthly($month)
    {
        $users=User::where('created_at','like',$month.'%')->get();
        return count($users);
    }
    public function countUsers()
    {
        $users = User::all();
        return count($users);
    }

    public function countUserGroup($user_type){
        $users = User::where('type',$user_type)->get();
        return count($users);
    }

    public function countNewApplicants($month){
        $applicants=User::where('type','=','applicant')->where('updated_at','like','%'.$month.'%')->get();

        return count($applicants);
    }

    public function manage()
    {
        $users = User::where('type','=','admin')->orWhere('type','=','root')->get();
    return view('admin.users_management' ,['users'=>$users]);
    }

    public function addAdmin(Request $request)
    {
        // $user=User::where('email','=',$request->email)->first();
        // $user->type="admin";
        $user = User::where('fname', $request->fname)->where('lname', $request->lname)->where('email', $request->email)->first();
        if ($user) {
            $user->type = "admin";
            if($user->update()) return redirect()->back()->with('success', 'Admin added successfully');
        } else {
            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->email);
            $user->type = "admin";
            // $user->save();
            if($user->save()) return back()->with('msg','Admin created successfully');
        }
    }

    public function revoke(Request $request)
    {

        $user=User::find($request->post_id);
        $user->type ="other";
        
        if($user->update()) return back()->with('msg','Admin Revoked !');

    }

    // Client Management
    public function clientManagement()
    {
        $users = User::where('type','=','applicant')->orWhere('type', '=', 'other')->get();
        return view('admin.client_management',['users'=>$users]);
    }

    public function getClientDetails($id)
    {
        $user = User::find($id);
        return view('admin.client_details',['user'=>$user]);
    }
}
