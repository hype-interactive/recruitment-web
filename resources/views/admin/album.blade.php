@extends('layouts.master_layout')
@section('page-summary')
    <b>Gallery</b>
@endsection

@section('body')
<div class="container">
    <div class="admin-gallery-wrapper">
        <div class="gallery-intro">
            <b>Album | Images</b>

            <div class="right">
                <a href="{{ route('admin.image.create_panel') }}" class="btn">Add Image</a>
            </div>
        </div>
        <div class="album-list">
            <table class="table custom-gallery-table">
                <thead>
                    <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Created</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($album->images) <= 0)
                        <tr>
                            <td colspan="3" class="text-center">No images found.</td>
                        </tr>
                    @else
                        @foreach ($album->images as $image)
                            <tr>
                                <div class="d-flex align-self-center">
                                    <td>
                                        <img width="80" height="80" src="{{ Storage::url($image->url) }}" alt="">
                                    </td>
                                    <td>
                                        <div class="">
                                            {{$album->created_at}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.image.edit_panel', $image->id) }}">View</a>
                                        <a
                                            class="delete-image text-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteImage"
                                            data-bs-image_id="{{ $image->id }}"
                                        >
                                            Delete
                                        </a>
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            $('#image_id').val($(this).data('bs-image_id'));
        });
    });
</script>
@endsection