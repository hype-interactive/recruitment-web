@extends('layouts.frame')
@section('content')
<div class="container">
    <div class="auth-wrapper">
        <div class="auth" id="signup">
            <img src="{{asset('images/logo.jpg')}}" alt="">
            <div class="google-btn">
                <a href="">
                    <img src="{{asset('images/icons/google.svg')}}" alt="">
                    Sign up with Google
                </a>
            </div>
            <div class="or">
                <div class="hr"></div> OR <div class="hr"></div>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <input id="fname" type="text" class=" @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus placeholder="First Name">
                    @error('fname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="lname" type="text" class=" @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus placeholder="Last Name">
                    @error('lname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="phone" type="tell" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
        
                <button class="btn" type="submit"> Register</button>

            </form>
            <p class="ma-t-2">Have already an account <a onclick="setnew('login')">Login here</a></p>
        </div>
        <div class="auth" id="login" style="display: none">
            <img src="{{asset('images/logo.jpg')}}" alt="">
            <div class="google-btn">
                <a href="">
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
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </div>
                <button class="btn"> Login</button>
            </form>
            <div class="row ma-t-2">
                <div class="col-md-6">
                    <p >I don't have account ! <a onclick="setnew('signup')">Sign up</a></p>
                </div>
                <div class="col-md-6">
                            @if(Route::has('password.request'))
                                <a onclick="setnew('reset')" >
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                </div>
            </div>

        </div>
        <div class="auth" id="reset" style="display: none">
            <img src="{{asset('images/logo.jpg')}}" alt="">
            <div class="card">
                <div class="card-header">
                    <h4>Reset Password</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div>
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                <button class="btn"> Send Password Reset Link </button>
            </form>
            <p class="ma-t-2">Go back to <a onclick="setnew('login')">Login</a></p>

        </div>
    </div>
</div>
@endsection

