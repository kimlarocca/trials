@extends('layouts.app', ['mainClass' => 'login'])
@section('title', '4 Site | Login')

@section('content')
    <div class="container">
        <h1>{{ Auth::user()->name }}'s Dashboard</h1>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in! {{ Auth::user()->name }}
    </div>
@endsection
