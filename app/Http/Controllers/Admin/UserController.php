<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function countSignupsMonthly($month)
    {
        $users=User::where('created_at','like',$month.'%')->get();
        return count($users);
    }
    public function countUsers()
    {
        $users=User::all();
        return count($users);
    }
    public function countUserGroup($user_type){
        $users=User::where('type',$user_type)->get();
        return count($users);
    }
    public function countNewApplicants($month){
        $applicants=User::where('type','=','applicant')->where('updated_at','like','%'.$month.'%')->get();

        return count($applicants);
    }
     public function manage()
     {
         $users=User::where('type','=','admin')->orWhere('type','=','root')->get();
        return view('admin.users_management' ,['users'=>$users]);
     }
     public function addAdmin(Request $request)
     {
         $user=User::where('email','=',$request->email)->first();
         $user->type="admin";
         if($user->update()) return back()->with('msg','admin created successful');
     }

     public function revoke(Request $request)
     {

         $user=User::find($request->post_id);
         $user->type ="other";
         
         if($user->update()) return back()->with('msg','Admin Revoked !');

     }
}
