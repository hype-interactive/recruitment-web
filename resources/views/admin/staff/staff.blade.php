@extends('layouts.master_layout')
@section('page-summary')
    <b>Staff</b>
@endsection

@section('body')

<div class="container">
    <div class="admin-gallery-wrapper">
        <div class="gallery-intro">
            <b>Staff</b>

            <div class="right">
                <a href="{{ route('admin.staff.create_panel') }}" class="btn">Create Staff</a>
            </div>
        </div>
        <div class="album-list">
            <table class="table custom-gallery-table">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td><a href="{{ route('admin.staff.edit_panel', $staff->id) }}">{{ $staff->fname }}</a></td>
                            <td>{{$staff->mname}}</td>
                            <td>{{$staff->lname}}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.staff.edit_panel', $staff->id) }}">View</a>
                                <a href="">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection