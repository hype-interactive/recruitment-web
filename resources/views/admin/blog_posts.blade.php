@extends('../layouts/master_layout')
@section('page-summary')
    <b>Blog Posts</b>
@endsection
@section('body')
<div class="container">
    <div class="blog-posts row">
        @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card " style="width: 25rem;">
                    <img src="{{asset('storage/'.$post->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <p class="card-text">{{Str::limit($post->caption,50)}}</p>
                    <small><a href="{{route('admin.edit_blog_post_panel',$post->id)}}">Edit</a></small>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

    <a class="add-post-button" href="{{route('admin.add_blog_post_panel')}}">
        <img  src="{{asset('images/icons/plus.svg')}}" alt="">
    </a>

@endsection