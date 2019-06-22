@extends('layouts.login')

@section('content')




<head>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>
</head>

<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <h1><span class="brand-mini"><i class="fa fa-leaf"></i></span></h1>

    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif    
    <label for="inputPassword" class="sr-only">Password</label>
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    <div class="checkbox mb-3">
            <label class="ui-checkbox ui-checkbox-info">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="input-span"></span>Remember me
            </label><br>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-info btn-block">
            {{ __('Login') }}
        </button>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>



{{-- <div class="brand">
    <a class="link" href="index.html">SMSRL Portal</a>
</div>
<form method="POST" action="{{ route('login') }}">
@csrf
    <h2 class="login-title">Log in</h2>
    <div class="form-group">
        <div class="input-group-icon right">
            <div class="input-icon"><i class="fa fa-envelope"></i></div>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="input-group-icon right">
            <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group d-flex justify-content-between">
        <label class="ui-checkbox ui-checkbox-info">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="input-span"></span>Remember me</label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info btn-block">
            {{ __('Login') }}
        </button>
    </div>
    <div class="social-auth-hr">
        <span>Or login with</span>
    </div>
    <div class="text-center">Not a member?
        <a class="color-blue" href="register.html">Create accaunt</a>
    </div>
</form> --}}

@endsection
