<div class="gallery-wrapper">
    <div class="grid" id="gallery" >
        <div class="grid-sizer"></div>
          @if (count($images) > 0)
            @foreach ($images as $image)
            <div class="grid-item">
              <img src={{ Storage::url($image->url) }} />
            </div>
            @endforeach

          @else

            <!-- For demo purposes -->
            <div class="grid-item">
              <img src={{ asset('/images/intro-gallery.jpg') }} />
            </div>
            <div class="grid-item">
              <img src={{ asset('/images/man.jpg') }} />
            </div>
            <div class="grid-item">
              <img src={{ asset('/images/intro-gallery.jpg') }} />
            </div>
            <div class="grid-item">
              <img src={{ asset('/images/intro-gallery.jpg') }} />
            </div>
            <div class="grid-item">
              <img src={{ asset('/images/intro-gallery.jpg') }} />
            </div>
          @endif
        
    </div>
      @section('extra-js')
      <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
      <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
      <script src="/js/gallery.js" type="text/javascript"></script>
      @endsection
</div>