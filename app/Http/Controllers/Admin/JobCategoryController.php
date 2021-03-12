<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class JobCategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        $jobCategory=new JobCategory();
        $jobCategory->name= $request->category;
        if($jobCategory->save()) return back()->with('msg','Job category created successfully');
    }
}
