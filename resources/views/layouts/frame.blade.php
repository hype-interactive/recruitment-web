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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    function hide(id) {
        // alert("hides"+id);
       var element = document.getElementById(id).style.display="none";
    }

    function show(id) {
        // alert("show"+id);
        document.getElementById(id).style.display="block";
    }

    function setnew(id){
        alert('habari')
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

    function login() {
        console.log("Clicked lohin");
        var x = window.location.href='/login'
        
        $(x).reday(setnew('login'));
        // if(window.location.href='/login'){
        //         setnew('login')
        //         this.document.
        // }else{
        //     alert('hello')
        // }
    }

</script>
</html>