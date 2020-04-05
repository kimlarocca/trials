@extends('layouts/main', ['bodyClass' => 'template'])

@section('title', 'template')
@section('description', 'template')
@section('keywords', 'template')

@section('content')
    <div class="container">
        <h1>Hello, {{ Auth::user()->name }}</h1>
    </div>
@endsection
