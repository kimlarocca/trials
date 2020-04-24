@extends('layouts/main', ['bodyClass' => 'login'])

@section('title', 'ScreenMe | Page Not Found')
@section('description', 'ScreenMe | Page Not Found')
@section('keywords', 'ScreenMe | Page Not Found')

@section('content')

    @include('partials._header')

    <section class="container">
        <h1>404 Page Not Found</h1>
        <h3 class="text-primary margin-bottom-1">Are you looking for one of these pages?</h3>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/screen">Get Screened</a></li>
            <li><a href="/search">Search Clinical Trials</a></li>
            <li><a href="/resources">Resources</a></li>
            <li><a href="/contact">Contact Us</a></li>
            <li><a href="/login">Client Login</a></li>
        </ul>
    </section>

    <div class="section-padding-100"></div>

    @include('partials._footer')

@endsection
