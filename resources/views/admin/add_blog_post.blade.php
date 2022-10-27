@extends('../layouts.master_layout')
@section('page-summary')

    <b>Add New Blog Post</b>
    
@endsection
@section('body')
<div class="container">
    <div class="row add-blog-post">
        <div class="col-md-8">
            <div class="post-details">
                <form action="{{route('admin.add_blog_post')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post Title</label>
                        <input type="text" name="title" class="form-control form-control-lg"   id="title" onkeyup="displayText('title','blog-title')" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post Content</label>
                        <textarea  name="caption" class="form-control form-control-lg"   id="caption" onkeyup="displayText('caption','post-content')" nonvalidate></textarea>
                    </div>
                    <input type='file' name="image" accept=".jpg, .jpeg, .png" onchange="readURL(this);" required/>

                    <button type="submit" class="btn btn-orange bp-btn"> Add Post</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tcard">
                <div class="image">
                    <img id="blah" src="{{asset('images/mac.jpg')}}" alt="">
                    <p>Advice</p>
                </div>
                <div class="body">
                    <b class="blog-card-title" id="blog-title">Working from home in Tanzania</b>
                    <p id="post-content">Do you remember that endless summer back in '84? Cruising down the ocean-highway with the top down, the wind in our hair and heads buzzing with neon dreams</p>
                    <div class="blog-post-footer">
                        <div class="right">
                            <b>By Top Talented Recruiters</b>
                        </div>
                        <div class="left">
                            <b>Read More</b>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <img  src="http://placehold.it/180" alt="your image" /> --}}
        </div>
    </div>
</div>
<div class="uploaded">
</div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


        function displayText(id_one,id_two) {
            
            var textarea = document.getElementById(id_one);
            var content_display=document.getElementById(id_two);
            return content_display.textContent = textarea.value;
        }


    </script>
     <script type="text/javascript" src="{{asset('tinymce/tinymce.min.js')}}"></script>
     <script type="text/javascript">
      tinymce.init({
          selector: "#caption",
          init_instance_callback: function(editor) {
                editor.on('keyup', function(e) {
                    var content_display = document.getElementById('post-content');
                     return content_display.innerHTML = editor.getContent();
                });
            },
          plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste"
          ],
          
          branding:false

      });
    </script>
@endsection