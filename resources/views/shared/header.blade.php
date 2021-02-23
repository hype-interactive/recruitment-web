<div class="header">
    <div class="header-row">
        <div class="brand-col brand-name">
            <img src="{{asset('images/logo.jpg')}}" alt="">
        </div>
        <div class="link-col links">
            <ul class="nav-link-wrapper">
                <li class="nav-link"> <a href="{{route('home')}}">Home</a></li>
                <li class="nav-link"> <a href="">Jobs</a></li>
                {{-- <li class="nav-link"> <a href="{{route('job_posts')}}">Jobs</a></li> --}}
                <li class="nav-link"> <a href="">Services</a></li>
                <li class="nav-link"> <a href="">About us</a></li>
            </ul>

        </div>
        <div class="social-col social">
            <img class="ma-r-3" src="{{asset('images/icons/instagram.svg')}}" alt="">
            <img class="ma-r-3" src="{{asset('images/icons/linkedin.svg')}}" alt="">
            <button type="button" class="btn login  btn-lg ma-r-3">Login</button>
            <button type="button" class="btn signup btn-lg">Signup</button>
        </div>
    </div>

</div>
