@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="jobs-header">
            <div class="search-bar">
                
                <div class="industry">
                    <select class="custom-select">
                        <option value="" selected>Industry</option>
                        @foreach ($industies as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="location">
                    <select class="custom-select">
                        <option selected>Location</option>
                        @foreach ($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="location">
                    <select class="custom-select">
                        <option selected>Time</option>
                        <option value="1">Latest</option>
                        <option value="2">This week</option>
                        <option value="3">This month</option>
                    </select>
                </div>
                <div class="search-box">
                    <input type="text">
                    <img src="{{asset('images/icons/loupe.svg')}}" alt="">
                </div> 
                <div class="search-button">
                    SEARCH
            </div> 
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="row">
               @foreach ($job_posts as $post)
                   <div class="col-md-12">
                    <div class="banner">
                        <div class="row">
                            <div class="col-md-9">
                                <b>{{$post->jobCategory->name}}</b>
                                <ul>
                                    <li class="location"><img src="{{asset('images/icons/location.svg')}}" alt="">{{$post->region->name}}</li>
                                    {{-- <li class="location"><img src="{{asset('images/icons/briefcase-frontal-view.svg')}}" alt=""> Senior</li> --}}
                                    <li class="location"><img src="{{asset('images/icons/signal-level.svg')}}" alt=""> Internship</li>
                                </ul>
                            </div>
                            <div class="col-md-3 sm-wrapper">
                                <p>{{$post->type}}</p>
                            </div>
                        </div>
                        <div class="triangle"></div>
                        <small>{{getElapsedTime($post->created_at)}}</small>
                        <div class="snowflake">
                            <img src="{{asset('images/icons/star.svg')}}" alt="">
                        </div>
                    </div>
                   </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection
