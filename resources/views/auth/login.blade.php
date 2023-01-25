

@extends('../auth/layout')
@section('body')
    <div class="auth " id="login" >
        <img src="{{asset('images/logo.jpg')}}" alt="">
        <div class="google-btn">
            <a href="{{route('auth.google_authenticate')}}">
                <img src="{{asset('images/icons/google.svg')}}" alt="">
                Sign in with Google
            </a>
        </div>
        <div class="or">
            <div class="hr"></div> OR <div class="hr"></div>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email(Name@gmail.com)">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                <span>Remember Me</span>  
            </div>
            <button class="btn"> Login</button>
        </form>
        <div class="ma-t-2">
                <p >I don't have account ! <a href="{{route('register')}}">Sign up</a></p>
            @if(Route::has('password.request'))
                <a href="{{route('password.request')}}" >
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

    </div>
@endsection