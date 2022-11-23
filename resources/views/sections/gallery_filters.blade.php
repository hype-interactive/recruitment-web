<div class="gallery-filter-wrapper mrt-2">
    <div class="container">
        <div><i class="fa-solid fa-images"></i> Albums </div>
        <div class=" row pills">
            <div class="pill-wrapper active">
                <button role="button" onclick="getAlbum(this.value)" class="pill active" value="0" >All</button>
            </div>
            {{-- @foreach ($albums as $album)
                @if (count($album->images) != 0 )
                <div class="pill-wrapper">
                    <button role="button" onclick="getAlbum(this.value)" class="pill" value="{{ $album->id }}">{{ $album->name }}</button>
                </div>
                @endif
            @endforeach --}}
        </div>
    </div>
</div>