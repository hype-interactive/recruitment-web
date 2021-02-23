@extends('layouts.master_layout')
@section('page-summary')
        <div class="left">
            <h2>Jop Post</h2>
            <p>Sometimes you may not have terminal access of server-hosted Laravel application. You may not much </p>
        </div>
        <div class="right">
            <img src="{{asset('images/icons/settings.svg')}}" alt="">
        </div>
@endsection
@section('body')
    <div class=" row post-list">
        @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <div class="category-icon">
                            <img src="{{asset('images/icons/bag.svg')}}" alt="">
                        </div>
                        {{$post->jobCategory->name}}
                    </div>
                    @if (strlen($post->title)>75)
                        <?php $title = substr($post->title, 0,75) . " .....  ...." ?>
                        <p>{{$title}}</p>
                    @else
                        <p>{{$post->title}}</p>
                    @endif
                    <hr>
                    <div class="card-footer">
                        <div>{{$post->region->name}}</div>
                        <div><a href="{{route('admin.post',$post->id)}}"> View </a> <span class="gray">|</span> <a href="{{route('admin.edit_post_panel',$post->id)}}">Edit</a></div>
                    </div>
                    <div class="triangle"></div>
                </div>
            </div>
        @endforeach

    </div>
    <a class="add-post-button" href="/add-job-post">
        <img  src="{{asset('images/icons/plus.svg')}}" alt="">
    </a>
    
@endsection