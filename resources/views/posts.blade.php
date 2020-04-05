@extends('layouts/main', ['bodyClass' => 'style-guide'])

@section('title', 'Style Guide')
@section('description', 'Style Guide')
@section('keywords', 'Style Guide')

@section('content')

    <div class="container">
        <p>{{ $post->body }}</p>
    </div>

@endsection
