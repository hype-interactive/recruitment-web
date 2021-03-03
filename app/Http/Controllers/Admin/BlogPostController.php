<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\JobPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function show()
    {
        $posts= BlogPost::all();
        return view('admin/blog_posts',['posts'=>$posts]);
    }

    public function displayAddPostPanel()
    {
        return view('admin/add_blog_post');
    }
    public function displayEditPostPanel($id)
    {
        $post=BlogPost::find($id);
        return view('admin/edit_blog_post',['post'=>$post]);
    }

    public function addPost(Request $request )
    {
        $post = new BlogPost();
        $post->link = $request->title;
        $post->caption = $request->caption;
        if($request->hasFile('image')){
            $path=$request->image->store('/public/uploaded');
            $path_to_upload=substr($path,7);
            $post->image=$path_to_upload;
        }

        if($post->save()) return redirect('admin/blog_posts');
    }

    public function editPost(Request $request)
    {
        // delete previous image from storage
        if($request->post_id  != Null){
            $post= BlogPost::find($request->post_id);
            $post->link = $request->title;
            $post->caption = $request->caption;
            if($request->hasFile('image')){
                $path=$request->image->store('/public/uploaded');
                $path_to_upload=substr($path,7);
                $post->image=$path_to_upload;
            }
        }

        if($post->update()) return redirect('admin/blog_posts');

    }
}


