@extends('layouts.master_layout')
@section('page-summary')
    <b>Add Job Post</b>
@endsection
@section('body')
    <div class="add-job-post-form">
        <form id="addJobPost" action="{{route('admin.add_job_post')}}" method="POST" novalidate>
        @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputAddress">Job post title</label>
                    <input type="text" name="title" class="form-control"  id="title" placeholder="1234 Main St" required>
                </div>
            </div>
            <div class="form-row row">

              <div class="form-group col-md-3">
                <label for="inputState">Deadline</label>
                <input type="date"  class="form-control" name="deadline" id="deadline" required>
                </select>
              </div>
              <div class="form-group col-md-3 category-modal">
                <label for="inputState">Category</label>
                <select id="inputState" name="category" class="form-control" required>
                  <option selected>Choose...</option>
                  @foreach ($job_categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
                <div class="add-category">
                  <a  data-bs-toggle="modal" data-bs-target="#add_category" onclick="setLocalStorage()">
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
                    <textarea rows="7" class="form-control" name="description" id="exampleFormControlTextarea1" required></textarea>
                  </div>
            </div>
            <button type="submit" class="btn  br-btn btn-primary">Add Post</button>
          </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('admin.add_category')}}" method="post">
        @csrf
      <div class="modal-body">
        <input type="text" name="category" class="form-control"  aria-describedby="emailHelp" placeholder="Example : Accountant">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
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
          "insertdatetime media table contextmenu paste code"
      ],
      // advlist_bullet_styles: [{
      //   title: 'image bullets',
      //   styles: {
      //     listStyleImage: "url({{ asset('images/checkmark.png') }})"
      //   }
      // }],
      branding:false
  });
</script>

@endsection

@section('scripts')

<script>
  // $('form').submit(function(e) {
  //   e.preventDefault();
  //   var value = $(this).serializeArray();
  //   console.log(value);
  // })
  function setLocalStorage() {
    var title = $('#title').val();
    var deadLine = $('#deadline').val();

    localStorage.setItem('job_title', title);
    localStorage.setItem('job_deadline', deadLine);

    console.log(title, deadLine);
  }

  $(document).ready(function () {
    
    let oldTitle = localStorage.getItem('job_title');
    let oldDeadline = localStorage.getItem('job_deadline');
    
    if ((oldTitle !== null) || (oldDeadline !== null)) {
      $('#title').val(oldTitle);
      $('#deadline').val(oldDeadline);

      localStorage.removeItem('job_title');
      localStorage.removeItem('job_deadline');
    }
    console.log(oldTitle, oldDeadline);
  })
</script>

@endsection