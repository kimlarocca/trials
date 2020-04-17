@extends('layouts/main', ['bodyClass' => 'screen'])

@section('title', 'Patient Screening')
@section('description', 'Patient Screening')
@section('keywords', 'Patient Screening')

@section('content')

    @include('partials._header')

    <section class="container">
        <screen nct="{{ Request::route('id') }}"/>
    </section>

    @include('partials._footer')

@endsection
