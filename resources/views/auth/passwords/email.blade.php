@extends('layouts/main', ['bodyClass' => 'login'])
@section('title', 'ScreenMe | Reset Password')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y hero">
            <div class="cell medium-12 large-4 padding-top-3">
            </div>
            <div class="cell medium-12 large-8 bg-light-gray border-radius padding-2">
    <div class="content">
        <h1 class="like-h2">Reset Password</h1>
        @if (session('status'))
            <div class="alert alert-success margin-bottom-1" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email" class="hide-ally-element">{{ __('E-Mail Address') }}</label>
            <input placeholder="email address" id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <p class="invalid-feedback margin-vertical-1 strong" role="alert"><strong>{{ $message }}</strong></p>
            @enderror

            <button type="submit" class="button">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div></div></div>
    </section>

    @include('partials._footer')
@endsection
