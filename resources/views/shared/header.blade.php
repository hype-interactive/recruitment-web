
<nav class="navbar navbar-expand-lg navbar-light ttr-header">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('images/logo.jpg')}}" alt="" width="250">
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item">
                 <a class="nav-link active" href="{{route('home')}}" aria-current="page">Home</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="{{route('job_posts')}}">Jobs</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="{{route('services')}}">Services</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="{{route('about_us')}}">About</a>
            </li>
        </ul>
        <div class="social d-flex">
            <a href="https://www.instagram.com/toptalentedrecruits/" target="_blank" class="d-flex justify-content-center"><img class="ma-r-2" src="{{asset('images/icons/instagram.svg')}}" alt=""></a>
            <a href="https://tz.linkedin.com/company/top-talented-recruits-ltd?trk=public_profile_experience-item_result-card_subtitle-click" target="_blank" class="d-flex justify-content-center"><img class="ma-r-2" src="{{asset('images/icons/linkedin.svg')}}" alt=""></a>
            @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="nav-link" ><button type="button" class="btn login   " >Login</button></a>
            @endif
            @if (Route::has('login'))
                <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn signup " >Signup</button></a>
            @endif 
            @else
            <div class="dropdown dropstart">
                <a class="navbarDropdown " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="dp"><img src="{{asset('images/icons/man-user.svg')}}" alt=""></div> 
                </a>
                <div class="dropdown-menu dropdown-menu-left dp-restyle" aria-labelledby="navbarDropdown">
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
        <div class="">
            @if (session('msg'))
              <div class="pop-feedback" id="pop-feedback">
                  <div class="inner-commponent">
                      <div>{{session('msg')}}</div>
                  </div>
              </div>
            @endif
        </div>

      </div>
    </div>
  </nav>
