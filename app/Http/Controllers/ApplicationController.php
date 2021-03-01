<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function _contruct(){
        $this->middleware('auth');
    }

    public function showPanel($post_id)
    {
        return view('application_form');
    }
}
