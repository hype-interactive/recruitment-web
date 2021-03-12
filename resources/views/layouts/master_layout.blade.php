<!DOCTYPE html>
<html>
    <head>
        <title>top talentend recruits</title>
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('css/admin/app_admin.css')}}">
        <link rel="stylesheet" href="{{url('css/admin/jobpost.css')}}">
        <link rel="stylesheet" href="{{url('css/admin/post.css')}}">
        <!-- CSS only -->
        

    </head>
    <body>
       @include('../shared.header_admin')
        <div class="main-body">
                @yield('body')
        </div>
        <div class="main-footer">
            <p>Copyright © 2010-2021 Top Talented Recruits . All rights reserved</p>
            <ul>
                <li>Terms</li>
                <li>AFQ</li>
                <li>About</li>
            </ul>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <script>
        $(document).ready(function () {
            setTimeout(function()
            {$('#pop-feedback').hide();
            },5000);
            
            // set id to modal button 

            $('.modal_btn').click(function(){
                $('#data_id').val($(this).data('id'));
            });
        });
    </script>
</html>