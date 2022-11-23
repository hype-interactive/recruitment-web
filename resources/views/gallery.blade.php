@extends('layouts.app')
@section('body')
    <div class="gallery-page-intro">
        <div class="page-intro-header">
            <h1 class="bolded">Gallery</h1>
        </div>
    </div>

    @include('sections.gallery_filters')

    @include('sections.gallery')

@endsection