@extends('layouts.master_layout')
@section('page-summary')
    <b>Manage your profile</b>
@endsection

@section('body')
<div class="container">
    <div class="user-profile-wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-avatar">
                    <img src="{{asset('images/icons/man-user.svg')}}" alt="">

                    <b>{{Auth::user()->fname}} {{Auth::user()->lname}}</b>
                    <small>{{Auth::user()->type}}</small>
                </div>
            </div>

            <div class="col-md-8">
                <ul class="user-info">
                    <li>
                        <b>Name</b> <p>{{ Auth::user()->fname }} {{ Auth::user()->sname }} {{ Auth::user()->lname }}</p>
                    </li>
                    <li><b>Email</b><p>{{Auth::user()->email}}</p></li>
                    <li><b>Phone</b><p>{{Auth::user()->phone}}</p></li>
                    <li>   
                        <div class="mv-collapse">
                            <div id="accordion">
                                <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <b class="mb-0">
                                    <a class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >
                                        Reset Password
                                        <img src="{{asset('images/icons/arrowdown.svg')}}" alt="">
                                    </a>
                                    </b>
                                </div>
                                <div id="collapseTwo" class="collapse"  aria-labelledby="headingTwo" data-bs-parent="#accordion" >
                                    <form action="{{route('reset_password')}}" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div>
                                                <input name="old_password"  type="password" placeholder="Enter Old Password" autocomplete="old-password">
                                                @error('old_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div>
                                                <input name="password" id="password" class=" @error('password') is-invalid @enderror" type="password" required autocomplete="new-password"  placeholder="Enter New Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @if($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $error->message }}</strong>
                                                </span>
                                                @endif
                                            </div>  
                                            <div>
                                                <input id="password_confirmation" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="btn btn-orange" type="submit">Submit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection