@extends('layouts/main', ['bodyClass' => 'login'])

@section('title', 'ScreenMe | Trial Details')
@section('description', 'ScreenMe | Trial Details')
@section('keywords', 'ScreenMe | Trial Details')

@section('content')

    @include('partials._header')

    <section class="container">
        <trial-manager id="{{ Request::route('id') }}"/>
        <h6><a href="/dashboard"><i class="fas fa-arrow-left"></i> go back to your dashboard</a></h6>
    </section>

    @include('partials._footer')

@endsection
