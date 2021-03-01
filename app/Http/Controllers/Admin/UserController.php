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
        $applicants=User::where(array(['type','applicant'],['created_at','like',$month.'%']))->get();
        return count($applicants);
    }
}
