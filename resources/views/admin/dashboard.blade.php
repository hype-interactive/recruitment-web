@extends('layouts.master_layout')
@section('page-summary')
        <h2>Hello , John</h2>
@endsection
@section('body')
    <div class="container">
        <div class="row dashboard">
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/trend.svg')}}" alt="">
                    </div>
                        {{$applications}}
                    </div>
                    <small>Total Application</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/users.svg')}}" alt="">
                    </div>
                        {{$signups}}
                    </div>
                    <small>Total Sign-ups</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/paper.svg')}}" alt="">
                    </div>
                        {{$job_seekers}}
                    </div>
                    <small>Total Job Seeker</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/tower-block.svg')}}" alt="">
                    </div>
                        {{$mposts}}
                    </div>
                    <small>This Month Job Posts</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/bulb-blue.svg')}}" alt="">
                    </div>
                        {{$msignups}}
                    </div>
                    <small>This Month Sign-ups</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/trend.svg')}}" alt="">
                    </div>
                        {{$mseekers}}
                    </div>
                    <small>This Month Job Seekers</small>
                </div>
            </div>
            
        </div>
    </div>
@endsection