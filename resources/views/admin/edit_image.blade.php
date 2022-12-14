@extends('layouts.master_layout')
@section('page-summary')
    <b>Edit Image</b>
@endsection
@section('body')
<div class="container">
    <div class="admin-gallery-wrapper">
        <form action="{{ route('admin.image.edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="gallery-intro">
                <b>Edit Image</b>
                <div class="right">
                    <button type="submit" role="button" class="btn">Save</button>
                </div>
            </div>
            <div class="album-list">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-2">
                            <div class="">
                                <label for="albumName">Album</label>
                                <select name="album_id" id="albumName" class="form-select">
                                    <option value="{{ $image->album }}" selected>{{ $image->toArray()['album']['name'] }}</option>
                                    @foreach ($albums as $album)
                                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image" onchange="readURL(this);" aria-describedby="imageHelp">
                            </div>
                            <div class="form-text" id="imageHelp">
                                <small id="imageHelp">Select an image to upload. Leave empty if it is the same image displayed</small>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="">
                                <label for="caption">Description</label>
                                <textarea name="caption" id="caption" cols="12" rows="4" class="form-control">{{ $image->caption }}</textarea>
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
                        <div >
                            <img id="oldImage" style="object-fit: contain; object-position: center; width: 100%; height: 317px;" src="{{ Storage::url($image->url) }}" alt="">
                        </div>
                    </div>
                    <input type="hidden" name="image_id" value="{{ $image->id }}">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#oldImage')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection