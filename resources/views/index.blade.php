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
                <h3 class="text-primary">Know All Your Treatment Options</h3>
                <p>Millions of people are diagnosed with medical conditions every year. Knowing all your treatment
                    options is critical. ScreenMe helps patients and caregivers like you find relevant clinical trials
                    faster and easier. <a href="/screen">Answer a few screening questions</a> to find clinical trials
                    you may qualify for.</p>
                <div>
                    <a aria-label="get started with screen me" class="button" href="/screen">get screened</a>
                    <a aria-label="learn more about the clinical trial process" class="button ghost" href="/resources">learn
                        more</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container" id="more">
        <div class="grid-x grid-margin-x grid-margin-y align-middle">
            <div class="cell medium-6 fancy-image margin-bottom-1">
                <img alt="woman on her laptop doing an online screening"
                     src="https://images.unsplash.com/photo-1485217988980-11786ced9454?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=768&q=60">
                <div class="background"></div>
            </div>
            <div class="cell medium-6">
                <h2>Need help recruiting?</h2>
                <p>Learn more about how to get your clinical trial screen online and help potential patients find
                    you!</p>
                <p>Recruiting for clinical trials has become increasingly difficult over the years. Learn more about
                    ScreenMe and its easy to use interface that helps find and route patients to your clinical trial
                    centers.</p>
                <p><a href="#" class="learn-more">Contact us to get started</a></p>
            </div>
        </div>
    </section>

    <div class="section-padding-100"></div>
    <hr>
    <div class="section-padding-100"></div>

    <section class="container">
        <h2 class="text-center margin-bottom-3">How does it work?</h2>
        <div class="grid-x grid-margin-x grid-margin-y text-center">
            <div class="cell medium-4 icon-card">
                <i class="fa fas fa-cloud-upload-alt"></i>
                <h3>Import Your Clinical Trials</h3>
                <p>Easily import your study data from ClinicalTrials.gov with the click of a button.</p>
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
        <p class="text-center margin-top-3"><a class="button" href="/contact">contact us to get started!</a></p>
    </section>

    @include('partials._footer')

@endsection
