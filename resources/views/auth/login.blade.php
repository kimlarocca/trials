@extends('layouts.app', ['mainClass' => 'login'])
@section('title', '4 Site | Login')

@section('content')
    <div class="content">
        <h4 class="margin-bottom-0">4 Site</h4>
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label class="hide-ally-element" for="email">{{ __('E-Mail Address') }}</label>

            <input placeholder="email address" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <label class="hide-ally-element" for="password">{{ __('Password') }}</label>

            <input placeholder="password" id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" name="password"
                   required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="remember-me">{{ __('Remember Me') }}</label>

            <button type="submit" class="button">{{ __('Login') }}</button>

            @if (Route::has('password.request'))
                <p class="margin-top-1 margin-bottom-0 text-right strong">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                </p>
            @endif
        </form>
    </div>
@endsection
