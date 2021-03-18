<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TopTalented Recruits</title>
    
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jobs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/job.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
</head>
<body>

@yield('content')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script>
    // $('.carousel').carousel()
    function hide(id) {
        // alert("hides"+id);
       var element = document.getElementById(id).style.display="none";
    }

    function show(id) {
        // alert("show"+id);
        document.getElementById(id).style.display="block";
    }

    function setnew(id){
        if(id == "login" ){
            // alert("to open login");
            hide("signup");
            hide("reset")
            show("login");
        }else if(id == "reset"){
            hide("signup");
            hide("login");
            show("reset");
        }else{
            hide("login");
            hide("reset");
            show("signup");
        }
        
    }

//  $(document).ready(function () {

//         setTimeout(function () {
//             $('#pop-feedback').hide('slow');
//         },5000);
     
//  });
</script>
</html>

