@extends('layouts/main', ['bodyClass' => 'home resources'])

@section('title', 'ScreenMe | Clinical Trials Resources')
@section('description', 'ScreenMe | Clinical Trials Resources')
@section('keywords', 'ScreenMe | Clinical Trials Resources')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y align-bottom hero">
            <div class="cell medium-12 large-5">
                <h1>Clinical Trials Resources</h1>
                <h3 class="text-primary">Understanding the clinical trial process</h3>
                <p>This page is coming soon, please check back later!</p>
                <div>
                    <a class="button" href="/screen">get screened now</a>
                </div>
            </div>
        </div>
    </section>

    @include('partials._footer')

@endsection
