@extends('layouts/main', ['bodyClass' => 'template'])

@section('title', 'ScreenMe | ')
@section('description', 'ScreenMe | ')
@section('keywords', 'ScreenMe | ')

@section('content')
    <div class="container">
        <h1>Hello, {{ Auth::user()->name }}</h1>
    </div>
@endsection
