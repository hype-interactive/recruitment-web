<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    
    public function displayPost()
    {
        $blog_posts= BlogPost::latest()->take(3)->get();

        return view('about_us',['blog_posts'=>$blog_posts]);
    }
}
