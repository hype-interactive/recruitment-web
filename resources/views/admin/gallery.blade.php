@extends('layouts.master_layout')
@section('page-summary')
    <b>Gallery</b>
@endsection

@section('body')
<div class="container">
    <div class="admin-gallery-wrapper">
        <div class="gallery-intro">
            <b>Albums</b>

            <div class="right">
                <a href="{{ route('admin.album.create_panel') }}" class="btn">Create Album</a>
            </div>
        </div>
        <div class="album-list">
            <table class="table custom-gallery-table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col"># of Images</th>
                        <th scope="col">Created</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td><a href="{{ route('admin.album.images', $album->id) }}">{{ $album->name }}</a></td>
                            <td>{{$album->images->count()}}</td>
                            <td>{{$album->created_at}}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.album.edit_panel', $album->id) }}">View</a>
                                <a href="">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    {{-- @for($i=1; $i<4; $i++)
                        <tr>
                            <td><a href="">Album {{$i}}</a></td>
                            <td>10</td>
                            <td>12/12/2019</td>
                            <td class="text-center">
                                <a href="">View</a>
                                <a href="">Delete</a>
                            </td>
                        </tr>
                    @endfor --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection