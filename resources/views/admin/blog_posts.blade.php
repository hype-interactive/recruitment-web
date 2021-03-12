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
                    <p class="card-text">{!!Str::limit($post->caption,50)!!}</p>
                    <small>
                        <a href="{{route('admin.edit_blog_post_panel',$post->id)}}">
                            <img src="{{asset('images/icons/edit.svg')}}" alt="" class="small-icon">
                        </a>
                            <span class="gray">|</span> 
                        <a class="modal_btn" data-id="{{$post->id}}" data-toggle="modal" data-target="#delete_post">
                            <img src="{{asset('images/icons/bin.svg')}}" alt="" class="small-icon">
                        </a>
                    </small>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
    <a class="add-post-button" href="{{route('admin.add_blog_post_panel')}}">
        <img  src="{{asset('images/icons/plus.svg')}}" alt="">
    </a>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center text-danger" id="exampleModalCenterTitle">Are you sure ,You want to DELETE this post</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
                <div class="modal-footer">
                    <form action="{{route('admin.delete_blog_post')}}" method="post">
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