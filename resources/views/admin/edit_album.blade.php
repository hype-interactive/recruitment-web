@extends('layouts.master_layout')
@section('page-summary')
    <b>Edit Album</b>
@endsection
@section('body')
<div class="container">
    <div class="admin-gallery-wrapper">
        <form action="{{ route('admin.album.edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="gallery-intro">
            <b>Edit Album</b>

            <div class="right">
                <button type="submit" role="button" class="btn">Save</button>
            </div>
        </div>
        <div class="album-list">
            <input type="hidden" name="album_id" value="{{ $album->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-2">
                            <div class="">
                                <label for="albumName">Name</label>
                                <input type="text" class="form-control" name="album_name" id="albumName" value="{{ $album->name }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="">
                                <label for="description">Description</label>
                                <textarea name="album_description" id="description" cols="12" rows="4" class="form-control">{{ $album->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="">
                                <input type="checkbox" class="form-check-input" name="visibility" id="checkbox" aria-describedby="visibilityHelp" checked>
                                <label class="form-check-label" for="checkbox">Visibility</label>
                            </div>
                            <div class="form-text" id="visibilityHelp">
                                Check this box to make the album visible to the public.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            @foreach ($album->images as $image)
                                <div class="col-md-4">
                                    <div class="image-wrapper">
                                        <img src="{{ Storage::url($image->url) }}" alt="">
                                        <div class="image-overlay">
                                            <a href="{{ route('admin.image.edit_panel', ['id' => $image->id]) }}" class="text-white">Edit</a>
                                            <a 
                                                class="text-white delete-image"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteImageModal"
                                                data-bs-id="{{ $image->id }}"
                                            >
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title text-danger" id="exampleModalLabel1">Are you sure you want to delete this image?</h6>
            </div>
            <div class="modal-footer">
            <form action="{{route('admin.delete_image')}}" method="post">
                @csrf
                <input type="hidden" name="image_id" id="image_id">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm btn-danger">Confirm</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {   

        $('.delete-image').click(function(){
            $('#image_id').val($(this).data('id'));
        });
    });
</script>
@endsection