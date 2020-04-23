@extends('layouts/main', ['bodyClass' => 'login'])
@section('title', 'Dashboard')

@section('content')

    @include('partials._header')

    <section class="container padding-top-2">
        <div class="grid-x grid-margin-x grid-margin-y hero bg-light-gray border-radius padding-2">
            <div class="cell medium-6">
                <h1 class="like-h2 margin-bottom-2">My Trials</h1>
            </div>
            <div class="cell medium-6 text-right">
                    <a class="dropdown-item button secondary" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">@csrf</form>
            </div>
            <div class="medium-12">
                <trials></trials>
            </div>
        </div>
    </section>

    @include('partials._footer')
@endsection
