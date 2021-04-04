@extends('layouts.app')
@section('body')
@if ($application ?? '')
    <div class="container">
        <div class="warning">
            You have already applied !, <br> Wait for Your Application progress
        </div>
    </div>
@else
<div class="form-header-wrapper">
    <h3>{{$post->title}}</h3>
</div>
    <div class="container">
        <div class="application-form-wrapper">
            <div class="personal-info">
                <div class="panel-header">
                    <img src="{{asset('images/icons/man-user.svg')}}" alt="">
                </div>
                <form action="{{route('update_user')}}" method="POST">
                    @csrf
                    <div class="panel-body">
                            <div class="form-row">
                                <div class="col">
                                    First Name: <input type="text" name="fname" value="{{Auth::user()->fname}}" required>
                                </div>
                                <div class="col">
                                    Second Name: <input type="text" name="sname" value="{{Auth::user()->sname}}" required>
                                </div>
                                <div class="col">
                                    last Name: <input type="text" name="lname" value="{{Auth::user()->lname}}" required>
                                </div>
                                <div class="col">
                                    Phone: <input type="phone" name="phone" value="{{Auth::user()->phone}}" required>
                                </div>
                                <div class="col" >
                                    Email: <input type="email" value="{{Auth::user()->email}}" disabled>
                                </div>
                            </div>
                    </div>
                    <input type="hidden" name="user_id" value={{Auth::user()->id}}>
                    <h5 class="hd-tl">Personal Informatrion:</h5>
                    <button class="btn btn-orange ft-br" type="submit">Save Changes</button>
                </form>
            </div>
            <form action="{{route('add_document')}}" method="post" enctype="multipart/form-data">
                <div class="documents">
                        @csrf
                        <div class="document">
                            <div class="row">
                                <div class="col-md-1">CV</div>
                                <div class="col-md-2">
                                    <input style="width: 5.7rem" type="file" class="custom-file-input" id="customFile" name="file" accept="application/pdf" required>
                                </div>
                                <div class="col-md-9">
                                    <input class="w-75" type="tex"  src="" alt="" placeholder="file name" name="file_name" value="{{($application ?? '' )? ($application[0]->applicationDocument->name):""}}">
                                    <img class="desktop_item" src="{{asset('images/icons/attachment.svg')}}" alt="">
                                </div>
                            </div> 
                        </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <h5 class="hd-tl ">CV & Documents:</h5>
                    <button class="btn btn-orange ft-br" type="button" data-bs-toggle="modal" data-bs-target="#apply">Submit</button>
                </div>
                <!-- Modal -->
                  
                    <div class="modal fade" id="apply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Confirm Application Submission</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                          </div>
                        </div>
                      </div>
            </form> 
        </div>
    </div>

    <div class="container">
    </div>

    @endif

@endsection