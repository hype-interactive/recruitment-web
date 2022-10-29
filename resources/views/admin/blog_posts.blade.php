@extends('layouts.master_layout')
@section('page-summary')
    <b>Blog Posts</b>
@endsection
@section('body')
<div class="container">
    <div class="blog-posts row">
        @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card " >
                    <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <div class="card-text">{!!Str::limit($post->caption,50)!!}</div>
                    <small>
                        <a href="{{route('admin.edit_blog_post_panel',$post->id)}}">
                            <img src="{{asset('images/icons/edit.svg')}}" alt="" class="small-icon">
                        </a>
                            <span class="gray">|</span> 
                        <a class="modal_btn" data-bs-id="{{$post->id}}" data-bs-toggle="modal" data-bs-target="#delete_post">
                            <img src="{{asset('images/icons/bin.svg')}}" alt="" class="small-icon">
                        </a>
                    </small>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
    <a class="add-post-button" href="{{route('admin.add_blog_post_panel')}}">
        <img  src="{{asset('images/icons/plus.svg')}}" alt="">
    </a>

  
  <!--Delete Modal -->

<div class="modal fade" id="delete_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title text-danger" id="exampleModalLabel">Are you sure ,You want to DELETE this post</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <form action="{{route('admin.delete_blog_post')}}" method="post">
              @csrf
            <input type="hidden" name="post_id" id="data_id">
            <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection