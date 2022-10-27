<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class UserController extends Controller
{
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
        // // var_dump($request->old_password); exit();
        // $validator = Validator::make($request->all(),[

        //     'old_password'=> 'required|min:8',
        //     'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|confirmed',
        //     'password_confirmed' => 'required| same:password'
        // ]);

        // // if($validator->fails()){
        // //     return response()->json($validator->errors(),400);
        // // } 

        // // if ($validator->fails()) return response()->json(['response' => 'error', 'message' => 'Validation Error', 'error' => $validator->errors()]);

        // // dd($request->all());
        // if($validator->fails()) back()->with('msg','Entered invalid detail');

        // $user_id = Auth::user()->id;
        // // dd($user_id);
        // $user = User::find($user_id);

        // if(Hash::check($user->password, $request->old_password) ) return back()->with('error','Old password is Incorrect!');

        // $user->password = Hash::make($request->password);
        // if($user->update()) return back()->with('msg','Password Reset Successful !');

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
}
