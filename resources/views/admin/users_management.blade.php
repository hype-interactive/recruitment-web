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
                    <td><a class="modal_btn" data-id="{{$users[$i]->id}}" data-toggle="modal" data-target="#revoke_admin">Revoke</a></td>
                  </tr> 
                @endfor
            </tbody>
          </table>
    </div>
</div>
<a class="add-post-button"  data-toggle="modal" data-target="#add_admin">
    <img  src="{{asset('images/icons/plus.svg')}}" alt="">
</a>
  
  <!--Add Modal -->
  <div class="modal fade" id="add_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalCenterTitle">Add Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.add_admin')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-row">
                        <input class="form-control" type="text" name="email" id="" placeholder="Email" required>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create Admin</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    <!--Revoke Modal -->
    <div class="modal fade" id="revoke_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center text-danger" id="exampleModalCenterTitle">Are you sure ,You want to remove this user</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              <div class="modal-footer">
                <form action="{{route('admin.revoke_admin')}}" method="post">
                  @csrf
                  <input type="hidden" name="post_id" id="data_id">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Confirm</button>
              </form>
              </div>
          </form>
        </div>
      </div>
    </div>


@endsection