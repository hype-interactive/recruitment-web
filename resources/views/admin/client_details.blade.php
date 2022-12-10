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
            @if (count($user->applications) <= 0)
                <h5>No Applications</h5>
            @else
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
            @endif

            @if (count($user->subscriptions) > 0)
                <h5>Subscriptions</h5>
                <div class="user-table applicant">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Service</th>
                                <th scope="col">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($user->subscriptions); $i++)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$user->subscriptions[$i]->service_name}}</td>
                                <td>{{$user->subscriptions[$i]->message}}</td>
                            </tr> 
                            @endfor
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection