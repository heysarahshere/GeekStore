@extends('layout.master')
@section('title')
    All Products
@endsection
@section('content')

    <header>
        @include('partials.shop-nav')
        <div class="container grayStripe">
            <h3>@include('partials.message')</h3>
            <h3 class="error">@include('partials.errors')</h3>
        </div>

        <div class="hero container">
            <div class="hero-copy">
                <h1>Geek Store</h1>
                <p>Practical items for the every-day geek.</p>
                <div class="hero-buttons">
                    <a href="#" class="button">Featured</a>
                    <a href="#" class="button">On Sale</a>
                </div>
            </div> <!-- end hero-copy -->
                <div class="col-sm-6 col-md-9 col-lg-8 m-auto" ><a href="https://scc.spokane.edu/What-to-Study/STEM/Software-Development">
                        <img class="card-img-top"  src="{{asset('images/geek.png')}}" alt="dev">
                    </a>
            </div>
        </div> <!-- end hero -->
    </header>

    <div class="featured-section">
        <div class="products container text-center">
            <div class="row">
                @foreach($results as $product)
                    <div class="col-md-3 col-lg-4">
                        <figure class="card card-product">
                            <div class="img-wrap">
                                <a href="{{ route('product-details', ['id' => $product->id])}}"><img
                                        src="{{asset('images/').'/'.$product->image_url}}"></a>
                                <a class="btn-overlay" href="{{ route('product-details', ['id' => $product->id]) }}"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                            <figcaption class="info-wrap">
                                <h6 class="title text-dots"><a
                                        href="{{ route('product-details', ['id' => $product->id])}}">{{$product->name}}</a>
                                </h6>
                                <div class="action-wrap">
                                        <span class="badge" style="color: {{$product->color}}">
                                            <input type="hidden" value="{{$product->color}}"></span>
                                        <input type="hidden" value="{{$product->size}}"></span>
                                        <div class="mt-auto">
                                            <a href="{{ route('product-details', ['id' => $product->id])}}" class=" btn btn-dark btn-sm float-right">View</a>
                                        </div>
                                    <div class="price-wrap h5 float-left">
                                            <span class="price-new">
                                                <span class="badge badge-pill badge-dark">$</span>{{$product->price}}
                                            </span>
                                    </div> <!-- price-wrap.// -->
                                </div> <!-- action-wrap -->
                            </figcaption>
                        </figure> <!-- card // -->
                    </div> <!-- col // -->
                @endforeach
            </div>
        </div>
    </div> <!-- end products -->
@endsection
