<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->fname=$request->fname;
        $user->sname=$request->sname;
        $user->lname=$request->lname;
        $user->phone=$request->phone;

        if($user->save()) return back();
    }
}
