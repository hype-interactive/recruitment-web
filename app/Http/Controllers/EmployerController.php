<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email|unique:employers,email',
            'address' => 'required|string',
            'message' => 'nullable',
            'meeting_request' => 'required'
        ]);

        if($validator->fails()) return redirect()->back()->with("msg","Failed, please fill the form correctly!");

        $employer= new Employer();
        $employer->name = $request->company_name;
        $employer->phone = $request->phone;
        $employer->email = $request->email;
        $employer->address = $request->address;
        $employer->message = $request->message ? $request->message : NULL;
        $employer->requested_meeting = $request->meeting_request ? 1 : 0;

        if($employer->save()) return back()->with('msg', 'Welcome!');
    }
}
