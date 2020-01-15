@extends('layout.master')

@section('title')
    Geek Store
@endsection

@section('content')

    <header>
        @include('partials.nav')
        <div class="container binary">
            <h3>@include('partials.message')</h3>
            <h3 class="error">@include('partials.errors')</h3>
        </div>

        <div class="hero container" id="background">
            <div class="hero-copy ">
                <h1>Home</h1>
                <p>Practical items for the every-day geek.</p>
                <div class="hero-buttons">
                    <a href="{{route('products')}}" class="button button-white">SHOP</a>
                    <a href="{{route('blog')}}" class="button button-white">BLOG</a>
                </div>
            </div> <!-- end hero-copy -->
            <div class="col-sm-6 col-md-9 col-lg-8 m-auto" ><a href="https://scc.spokane.edu/What-to-Study/STEM/Software-Development">
                    <img class="card-img-top"  src="{{asset('images/geek.png')}}" alt="dev">
                </a>
            </div>
        </div> <!-- end hero -->
    </header>
    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">Featured</h1>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="img-wrap">
                                        <img src="{{asset('images/womenslong.png')}}" alt="First Slide">
                                    </div>
                            </div> <!-- col // -->
                            <div class="col-md-6">
                                        <h5>Women's Long Sleeved Polo</h5>
                                        <p>Description</p>
                            </div> <!-- col // -->
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="col-md-12">
                            <figure class="card card-product">
                                <div class="img-wrap">
                                    <img src="{{asset('images/menspolo.png')}}" alt="Second Slide">
                                </div>
                                <figcaption class="info-wrap">
                                </figcaption>
                            </figure> <!-- card // -->
                        </div> <!-- col // -->
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-12">
                            <figure class="card card-product">
                                <div class="img-wrap">
                                    <img src="{{asset('images/mug2.png')}}" alt="First Slide">
                                </div>
                                <figcaption class="info-wrap">
                                </figcaption>
                            </figure> <!-- card // -->
                        </div> <!-- col // -->
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div> <!-- end container -->
    </div> <!-- end blog-section -->


@endsection
