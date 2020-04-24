@extends('layouts/main', ['bodyClass' => 'login'])
@section('title', 'ScreenMe | Login')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y hero">
            <div class="cell medium-12 large-4 padding-top-3">
                <h3>Need help recruiting?</h3>
                <p>Recruiting for clinical trials has become increasingly difficult over the years. Learn more about
                    ScreenMe and its easy to use interface that helps find and route patients to your clinical trial
                    centers.</p>
                <p><a href="#" class="learn-more">Contact us to get started</a></p>
            </div>
            <div class="cell medium-12 large-8 bg-light-gray border-radius padding-2">
                <h1 class="margin-bottom-2 like-h2">Client Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input placeholder="email address" id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <label for="password">{{ __('Password') }}</label>

                    <input placeholder="password" id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="remember-me">{{ __('Remember Me') }}</label>

                    <div>
                        <button type="submit" class="button margin-top-1">{{ __('Login') }}</button>
                    </div>

                    @if (Route::has('password.request'))
                        <p class="margin-top-1 margin-bottom-0 text-right strong">
                            <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </section>

    @include('partials._footer')
@endsection
