@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="blog_post_wrapper">
            <div class="card blog-post-card">
                <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="..." >
                <div class="card-body">
                  <h4 class="card-title">{{$post->title}}</h4>
                  <hr>
                  <p class="card-text">{!!$post->caption!!}</p>
                </div>
              </div>
        </div>
    </div>
@endsection