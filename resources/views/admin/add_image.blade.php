@extends('layouts.master_layout')
@section('page-summary')
    <b>Add Image</b>
@endsection
@section('body')
    <div class="container">
        <div class="admin-gallery-wrapper">
            <form action="{{ route('admin.image.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="gallery-intro">
                    <b>Add Image</b>
                    <div class="right">
                        <button type="submit" role="button" class="btn">Save</button>
                    </div>
                </div>
                <div class="album-list">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="albumName">Album</label>
                            <select name="album_id" id="albumName" class="form-select" required>
                                @foreach ($albums as $album)
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="caption">Description</label>
                            <textarea name="caption" id="caption" cols="12" rows="4" class="form-control" required></textarea>
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