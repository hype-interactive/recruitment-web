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
                                <a class="delete-album" data-bs-toggle="modal" data-bs-target="#deleteAlbum" data-bs-album_id="{{ $album->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h6 class="modal-title text-danger" id="exampleModalLabel1">Are you sure you want to delete this album with it's images?</h6>
            </div>
            <div class="modal-footer">
            <form action="{{route('admin.delete_album')}}" method="post">
                @csrf
                <input type="hidden" name="album_id" id="album_id">
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
        $('.delete-album').click(function(){
            $('#album_id').val($(this).data('album_id'));
            console.log(document.getElementsByClassName('delete-album'));
            // console.log(document.getElementById('album_id').value);
        });
    });
</script>
@endsection