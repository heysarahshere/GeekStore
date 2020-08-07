@extends('layout.master')
@section('title')
    Sign Up
@endsection
@section('content')
    <header>
        @include('partials.nav')
        <div class="container grayStripe">
            <h3>@include('partials.message')</h3>
            <h3 class="error">@include('partials.errors')</h3>
        </div>
        <div class="hero container" id="background">
            <div class="hero-copy">
                <h1>Sign Up</h1>
            </div>
            <div class="col-sm-8 col-md-10 col-lg-8">
                <form class="form-horizontal signupForm" method="POST" action="{{route('sign-up-post')}}">
                    <input class="form-control form-control-sm"
                           id="email"
                           type="text"
                           name="email"
                           placeholder="email">
                    <input class="form-control form-control-sm"
                           id="username"
                           type="text"
                           name="username"
                           placeholder="username">
                    <input class="form-control form-control-sm"
                           id="password"
                           type="password"
                           name="password"
                           placeholder="password">
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-secondary">Sign up</button>
                        <button type="reset" class="btn "><a href="{{route('sign-up')}}">Clear</a></button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div> <!-- end hero -->
    </header>

@endsection
