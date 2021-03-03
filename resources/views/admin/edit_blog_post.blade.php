@extends('../layouts.master_layout')
@section('page-summary')
<b>Edit Blog Post</b> 
@endsection
@section('body')
<div class="container">
    <div class="row add-blog-post">
        <div class="col-md-8">
            <div class="post-details">
                <form action="{{route('admin.edit_blog_post')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post Title</label>
                        <input type="text" name="title" class="form-control form-control-lg"   id="title" onkeyup="displayText('title','blog-title')" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post Content</label>
                        <textarea name="caption" class="form-control form-control-lg"  id="caption" onkeyup="displayText('caption','post-content')" required></textarea>
                    </div>
                    <input type='file' name="image" accept="image/jpg" onchange="readURL(this);" required />
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <button type="submit" class="btn btn-orange"> Save Changes</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="tcard">
                <div class="image">
                    <img id="blah" src="{{asset('storage/'.$post->image)}}" alt="">
                    <p>Advice</p>
                </div>
                <div class="body">
                    <b class="blog-card-title" id="blog-title">{{$post->link}}</b>
                    <p id="post-content">{{$post->caption}}</p>
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
@endsection