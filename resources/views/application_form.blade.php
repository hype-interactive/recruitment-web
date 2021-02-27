@extends('layouts.app')
@section('body')
    <div class="container">
            <div class="personal-info">
                <div class="panel-header">
                    <img src="{{asset('images/icons/man-user.svg')}}" alt="">
                </div>
                <form action="">
                <div class="panel-body">
                    <form action="">
                        <div class="form-row">
                            <div class="col">
                                First Name: <input type="text" value="{{Auth::user()->fname}}">
                            </div>
                            <div class="col">
                                Second Name: <input type="text" value="{{Auth::user()->sname}}">
                            </div>
                            <div class="col">
                                last Name: <input type="text" value="{{Auth::user()->lname}}">
                            </div>
                            <div class="col">
                                Phone: <input type="phone" value="{{Auth::user()->phone}}">
                            </div>
                            <div class="col">
                                Email: <input type="email" value="{{Auth::user()->email}}">
                            </div>
                        </div>

                    </form>
                </div>
                <h5 class="hd-tl">Personal Informatrion:</h5>
                <button class="btn btn-orange ft-br" type="submit">Save Changes</button>
                </form>
            </div>
    </div>
    <div class="container">
            <div class="documents">
                <form action="">
                    <div class="document">
                        <div class="form-row">
                            <div class="col">
                                CV:
                                <input type="file" class="custom-file-input" id="customFile">
                                <img src="{{asset('images/icons/attachment.svg')}}" alt="">
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="col">
                                Certificate:
                                <input type="file" class="custom-file-input" id="customFile">
                                <img src="{{asset('images/icons/attachment.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                Photo:
                                <input type="file" class="custom-file-input" id="customFile">
                                <img src="{{asset('images/icons/attachment.svg')}}" alt="">
                            </div>
                        </div> --}}
                        
                    </div>
 
                </form>
            <h5 class="hd-tl">CV & Documents:</h5>
            <button class="btn btn-orange ft-br" type="submit">Submit</button>
            </div>
            
    </div>
@endsection