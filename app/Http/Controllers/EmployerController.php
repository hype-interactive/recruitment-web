<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function create(Request $request)
    {
        $employer= new Employer();
        $employer->name=$request->name;
        $employer->email=$request->email;

        if($employer->save()) return back();
    }
}
