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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi consectetur consequuntur
                    debitis earum, impedit iure libero maxime modi molestiae praesentium provident ratione sapiente
                    tenetur velit voluptatem voluptatum. Accusamus, exercitationem?</p>
            </div>
        </div>
    </section>

    @include('partials._footer')

@endsection
