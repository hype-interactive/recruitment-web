<div class="header">
    <div class="header-row">
        <div class="brand-col brand-name">
            <a href="{{route('home')}}">
                <img src="{{asset('images/logo.jpg')}}" alt="">
            </a>
        </div>
        <div class="link-col links">
            <ul id="thelinks" class="nav-link-wrapper">
                <li class="nav-link"> <a href="{{route('home')}}">Home</a></li>
                <li class="nav-link"> <a href="{{route('job_posts')}}">Jobs</a></li>
                <li class="nav-link"> <a href="{{route('services')}}">Services</a></li>
                <li class="nav-link"> <a href="{{route('about_us')}}">About us</a></li>
            </ul>
        </div>
        <div class="social-col social">
            <img class="ma-r-2" src="{{asset('images/icons/instagram.svg')}}" alt="">
            <img class="ma-r-2" src="{{asset('images/icons/linkedin.svg')}}" alt="">
            @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="nav-link" ><button type="button" class="btn login   " >Login</button></a>
            @endif
            @if (Route::has('login'))
                <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn signup " >Signup</button></a>
            @endif 
            @else
            <div class="dropdown">
                <a class="navbarDropdown " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="dp"><img src="{{asset('images/icons/man-user.svg')}}" alt=""></div> 
                </a>
                <div class="dropdown-menu dropdown-menu-right dp-restyle" aria-labelledby="navbarDropdown">
                    <span>User : <b>{{ Auth::user()->fname }}</b></span>
                        <a class="dropdown-item" href="{{route('user_profile',Auth::user()->id)}}">
                            My Profile
                        </a>
                    @if (Auth::user()->type == "admin")
                        <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                            Dashboard
                        </a>
                    @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
                @endguest
        </div>
    </div>
    @if (session('msg'))
        <div class="pop-feedback" id="pop-feedback">
            <div class="inner-commponent">
                <div>{{session('msg')}}</div>
            </div>
        </div>
    @endif
</div>
