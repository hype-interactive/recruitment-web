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
                                <a class="delete-staff text-danger" data-bs-toggle="modal" data-bs-target="#deleteStaff" data-bs-staff_id="{{ $staff->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteStaff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title text-danger" id="exampleModalLabel1">Are you sure you want to delete this team member?</h6>
            </div>
            <div class="modal-footer">
            <form action="{{route('admin.delete_staff')}}" method="post">
                @csrf
                <input type="hidden" name="staff_id" id="staff_id">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-danger">Confirm</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {   
        console.log($(this).data('staff_id'))
        $('.delete-staff').click(function(){
            $('#staff_id').val($(this).data('bs-staff_id'));
        });
    });
</script>
@endsection