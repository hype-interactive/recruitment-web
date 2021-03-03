@extends('layouts.master_layout')
@section('page-summary')
    <b>{{$application->user->fname}}'s Application Details</b>
@endsection
@section('body')
<div class="container">
    <div class="application-wrapper">
        <div class="personal-info row">
            <h5>Personal Informations</h5>
            <div class="col-md-3">
                <div class="avatar">
                    <img src="{{asset('images/icons/man-user.svg')}}" alt="">
                </div>
            </div>
            <div class="col-md-9">
                <div class="col">
                    First Name:  {{$application->user->fname}}
                </div>
                <div class="col">
                    Second Name: {{$application->user->sname}}
                </div>
                <div class="col">
                    Last Name : {{$application->user->lname}}
                </div>
            </div>
        </div>
        <div class="row documents">
            <h5>Documents</h5>
            <div class="row">
                <div class="col">
                    <b>CV</b>
                </div>
                <div class="col">
                    <b>Letter</b>
                </div>
                <div class="col">
                    <b>Certificate</b>
                </div>
            </div>

        </div>
        <div class="row actions">
            <h5>Action</h5>
            <div class="row">
                <div class="col">
                    <button class="btn btn-success">Accept</button>
                </div>
                <div class="col">
                    <button class="btn btn-danger">Reject</button>
                    
                </div>
                <div class="col">
                    <button class="btn btn-orange">Reserve</button>

                </div>
            </div>
        </div>
    </div>
</div>
    {{$application}}
@endsection