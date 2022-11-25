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
                                        <a href="">Delete</a>
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
@endsection