@extends('layout.master')
@section('title')
    Product Details
@endsection
@section('content')

    <header>
        @include('partials.nav')
        <div class="container grayStripe">
            <h3>@include('partials.message')</h3>
            <h3 class="error">@include('partials.errors')</h3>
        </div>

            {{--    Product Details    --}}
        <div class="hero container" id="background">
            <div class="hero-copy">
                <form method="POST"
                      action="{{route('cart-add', ['name' => $product->name, 'id' => $product->id])}}">
                    @if($average > 0)
                        <div class="row">
                            @for ($x = 0; $x < $average; $x++)
                                <span class="p-1" style="font-size: x-large"><i
                                        class="text-light fa fa-star"></i></span>
                            @endfor
                                <a href="#reviewSection" class="p-2">{{$all_reviews->count()}} REVIEWS</a>
                        </div>
                    @else
                        <div class="row">
                            <h5 class="p-1" style="text-decoration: underline">0 REVIEWS</h5>
                        </div>
                    @endif
                    <h1 class="p-0 mt-0">{{$product->name}}</h1>

                    <div class="description">
                        <h2>${{ $product->price }}</h2>
                        <p>{{ $product->description }}</p>

                    </div>
                    <div class="mt-10 description col-md-8 col-lg-10">
                        <div class="row col-md-12">
                            <label for="size">Size:</label>
                            <select id="size" name="size" class="form-control col-md-8 ml-auto">
                                <option value="" selected>Choose size...</option>
                                @foreach($sizes as $size)
                                    <option>{{$size}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <label for="color" class="col-md-2" style="text-align:left">Color:</label>
                        <div class="ml-auto description col-md-10">
{{--                            <label for="color" style="text-align:left">Color:</label>--}}
                            {{--                        <div class="form-check form-check-inline">--}}
                            @foreach($colors as $color)
                                <label class="{{$color}}">
                                    <div class="form-check form-check-inline ">
                                        <input type="radio" name="color" id="{{$color}}" value="{{$color}}"
                                               title="{{$color}}"/>
                                        <label for="{{$color}}" class="m-auto"><i class="fa fa-circle pl-1"
                                                                                  style="font-size: 40px"></i></label>
                                    </div>
                                </label>
                            @endforeach

                        </div>
                    </div>
                    @if(Auth::check())
                        <div class="mt-auto">
                            <button type="submit" class=" btn btn-dark">ADD TO CART</button>
                        </div>
                    @else
                        <div class="mt-auto" style="color: #500006">
                            <h5>Please log in or sign up to shop.</h5>
                            <button type="submit" class=" btn btn-dark" disabled>ADD TO CART</button>
                        </div>
                    @endif
                    {{ csrf_field() }}
                </form>
            </div> <!-- end hero-copy -->

            <div class="hero-image">
                <img src="{{asset('images/').'/'.$product->image_url}}" alt="hero image">
            </div>
        </div> <!-- end hero -->
    </header>

    <div class="container-fluid reviews blog-section">
        <div class="container light">
            {{--       Write a Review      --}}
            @if(Auth::check())
            <button class="btn btn-dark m-2" type="button" data-toggle="collapse" data-target="#collapseWrite"
                    aria-expanded="false" aria-controls="collapseExample">
                Write a Review
            </button>
            <div class="collapse" id="collapseWrite">
                <div class="card card-body">
                        <div class="">
                            <form method="POST" action="{{route('post-review', ['id' => $product->id])}}">
                                <div class="row">
                                    <div class="form-group col-md-9">
                                        <input type="text" class="form-control col-md-12" name="reviewTitle"
                                               id="reviewTitle"
                                               placeholder="Review Title"/>
                                    </div>
                                    <div class="form-group ml-auto col-md-3">
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5"/><label for="star5"
                                                                                                           title="Awesome!">5
                                                stars</label>
                                            <input type="radio" id="star4" name="rating" value="4"/><label for="star4"
                                                                                                           title="Pretty good.">4
                                                stars</label>
                                            <input type="radio" id="star3" name="rating" value="3"/><label for="star3"
                                                                                                           title="Meh.">3
                                                stars</label>
                                            <input type="radio" id="star2" name="rating" value="2"/><label for="star2"
                                                                                                           title="Kinda bad.">2
                                                stars</label>
                                            <input type="radio" id="star1" name="rating" value="1"/><label for="star1"
                                                                                                           title="Sucks big time.">1
                                                star</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group">
                        <textarea class="form-control" id="reviewContent" name="reviewContent" rows="4"
                                  placeholder="Product Feedback"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark ml-auto">Submit</button>
                                {{ csrf_field() }}
                            </form>
                        </div>
                </div>
            </div>
                @endif

            {{--    Show Reviews   --}}
                @if($reviews->count() > 0)
                    <button class="btn btn-dark  m-2 " type="button" data-toggle="collapse" id="reviewSection"
                            data-target="#collapseReviews" aria-expanded="true" aria-controls="collapseReviews">
                        Show/Hide Reviews
                    </button>
                    <div class="collapse show" id="collapseReviews">
                        <div class="card card-body">
                            {{--       All Reviews      --}}
                            {{--     to repeat    --}}
                            @foreach($reviews as $review)
                                <div class="card mt-2 reviews">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-3">
                                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg"
                                                     class="img img-rounded img-fluid"/>
                                                <p class="text-secondary text-center">{{$review->created_at->diffForHumans()}}</p>
                                            </div>
                                            <div class="col-md-10 col-sm-9">
                                                <p><a style="color: black; font-size: larger" class="float-left p-1"
                                                      href="#"><strong>Posted by
                                                            {{$review->poster}}</strong></a>
                                                    @for ($x = 0; $x < $review->rating; $x++)
                                                        <span class="float-right p-1"><i
                                                                class="text-danger fa fa-star"></i></span>
                                                    @endfor
                                                </p>
                                                <div class="card-header">
                                                    <div class="clearfix darkish"></div>
                                                </div>
                                                <p>{{$review->comment}}</p>
                                                <p><a class="float-right btn btn-outline-dark ml-2 mt-2"> <i
                                                            class="fa fa-reply"></i>Reply</a>
                                                    <a class="float-right btn text-white btn-danger mt-2"> <i
                                                            class="fa fa-heart"></i> Like</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div> <!-- end card -->
                            @endforeach
                            <div class="col">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                    <p>
                        {{--                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
                        {{--                    Link with href--}}
                        {{--                </a>--}}

                    </p>
                @endif
            </div>
        </div>

@endsection
