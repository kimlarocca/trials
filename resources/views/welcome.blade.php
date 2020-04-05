@extends('layouts.app', ['mainClass' => 'login'])
@section('title', '4 Site | Login')

@section('content')
    <div class="container">
        <h1>
            @auth
                Hello, {{ Auth::user()->name }}
            @else
                Welcome
            @endauth
        </h1>
    </div>
@endsection
