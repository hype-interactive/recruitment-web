<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Staff;

class BlogPostController extends Controller
{
    
    public function displayPost()
    {
        $staffs = Staff::get();
        $blog_posts= BlogPost::latest()->take(3)->get();
        return view('about_us', 
            [
                'blog_posts' => $blog_posts,
                'staffs' => $staffs
            ]
        );
    }

    public function getPost($post_id)
    {
        $post=BlogPost::find($post_id);

        return view('blog_post',['post'=>$post]);
    }
}
