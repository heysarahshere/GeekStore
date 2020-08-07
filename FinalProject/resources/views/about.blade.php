@extends('layout.master')
@section('title')
    About
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
                <h1>About Us</h1>
                <p>Who are we? Why are we selling polos and travel mugs? Learn more here.</p>
                <div class="hero-buttons">
                    <a href="{{route('products')}}" class="button">SHOP</a>
                    <a href="{{route('blog')}}" class="button">BLOG</a>
                </div>
            </div>
                    <div class="col-sm-6 col-md-9 col-lg-8 m-auto" ><a href="https://scc.spokane.edu/What-to-Study/STEM/Software-Development">
                            <img class="card-img-top"  src="{{asset('images/geek.png')}}" alt="dev">
                        </a>
                </div>
            </div> <!-- end hero -->
    </header>
    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">From Our Blog</h1>

            <p class="section-description text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et sed
                accusantium maxime dolore cum provident itaque ea, a architecto alias quod reiciendis ex ullam id,
                soluta deleniti eaque neque perferendis.</p>

            <div class="blog-posts">
                <div class="blog-post text-center" id="blog1">
                    <a href="#"><img src="{{asset('images/nscom.png')}}" alt="blog image"></a>
                    <a href="#"><h2 class="blog-title">Old School Programming</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam,
                        ipsa quasi?
                    </div>
                </div>
                <div class="blog-post text-center" id="blog2">
                    <a href="#"><img src="{{asset('images/nscod.png')}}" alt="blog image"></a>
                    <a href="#"><h2 class="blog-title">Coding Challenges</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam,
                        ipsa quasi?
                    </div>
                </div>
                <div class="blog-post text-center" id="blog3">
                    <a href="#"><img src="{{asset('images/nscon.png')}}" alt="blog image"></a>
                    <a href="#"><h2 class="blog-title">Gaming Since the 70s</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ullam,
                        ipsa quasi?
                    </div>
                </div>
            </div> <!-- end blog-posts -->
        </div> <!-- end container -->
    </div> <!-- end blog-section -->
@endsection
