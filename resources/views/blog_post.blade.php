@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="blog_post_wrapper">
            <div class="card blog-post-card">
                <img src="{{asset('storage/'.$post->image)}}" class="card-img-top" alt="..." >
                <div class="card-body">
                  <h2 class="card-title">{{$post->link}}</h2>
                  <p class="card-text">{{$post->caption}}</p>
                </div>
              </div>
        </div>
    </div>
@endsection