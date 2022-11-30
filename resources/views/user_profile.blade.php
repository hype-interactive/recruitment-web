@extends('layouts.app')
@section('body')
<div class="container">
    <div class="user-profile-wrapper">
        <div class="row ">
            <div class="col-md-4">
                <div class="profile-avatar">
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
                </div></li>
                </ul>
            </driv>

        </div>

        <!-- Add more information Section & Modal -->
        <div class="col-xs-8 col-xs-offset-5 col-md-12 text-center">
            <button type="" class="btn btn-orange btn-lg" data-bs-toggle="modal" data-bs-target="#form-modal" onclick="$('#response').hide();">
                Complete your profile
            </button>
        </div>

        @if ($applications ?? '')
            <div class="row">
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

<!-- Modal -->
<div class="profile-modal">
    <div class="modal fade" id="form-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="">

                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Complete your profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="cool-form">
                            <div id="multi-step-form-container">
                                <!-- Form Steps / Progress Bar -->
                                <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                                    <!-- Step 1 -->
                                    <li class="form-stepper-active text-center form-stepper-list" step="1">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle">
                                                <span>1</span>
                                            </span>
                                            <div class="label">Educational Information</div>
                                        </a>
                                    </li>
                                    <!-- Step 2 -->
                                    <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle text-muted">
                                                <span>2</span>
                                            </span>
                                            <div class="label text-muted">Professional Certifications</div>
                                        </a>
                                    </li>
                                    <!-- Step 3 -->
                                    <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                                        <a class="mx-2">
                                            <span class="form-stepper-circle text-muted">
                                                <span>3</span>
                                            </span>
                                            <div class="label text-muted">Experience Background</div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Step Wise Form Content -->
                                <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST" action="{{ route('complete_user_profile') }}">
                                    @csrf
                                    <!-- Step 1 Content -->
                                    <section id="step-1" class="form-step">
                                        <h2 class="font-normal fs">Educational Information</h2>
                                        <!-- Step 1 input fields -->
                                        <div class="mt-3">
                                            <div class="row mb-2">
                                                <div class="col-md-12">
                                                    <label for="exampleFormControlInput1" class="form-label">Instution Name</label>
                                                    <input type="text" name="institution_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1" class="form-label">Level of Study</label>
                                                    <input type="text" name="study_level" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1" class="form-label">Certificate Attachment</label>
                                                    <input type="file" name="edu_certificate" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-6 ">
                                                    <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                                                    <input type="date" name="education_start_date" class="form-control" >
                                                </div>
                                                <div class="col-md-6 phone-mt">
                                                    <label for="exampleFormControlInput1" class="form-label">End Date</label>
                                                    <input type="date" name="education_end_date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                                        </div>
                                    </section>
                                    <!-- Step 2 Content, default hidden on page load. -->
                                    <section id="step-2" class="form-step d-none">
                                        <h2 class="font-normal fs">Professional Certifications</h2>
                                        <!-- Step 2 input fields -->
                                        <div class="mt-3">
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1" class="form-label">Certification Name</label>
                                                    <input type="text" name="certification_name" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1" class="form-label">Institute</label>
                                                    <input type="text" name="profession_institute" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-12">
                                                    <label for="exampleFormControlInput1" class="form-label">Certificate Attachment</label>
                                                    <input type="file" name="prof_certificate" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-6 ">
                                                    <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                                                    <input type="date" name="certification_start_date" class="form-control" >
                                                </div>
                                                <div class="col-md-6 phone-mt">
                                                    <label for="exampleFormControlInput1" class="form-label">End Date</label>
                                                    <input type="date" name="certification_end_date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                                            <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                                        </div>
                                    </section>
                                    <!-- Step 3 Content, default hidden on page load. -->
                                    <section id="step-3" class="form-step d-none">
                                        <h2 class="font-normal fs">Experience Background</h2>
                                        <!-- Step 3 input fields -->
                                        <div class="mt-3">
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" name="employment_company"  >
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1" class="form-label">Profession Name/Title</label>
                                                    <input type="text" class="form-control" name="job_title"  >
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1" class="form-label">Start Date</label>
                                                    <input type="date" name="experience_start_date" class="form-control">
                                                </div>
                                                <div class="col-md-6 phone-mt">
                                                    <label for="exampleFormControlInput1" class="form-label">End Date</label>
                                                    <input type="date" name="experience_end_date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-4 d-flex align-items-center">
                                                <div class="col-md-6">
                                                    <h6>Addional Information (Optional)</h6>
                                                    <label for="exampleFormControlInput1" class="form-label">Date of Birth (Optional)</label>
                                                    <input type="date" name="date_of_birth" class="form-control" aria-describedby="dobHelper">
                                                    <div id="dobHelper" class="form-text">We take your birthdate for purely statistical reasons and will not share it with other sources without your consent.</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="checkbox" name="privacy_consent" class="form-check-input" id="privacy_checkout" aria-describedby="privacy">
                                                    <label for="privacy_checkout" class="form-check-label">
                                                        I consent to Privacy Policy at <a href="">Terms and Conditions</a>
                                                    </label>
                                                    <div class="form-text" id="privacy">
                                                        Check this box to agree to privacy policy and terms of use. We will not share your information with any third party without your consent.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                                            <button class="button submit-btn btn-orange" type="submit">Save</button>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
@endsection