@extends('layouts/main', ['bodyClass' => 'home contact'])

@section('title', 'ScreenMe | Contact Us')
@section('description', 'ScreenMe | Contact Us')
@section('keywords', 'ScreenMe | Contact Us')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y align-bottom hero">
            <div class="cell medium-12 large-5">
                <h1>Contact Us</h1>
                <h3 class="text-primary">Lorem ipsum dolor sit amet consectetur</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi consectetur consequuntur
                    debitis earum, impedit iure libero maxime modi molestiae praesentium provident ratione sapiente
                    tenetur velit voluptatem voluptatum. Accusamus, exercitationem?</p>
            </div>
        </div>
    </section>

    @include('partials._footer')

@endsection
