@extends('layouts.master_layout')
@section('page-summary')
    <b>Add Staff</b>
@endsection

@section('body')

<div class="container">
    <div class="admin-gallery-wrapper">
        <form action="{{ route('admin.staff.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="gallery-intro">
                <b>Add Staff</b>
                <div class="right">
                    <button type="submit" role="button" class="btn">Save</button>
                </div>
            </div>
            <div class="album-list">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname">
                    </div>
                    <div class="col-md-4">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" name="mname" id="mname">
                    </div>
                    <div class="col-md-4">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname">
                    </div>
                </div>
                <div class="row mb-2 d-flex align-items-center">
                    <div class="col-md-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="col-md-6">
                        <input type="checkbox" class="form-check-input" name="is_director" id="director-checkbox" aria-describedby="directorHelp">
                        <label for="director-checkbox">Director</label>
                        <div class="form-text" id="directorHelp">
                            Check this box if the staff is a director.
                        </div>
                    </div> 
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
            </div>
        </form>    
    </div>
</div>

@endsection