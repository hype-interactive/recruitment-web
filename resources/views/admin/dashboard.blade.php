@extends('layouts.master_layout')
@section('page-summary')
    <div>
        <h2>Hello , John</h2>
        <p>Mollit nulla eu labore do mollit commodo culpa culpa adipisicing.</p>
    </div>
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
                        70000
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
                        70000
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
                        70000
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
                        70000
                    </div>
                    <small>Total Employers</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/bulb-blue.svg')}}" alt="">
                    </div>
                        70000
                    </div>
                    <small>Total New Post</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-card">
                    <div class="d-card-header">
                    <div class="image">
                        <img src="{{asset('images/icons/trend.svg')}}" alt="">
                    </div>
                        70000
                    </div>
                    <small>Total Application</small>
                </div>
            </div>
            
        </div>
    </div>
@endsection