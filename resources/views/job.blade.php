@extends('layouts.app')
@section('body')
<div class="container">
    <div class="job-card">
        <div class="job-header">
            <div class="title">
                <h4>{{$post->title}}</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img class="small-icon" src="{{asset('images/icons/location.svg')}}" alt="">
                    <span>{{$post->region->name}}</span>
                </div> 
                <div class="col-md-4">
                    <img class="small-icon" src="{{asset('images/icons/briefcase-frontal-view.svg')}}" alt="">
                    <span>{{$post->type}}</span>
                </div>
                <div class="col-md-4">
                    <img class="small-icon" src="{{asset('images/icons/clock.svg')}}" alt="">
                    <span>{{date_format(date_create($post->deadline),"d-M-Y")}}</span>
                </div> 
            </div>
        </div>
        <div class="body">
            <b>Job category</b>
            <p style="margin-left: 2rem">{{$post->jobCategory->name}}</p>
            <b>Description</b>
            <div class="description-panel">
                {!!trans($post->description)!!}
            </div>
            <a href="{{route('application_panel',$post->id)}}"><button class="btn btn-orange" > Apply</button></a>
        </div>

    </div>

</div>
    
@endsection