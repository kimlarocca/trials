@extends('layouts/main', ['bodyClass' => 'home contact'])

@section('title', 'ScreenMe | Contact Us')
@section('description', 'ScreenMe | Contact Us')
@section('keywords', 'ScreenMe | Contact Us')

@section('content')

    @include('partials._header')

    <section class="container">
        <div class="grid-x grid-margin-x grid-margin-y align-bottom hero margin-top-1">
            <div class="cell medium-12 large-5">
                <h1>Contact Us</h1>
                <h3 class="text-primary margin-bottom-2">Get your clinical trial screen online and help potential
                    patients find you today!</h3>
                @if (count($errors) > 0)
                    <div class="alert alert-danger margin-bottom-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block margin-bottom-2">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form method="post" action="{{url('sendemail/send')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Your Name:</label>
                        <input type="text" name="name" required class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Your Email:</label>
                        <input type="email" name="email" required class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Your Phone:</label>
                        <input required type="text" name="phone" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label>Your Message:</label>
                        <textarea name="message" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="button" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="section-padding-100"></div>
    <div class="section-padding-100"></div>

    @include('partials._footer')

@endsection
