<?php
    $_ = new App\Library\Testimonials;
    $testimonials = array_slice($_->items(),0,12);
?>

<div class="testimonials-wrapper">
    <div class="ttr-section-header">
        <h2>Testimonials</h2>
        <p>What our assisted candidates say about us</p>
    </div>
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-4 testimonials-banner">
                <h2>Testimonials</h2>
                <p>What our clients say about us</p>
                <button class="btn btn-orange">View More</button>
            </div> --}}
            <div class="col-md-12 testimonials">
                <div class="owl-carousel testimonials-slider owl-theme">
                    @foreach ($testimonials as $testimonial)
                        @if ($testimonial->type === "Candidate")
                            <div>
                                <div class="card text-center testimonial-card">
                                    <img class="card-img-top" src="{{ asset($testimonial->image) }}" alt="tester">
                                    <div class="card-body">
                                        <h5>
                                            {{ $testimonial->name }}
                                            <br>
                                            <span>{{ $testimonial->title }}</span>
                                        </h5>
                                        <p class="card-text">{{ $testimonial->quote }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Client testimonials --}}
        <div class="row mt-3">
            <div class="ttr-section-header">
                <h5>What our clients say about us</h5>
            </div>
            <div class="col-md-12 testimonials">
                <div class="owl-carousel testimonials-slider owl-theme">
                    @foreach ($testimonials as $testimonial)
                        @if ($testimonial->type === "Client")
                            <div>
                                <div class="card text-center testimonial-card">
                                    <div class="card-img-top">
                                        <img  src="{{ asset($testimonial->image) }}" alt="tester">
                                    </div>
                                    <div class="card-body">
                                        
                                        <p class="card-text">{{ $testimonial->quote }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@section('extra-js')
<script>
    $(document).ready(function() {
        $('.testimonial-card').hover(function() {
            $(this).css('cursor', 'pointer');
            $(this).find('.v2').removeClass('hidden');
        }, function() {
            $(this).find('.v2').addClass('hidden');
        });

        $('.card-text').each(function(index, value) {
            var text = $(this).text();
            $(this).html("")
            if (text.length > 65) {
                truncated = text.substr(0, 65);
                prefix = text.substr(65, text.length)
                visible = "<span class='v1'>" + truncated + "</span>"
                non_visible = "<span class='v2 hidden'>" + prefix+ "</span>"
                p = visible + non_visible; 

                $(this).html($(this).html() + p);
            } else {
                $(this).html($(this).html() + text);
            }
        });
    })
</script>
<style>
    .hidden{
        display: none;
    }
    .card-text:hover .card-text.v2{
        display: block;
    }
</style>
@endsection