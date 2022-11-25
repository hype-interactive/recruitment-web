@extends('layouts.master_layout')
@section('page-summary')
    <b>Client Management</b>
@endsection
@section('body')

    <div class="container">
        <div class="user-table applicant">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($users); $i++)
                    <tr>
                        <th scope="row">{{$i + 1}}</th>
                        <td>{{$users[$i]->fname}} {{$users[$i]->lname}}</td>
                        <td>{{$users[$i]->phone}}</td>
                        <td>{{$users[$i]->email}}</td>
                        <td><a href="{{ route('admin.client_details', $users[$i]->id) }}">View</a></td>
                    </tr> 
                    @endfor
            </table>
        </div>
    </div>

@endsection