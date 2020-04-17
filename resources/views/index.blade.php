@extends('layouts/main', ['bodyClass' => 'home'])

@section('title', 'Home')
@section('description', 'Home')
@section('keywords', 'Home')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y align-bottom hero">
            <div class="cell medium-12 large-5">
                <h1>Screen Me</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aut, cum dolorem et, excepturi
                    illum inventore labore laboriosam necessitatibus nisi non odio officiis quo repellat saepe sequi
                    tempore veniam!</p>
                <div><a class="button">get started</a> <a class="button ghost">learn more</a></div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y align-middle">
            <div class="cell medium-6 fancy-image margin-bottom-1">
                <img alt="woman on her laptop doing an online screening"
                     src="https://images.unsplash.com/photo-1485217988980-11786ced9454?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=768&q=60">
                <div class="background"></div>
            </div>
            <div class="cell medium-6">
                <h2>Here's a subheader</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi, aut distinctio dolorem
                    eligendi eos, ex facere inventore maxime nemo obcaecati quae, quasi sit soluta totam. Ea facilis
                    ipsam neque!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi, aut distinctio dolorem
                    eligendi eos, ex facere inventore maxime nemo obcaecati quae, quasi sit soluta totam. Ea facilis
                    ipsam neque!</p>
                <p><a href="#" class="learn-more">Learn More About This</a></p>
            </div>
        </div>
    </section>

    <section class="container section-padding-100">
        <div class="grid-x grid-margin-x grid-margin-y text-center">
            <div class="cell medium-4 icon-card">
                <i class="fa fas fa-cloud-upload-alt"></i>
                <h3>Import Clinical Trial</h3>
                <p>Easily import your study data from ClinicalTrials.gov wit the click of a button.</p>
            </div>
            <div class="cell medium-4 icon-card">
                <i class="fa fas fa-link"></i>
                <h3>Get Your Screening Link</h3>
                <p>Automatically generate a custom link you can use to screen potential patients.</p>
            </div>
            <div class="cell medium-4 icon-card">
                <i class="fa fas fa-clinic-medical"></i>
                <h3>View Screening Results</h3>
                <p>Our real-time dashboard allows you to view your trial's screening results.</p>
            </div>
        </div>
    </section>

    @include('partials._footer')

@endsection
