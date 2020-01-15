@extends('layout.master')
@section('title')
    Sign In
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
                <h1>Sign In</h1>
            </div>

            <div class="container signinForm">
                <!-- member info-->
                <div class="col-sm-8 col-md-10 col-lg-8">
                    <form class="form-horizontal signinForm" method="POST" action="{{route('sign-in-post')}}">
                        <input class="form-control"
                               id="username"
                               type="text"
                               name="username"
                               placeholder="username">
                        <input class="form-control"
                               id="password"
                               type="password"
                               name="password"
                               placeholder="password">
                        <div class="form-group pt-3">
                            <button type="submit" class="btn btn-secondary">Sign in</button>
                            <button type="button" class="btn btn-dark"><a href="#">Forgot Password?</a></button>
                        </div>
                        {{ csrf_field() }}
                    </form>
<a href="{{route('sign-up')}}">New? Create an account.</a>
                </div>
            </div>
        </div> <!-- end hero -->
    </header>


    <div class="container-fluid" id="background">
    </div> <!-- end hero -->

@endsection
