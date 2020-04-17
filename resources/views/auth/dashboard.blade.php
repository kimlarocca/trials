@extends('layouts/main', ['bodyClass' => 'login'])
@section('title', 'Dashboard')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y hero">
            <div class="cell medium-12 large-4 padding-top-3">
            </div>
            <div class="cell medium-12 bg-light-gray border-radius padding-2">
                <h1 class="like-h2 margin-bottom-2">{{ Auth::user()->name }}'s Dashboard</h1>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in! {{ Auth::user()->name }}
            </div>
        </div>
    </section>

    @include('partials._footer')
@endsection
