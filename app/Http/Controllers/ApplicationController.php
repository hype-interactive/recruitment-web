<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function showPanel($post_id)
    {

        return view('application_form');
    }
}
