@extends('layouts.app', ['mainClass' => 'login'])
@section('title', '4 Site | Reset Password')

@section('content')
    <div class="content">
        <h1>Reset Password</h1>
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
    </div>
@endsection
