<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
// use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer as FacadesImageOptimizer;

use Illuminate\Support\Facades\Validator;

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
        // dd($request->all());
        $validator=Validator::make($request->all(),[

            'image' => 'required|mimes:jpg,png,jpeg,image/jpeg,image/png',
        ]);

        if($validator->fails()) return back()->with('msg','Entered image of invalid type. Try again');

        $post = new BlogPost();
        $post->title = $request->title;
        $post->caption = $request->caption;

        // dd($request->all());

        if($request->hasFile('image')){
            $path = $request->image->store('public/uploaded_img');
            // dd($path);
            $post->image = $path;
            $pathToImage = Storage::path($path);
            $optimizer = OptimizerChainFactory::create();
            $optimizer->optimize($pathToImage);

            // FacadesImageOptimizer::optimize($pathToImage);
        } else {
            return redirect('admin/blog_posts')->with('msg','Failed to upload photo');
        }

        if($post->save()) return redirect('admin/blog_posts')->with('msg','Post created successfully!');
    }

    public function editPost(Request $request)
    {

        if($request->post_id  != Null){
            $post= BlogPost::find($request->post_id);
            $post->title = $request->title;
            $post->caption = $request->caption;
            if($request->hasFile('image')){
                $path=$request->image->store('public/uploaded_img');
                $post->image=$path;
                $this->deleteStored($request->old_photo);
            } else {
                return redirect('admin/blog_posts')->with('msg','Failed to upload photo');
            }
        }

        if($post->update()) return redirect('admin/blog_posts')->with('msg','Post updated successfully!');

    }

    public function deletePost(Request $request)
    {
        // var_dump($request->post_id); exit();
        $post=BlogPost::find($request->post_id);
        $this->deleteStored($post->image);
        if($post->delete()) return back()->with('msg','Post deleted successfully');

    }

    public function deleteStored($path)
    {
            Storage::delete($path);
            return true;
    }

}


