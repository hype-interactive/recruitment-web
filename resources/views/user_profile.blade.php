@extends('layouts.app')
@section('body')
<div class="container">
    <div class="user-profile-wrapper">
        <div class="row ">
            <div class="col-md-4">
                <div class="avatar">
                    <img src="{{asset('images/icons/man-user.svg')}}" alt="">

                    <b>{{Auth::user()->fname}} {{Auth::user()->lname}}</b>
                    <small>{{Auth::user()->type}}</small>
                </div>

            </div>
            <driv class="col-md-8">
                <ul class="user-info">
                    <li><b>Name</b> <p>{{Auth::user()->fname}} {{Auth::user()->sname}} {{Auth::user()->lname}}</p></li>
                    <li><b>Email</b><p>{{Auth::user()->email}}</p></li>
                    <li><b>Phone</b><p>{{Auth::user()->phone}}</p></li>
                    <li>   
                        <div class="mv-collapse">
                        <div id="accordion">
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <b class="mb-0">
                                  <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >
                                    Reset Password
                                     <img src="{{asset('images/icons/arrow-down.svg')}}" alt="">
                                  </a>
                                </b>
                              </div>
                              <div id="collapseTwo" class="collapse"  aria-labelledby="headingTwo" data-parent="#accordion" >
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
                                            {{-- @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $error->message }}</strong>
                                            </span>
                                            @endif --}}
                                        </div>  
                                        <div>
                                            <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                            @error('password-confirm')
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
                </div></li>
                </ul>
            </driv>

        </div>
        @if ($applications ?? '')
            <div class="row ">
                @foreach ($applications as $application)
                    <div class="col-md-6 ma-t-2 ">
                        <div class="profile-card">
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{route('job_post',$application->id)}}">
                                        <small><b>{{Str::limit($application->jobPost->title,55)}}</b></small>
                                    </a>
                                    <p><small>{{$application->jobPost->jobCategory->name}}</small></p>
                                    <hr>
                                    <small>{{$application->jobPost->region->name}}</small>
                                </div>
                                <div class="col-md-3">
                                    <img class="{{$application->status}}" src="{{asset('images/icons/'.($application->status == 'selected' ? 'tick.svg' :($application->status == 'rejected' ? 'cross.svg' : ($application->status == 'reserved' ? 'hold.svg':'no-action.svg'))))}}" alt="">
                                    <small>{{$application->status ? $application->status : "No Action"}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
            
    </div>
</div>
<script>

</script>
@endsection