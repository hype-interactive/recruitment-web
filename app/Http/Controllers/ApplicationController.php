<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function showPanel($post_id)
    {
        return view('application_form');
    }
}
