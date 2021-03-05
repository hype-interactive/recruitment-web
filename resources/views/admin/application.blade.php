@extends('layouts.master_layout')
@section('page-summary')
    <b>{{$application->user->fname}}'s Application Details</b>
    <div class="right">
        <b>{{$application->status}}</b>
    </div>
@endsection
@section('body')
<div class="container">
    <div class="application-wrapper">
        <div class="personal-info row">
            <div class="col-md-2">
                <div class="avatar">
                    <img src="{{asset('images/icons/man-user.svg')}}" alt="">
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <div class="cell">
                         <span>First Name : </span> {{$application->user->fname}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cell">
                        <span>Second Name : </span>  {{$application->user->sname}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cell">
                        <span>Last Name : </span> {{$application->user->lname}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="cell">
                            <span>Email : </span> {{$application->user->email}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cell">
                        <span>Phone : </span> {{$application->user->phone}}
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
        <div class="row documents">

            <div class="row">
                <div class="col-md-2">
                    <div class="icon">
                        <img src="{{asset('images/icons/paper.svg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                            <div class="col-md-4 document-box">
                                <div><span>{{$application->applicationDocument->type}}:</span>  <small>{{$application->applicationDocument->name}}</small></div>
                                <hr>
                                <div class="documents-btn">
                                    <button class="btn btn-success" onclick="downloadFile()">Download</button>
                                    <button class="btn btn-orange">view</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
{{-- <a href="{{route('download',$application->application_document_id)}}"> hapa</a> --}}
        </div>
        <div class="row actions">
            <div class="col-md-2">
                <h1>Action</h1>
            </div>
            <div class="col-md-10">
                <div class="row action-btn">
                    <div class="col-md-4">
                        <a href="{{route('admin.accept',$application->id)}}">
                            <button class="btn btn-success">Accept</button>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('admin.reject',$application->id)}}">
                            <button class="btn btn-danger">Reject</button>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('admin.reserve',$application->id)}}">
                            <button class="btn btn-orange">Reserve</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function downloadFile() {

        <?php 
        $file=$application->applicationDocument->path;
        Storage::disk('public')->download($file);
        ?>
        
    }
</script>
    {{-- {{$application}} --}}
@endsection