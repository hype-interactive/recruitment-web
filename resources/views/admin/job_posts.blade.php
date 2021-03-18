@extends('layouts.master_layout')
@section('page-summary')
            <b>Jop Post</b>

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
                            <a href="" class="modal_btn" data-id="{{$post->id}}" data-toggle="modal" data-target="#delete_post"><img src="{{asset('images/icons/bin.svg')}}"  class="small-icon"></a>
                        </div>
                    </div>
                    <div class="triangle"></div>
                </div>
            </div>
        @endforeach

    </div>
    <a class="add-post-button" href="{{route('admin.create_job_post_panel')}}">
        <img  src="{{asset('images/icons/plus.svg')}}" alt="">
    </a>

        <!--Delete Post Modal -->
        <div class="modal fade" id="delete_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-center text-danger" id="exampleModalCenterTitle">Are you sure ,You want to Delete this post</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <div class="modal-footer">
                      <form action="{{route('admin.delete_job_post')}}" method="post">
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