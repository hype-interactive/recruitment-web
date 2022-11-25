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
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="albumName">Album</label>
                        <select name="album_id" id="albumName" class="form-select">
                            @foreach ($albums as $album)
                                <option value="{{ $album->id }}">{{ $album->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" value="{{ Storage::url($image->url) }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="caption">Description</label>
                        <textarea name="caption" id="caption" cols="12" rows="4" class="form-control">{{ $image->caption }}</textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <input type="checkbox" class="form-check-input" name="visibility" id="checkbox" aria-describedby="visibilityHelp" checked>
                        <label class="form-check-label" for="checkbox">Visibility</label>
                    </div>
                    <div class="form-text" id="visibilityHelp">
                        Check this box to make the album visible to the public.
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection