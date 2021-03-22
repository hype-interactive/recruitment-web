<!DOCTYPE html>
<html>
    <head>
        <title>TTR-ADMIN</title>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function()
            {$('#pop-feedback').hide();
            },5000);
            

            $('.modal_btn').click(function(){
                $('#data_id').val($(this).data('bs-id'));
            });
        });
    </script>
</html>