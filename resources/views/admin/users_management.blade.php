@extends('../layouts.master_layout')
@section('page-summary')
    <b>Users Menagement</b>
@endsection
@section('body')

<div class="container">
    <div class="user-table applicant">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($users); $i++)
                <tr>
                    <th scope="row">{{$i + 1}}</th>
                    <td>{{$users[$i]->fname}} {{$users[$i]->lname}}</td>
                    <td>{{$users[$i]->email}}</td>
                    <td>{{$users[$i]->phone}}</td>
                    <td><a class="modal_btn" data-bs-id="{{$users[$i]->id}}" data-bs-toggle="modal" data-bs-target="#revoke_admin">Revoke</a></td>
                  </tr> 
                @endfor
            </tbody>
          </table>
    </div>
</div>
<a class="add-post-button"  data-bs-toggle="modal" data-bs-target="#add_admin">
    <img  src="{{asset('images/icons/plus.svg')}}" alt="">
</a>

<!--  Add Modal -->
<div class="modal fade" id="add_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add Admin</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('admin.add_admin')}}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="form-row">
          <input class="form-control" type="text" name="email"  placeholder="Email" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      </form> 
    </div>
  </div>
</div>


<!-- Revoke Modal -->
<div class="modal fade" id="revoke_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title text-danger" id="exampleModalLabel1">Are you sure ,You want to remove this user</h6>
      </div>
      <div class="modal-footer">
        <form action="{{route('admin.revoke_admin')}}" method="post">
          @csrf
          <input type="hidden" name="post_id" id="data_id">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-danger">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection