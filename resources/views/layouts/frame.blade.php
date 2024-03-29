<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TopTalented Recruits</title>
    
 
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
    <!-- Owl Carousel Styles -->
    <link rel="stylesheet" href="/css/carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/carousel/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">

</head>
<body>

@yield('content')

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script src="/js/animations.js" type="text/javascript"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://kit.fontawesome.com/68b4c1056b.js" crossorigin="anonymous"></script> 

<script>
 $(document).ready(function () {
        setTimeout(function () {
            $('#pop-feedback').hide('slow');
        },5000);
        $('.statistic-counter').counterUp({
                delay: 10,
                time: 2000
            });
    
 });

// functions to display whatsapp button on scroll
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
        $("#w-btn").css("display", "block");
    } else {
        $("#w-btn").css("display", "none");
    }
});



// function to change carousel properties from slide to non-slide
var winWidth = $(window).width();
// console.log(winWidth);

  if(winWidth > 768){
    $('#carouselExampleCaptions').attr('data-bs-ride', "carousel");
    $('#carouselExampleCaptions').removeAttr('data-bs-interval', "false");
  } else {

    $('#carouselExampleCaptions').removeAttr('data-bs-ride', "carousel");
    $('#carouselExampleCaptions').attr('data-bs-interval', "false");
  };

</script>

{{-- Amazing Form for Profile update JS Scripts --}}

<script src="/js/newform.js"></script>

{{-- Owl Carousel JS Scripts --}}
<script src="/js/carousel/owl.carousel.min.js"></script>
<script src="/js/carousel/main.js"></script>

@yield('extra-js')
</html>

