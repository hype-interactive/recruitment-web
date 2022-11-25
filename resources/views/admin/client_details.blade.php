@extends('layouts.master_layout')
@section('page-summary')
    <b>{{ $user->fname }} {{ $user->lname }}'s Details</b>
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
                            <span>First Name : </span> {{$user->fname}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cell">
                        <span>Second Name : </span>  {{$user->sname}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cell">
                        <span>Last Name : </span> {{$user->lname}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="cell">
                            <span>Email : </span> {{$user->email}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cell">
                        <span>Phone : </span> {{$user->phone}}
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
        <div class="personal-info row">
            <h5>Applications</h5>
            <div class="user-table applicant">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($user->applications); $i++)
                        <tr>
                            <th scope="row">{{$i + 1}}</th>
                            <td>{{$user->applications[$i]->jobPost->title}}</td>
                            <td class="{{$user->applications[$i]->status == "rejected" ? "red": ($user->applications[$i]->status == "selected" ? "green":""  ) }}">{{$user->applications[$i]->status}}</td>
                            <td><a href="{{ route('admin.application', $user->applications[$i]->id) }}">View</a></td>
                        </tr> 
                        @endfor
                </table>
            </div>
        </div>
    </div>
</div>
@endsection