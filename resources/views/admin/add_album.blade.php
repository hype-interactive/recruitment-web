@extends('layouts.master_layout')
@section('page-summary')
    <b>Add Album</b>
@endsection
@section('body')
    <div class="container">
        <div class="admin-gallery-wrapper">
            <form action="{{ route('admin.album.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="gallery-intro">
                <b>Add Album</b>

                <div class="right">
                    <button type="submit" role="button" class="btn">Save</button>
                </div>
            </div>
            <div class="album-list">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="albumName">Name</label>
                            <input type="text" class="form-control" name="album_name" id="albumName">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="description">Description</label>
                            <textarea name="album_description" id="description" cols="12" rows="4" class="form-control"></textarea>
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
                </form>
            </div>
        </div>
    </div>
@endsection