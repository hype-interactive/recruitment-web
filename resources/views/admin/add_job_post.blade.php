@extends('layouts.master_layout')
@section('page-summary')
    <b>Add Job Post;</b>
@endsection
@section('body')
    <div class="add-job-post-form">
        <form action="{{route('admin.add_job_post')}}" method="POST" novalidate>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputAddress">Job post title</label>
                    <input type="text" name="title" class="form-control"  id="inputAddress" placeholder="1234 Main St" required>
                </div>
            </div>
            <div class="form-row">

              <div class="form-group col-md-3">
                <label for="inputState">Dead line</label>
                <input type="date"  class="form-control" name="deadline" id="" required>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputState">category</label>
                <select id="inputState" name="category" class="form-control" required>
                  <option selected>Choose...</option>
                  @foreach ($job_categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                <div class="add-category">
                  <a  data-toggle="modal" data-target="#exampleModalCenter">
                    <img src="{{asset('images/icons/plus.svg')}}" alt="">
                  </a>
                </div>
              </div>             
               <div class="form-group col-md-3">
                <label for="inputState">Location</label>
                <select id="inputState"  name="region" class="form-control" required>
                  <option selected>Choose...</option>
                  @foreach ($regions as $region)
                      <option value={{$region->id}}>{{$region->name}}</option>
                  @endforeach
                </select>
              </div>              
              <div class="form-group col-md-3">
                <label for="inputState">Job type </label>
                <select id="inputState" name="type" class="form-control" required>
                  <option selected>Choose...</option>
                  <option value="Full time">Full time</option>
                  <option value="Part time">Part time</option>
                </select>
                
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Enter job description</label>
                    <textarea rows="8" class="form-control" name="description" id="exampleFormControlTextarea1" required></textarea>
                  </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn  br-btn btn-primary">Add Post</button>
          </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Job Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.add_category')}}" method="post">
        @csrf
        <div class="modal-body">
          <input type="text" name="category" class="form-control"  aria-describedby="emailHelp" placeholder="Example : Accountant">
        </div>
        <div class="modal-footer">
          {{-- {{ csrf_field() }} --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

 <script type="text/javascript" src="{{asset('tinymce/tinymce.min.js')}}"></script>
 <script type="text/javascript">
  tinymce.init({
      selector: "textarea",
      plugins: [
          "advlist autolink lists link image charmap print preview anchor",
          "searchreplace visualblocks code fullscreen",
          "insertdatetime media table contextmenu paste"
      ],
      branding:false
  });
</script>
@endsection