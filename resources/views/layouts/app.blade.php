@extends('layouts.frame')
@section('content')
        @include('shared.header')
        @yield('body')


<!-- Modal -->
<div class="modal fade" id="employerForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form action="{{route('register_employer')}}" method="post">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body employer">
            <div class="form-group">
                <label for="exampleInputPassword1">Company Name</label>
                <input type="text" name="company_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Company's Phone</label>
                <input type="phone" name="phone" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Company's Email</label>
              <input type="email" name="email" class="form-control"  >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Company's Address</label>
              <input type="text" name="address" class="form-control"  >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Message</label>
              <textarea name="message" class="form-control">
              </textarea>
            </div>
            <div class="form-check">
              <label for="exampleInputPassword1">Meeting request</label>
              <input type="checkbox" name="meeting_request" class="form-check-input"  >
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
        @include('shared.footer')
@endsection

