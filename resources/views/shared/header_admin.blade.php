<div class="main-header">
    <div class="container">
        <div class="tool-bar">
            <div class="name">
                <a href="{{route('home')}}">
                <img src="{{asset('images/logo.jpg')}}" alt="">
                </a>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li>
                    <div class="auth-banner"><span>{{substr(Auth::user()->fname,0,1).substr(Auth::user()->lname,0,1)}}</span>{{Auth::user()->fname}}</div>
                </li>
            </ul>
        </div>
        <div class="nav-bar">
            <ul>
                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('admin.job_posts')}}">Job Posts</a></li>
                <li><a href="{{route('admin.blog_posts')}}">Blog Posts</a></li>
                @if (Auth::user()->type == "admin")
                    <li><a href="{{route('admin.manage_users')}}">User Management</a></li>    
                @endif
                <li><a href="{{ route('admin.manage_clients') }}">Client Management</a></li>
            </ul>
            <br>
            <hr style="margin-top: 5px ; margin-bottom:5px">
            
        </div>
        <div class="summary">
            @yield('page-summary')
        </div>
        @if (session('msg'))
            <div class="pop-feedback" id="pop-feedback">
                <div class="inner-commponent">
                    <div>{{session('msg')}}</div>
                </div>
            </div>
        @endif
    </div>
</div>