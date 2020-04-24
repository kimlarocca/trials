@extends('layouts/main', ['bodyClass' => 'screen'])

@section('title', 'ScreenMe | Patient Screening')
@section('description', 'ScreenMe | Patient Screening')
@section('keywords', 'ScreenMe | Patient Screening')

@section('content')

    @include('partials._header')

    <section class="container">
        <screen nct="{{ Request::route('id') }}"/>
    </section>

    @include('partials._footer')

@endsection
