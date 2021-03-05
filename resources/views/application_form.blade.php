@extends('layouts.app')
@section('body')
@if ($application ?? '')
    <div class="container">
        <div class="warning">
            You have already applied !, <br> Wait for Your Application progress
        </div>
    </div>
@else
    <div class="container">
        <h2>{{$post->title}}</h2>
        
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
    </div>

    <div class="container">
        

        <form action="{{route('add_document')}}" method="post" enctype="multipart/form-data">
            <div class="documents">
                    @csrf
                    <div class="document">
                        <div class="form-row">
                            <div class="col-md-1">CV</div>
                            <div class="col-md-3">
                                <input type="file" class="custom-file-input" id="customFile" name="file" accept="application/pdf" required>
                            </div>
                            <div class="col-md-8">
                                <input type="tex" src="" alt="" placeholder="file name" name="file_name" value="{{($application ?? '' )? ($application[0]->applicationDocument->name):""}}">
                                <img src="{{asset('images/icons/attachment.svg')}}" alt="">
                            </div>
                        </div> 
                    </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <h4 class="hd-tl ">CV & Documents:</h4>
            <button class="btn btn-orange ft-br" type="button" data-toggle="modal" data-target="#apply">Submit</button>
            </div>

    </div>
      
      <!-- Modal -->
      <div class="modal fade" id="apply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger" id="exampleModalCenterTitle">Confirm Application Submission</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
        </div>
      </div>
    </form> 

    @endif

@endsection