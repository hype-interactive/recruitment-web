@extends('layouts.master_layout')
@section('page-summary')
            <b>Job Post</b>
@endsection
@section('body')
    <div class=" row post-list">
        @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card">
                    <div class="admin-card-header">
                        <div class="category-icon">
                            <img src="{{asset('images/icons/bag.svg')}}" alt="">
                        </div>
                        {{$post->jobCategory->name}}

                    </div>
                    @if (strlen($post->title)>75)
                        <?php $title = substr($post->title, 0,75) . " .....  ...." ?>
                        <p>{{$title}}</p>
                    @else
                        <p>{{$post->title}}</p>
                    @endif
                    <hr>
                    <div class="card-footer">
                        <div>{{$post->region->name}}</div>
                        <div>
                            <a href="{{route('admin.post',$post->id)}}"><img src="{{asset('images/icons/cells.svg')}}" alt="" class="small-icon"></a> 
                                <span class="gray">|</span> 
                            <a href="{{route('admin.edit_post_panel',$post->id)}}"><img src="{{asset('images/icons/edit.svg')}}" alt="" class="small-icon"></a>
                                <span class="gray">|</span> 
                            <a href="" class="modal_btn" data-bs-id="{{$post->id}}" data-bs-toggle="modal" data-bs-target="#delete_post"><img src="{{asset('images/icons/bin.svg')}}"  class="small-icon"></a>
                        </div>
                    </div>
                    <div class="triangle"></div>
                    @if ($post->deadline < date('Y-m-d'))
                        <div class="closed">CLOSED</div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
    <a class="add-post-button" href="{{route('admin.create_job_post_panel')}}">
        <img  src="{{asset('images/icons/plus.svg')}}" alt="">
    </a>
  <div class="modal fade" id="delete_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title  text-danger" id="exampleModalLabel">Are you sure you want to delete this post?</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
            <form action="{{route('admin.delete_job_post')}}" method="post">
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