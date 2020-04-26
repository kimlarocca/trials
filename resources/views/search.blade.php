@extends('layouts/main', ['bodyClass' => 'home search'])

@section('title', 'ScreenMe | Search For Clinical Trials')
@section('description', 'ScreenMe | Search For Clinical Trials')
@section('keywords', 'ScreenMe | Search For Clinical Trials')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y align-bottom hero">
            <div class="cell medium-12 large-5">
                <h1>Search Clinical Trials</h1>
                <p>This page is coming soon, please check back later!</p>
            </div>
        </div>
    </section>

    @include('partials._footer')

@endsection
