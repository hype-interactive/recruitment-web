<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\ImageOptimizer\OptimizerChainFactory;

use App\Models\Staff;

class StaffController extends Controller
{
    public function manage()
    {
        $staffs = Staff::all();
        return view('admin.staff.staff', compact('staffs'));
    }

    public function displayAddStaffPanel()
    {
        return view('admin.staff.add_staff');
    }

    public function addStaff(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('msg', 'Please fill all the fields.');
        }

        $staff = new Staff();
        $staff->fname = $request->fname;
        $staff->mname = $request->mname;
        $staff->lname = $request->lname;
        $staff->title = $request->title;
        $staff->description = $request->description ? $request->description : 'Staff';
        $staff->is_director = $request->is_director ? 1 : 0;

        if ($request->hasFile('image')) {
            // $image = $request->file('image');
            // $name = time() . '.' . $image->getClientOriginalExtension();
            // $destinationPath = public_path('/images/staff');
            // $image->move($destinationPath, $name);
            // $staff->image = $name;

            $image = $request->image->store('public/staff_img');
            $staff->image = $image;
            $pathToImage = Storage::path($image);
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($pathToImage);
        } else {
            return redirect()->back()->with('msg', 'Failed to upload photo');
        }

        $staff->save();

        return redirect()->route('admin.manage_staff')->with('msg', 'Staff created successfully.');
    }

    public function displayEditStaffPanel($id)
    {
        $staff = Staff::find($id);

        if ($staff) {
            return view('admin.staff.edit_staff', ['staff' => $staff]);
        } else {
            return redirect()->back()->with('msg', 'Staff not found!');
        }
    }

    public function editStaff(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $staff = Staff::find($request->staff_id);

        if (!$staff) return redirect()->back()->with('msg', 'Staff not found');

        $staff->fname = $request->fname;
        $staff->mname = $request->mname;
        $staff->lname = $request->lname;
        $staff->description = $request->description ? $request->description : 'Staff';
        $staff->title = $request->title;
        $staff->is_director = $request->is_director ? 1 : 0;
        
        if ($request->hasFile('updated_image')) {

            $image = $request->updated_image->store('public/staff_img');
            $staff->image = $image;
            $pathToImage = Storage::path($image);
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($pathToImage);
        } else {
            return redirect()->back()->with('msg', 'Failed to upload photo');
        }

        $staff->save();

        return redirect()->route('admin.manage_staff')->with('msg', 'Staff edited successfully.');
    }
}
