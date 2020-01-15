@extends('layout.master')
@section('title')
    Cart
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
                <h1>Shopping Cart</h1>
                <div class="hero-buttons">
                    <a href="{{route('products')}}" class="button button-white">RETURN TO STORE</a>
                </div>
            </div> <!-- end hero-copy -->

        </div> <!-- end hero -->
    </header>

    <div class="container cart">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><h2>Item Name</h2></th>
                <th><h2>Quantity</h2></th>
                <th><h2>Price</h2></th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @if(Session::has('store'))
{{--                @foreach($products as $product)--}}
{{--                    <tr>--}}
{{--                        <td>{{$product['product']['name']}}</td>--}}
{{--                        <td>{{$product['quantity']}}</td>--}}
{{--                        <td>${{$product['price']}}</td>--}}
{{--                        <td class="right">--}}
{{--                            <a href="#" class="btn btn-dark btn-sm">Edit</a>--}}
{{--                            <a href="#" class="btn btn-danger btn-sm">Delete</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                @endforeach
            @else
                <td>Your cart is empty.</td>
                <td></td>
                <td></td>
                <td></td>
            @endif
            <tr class="right">
                <td></td>
                <td></td>
                <td></td>
                <td><h2>Total Price: ${{$totalPrice ?? '0.00'}}</h2></td>
            </tr>
            <tr class="right">
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="hero-buttons total">
                        <a href="{{route('checkout')}}" class="button button-white">CHECKOUT</a>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>
        <a href="{{route('store')}}" class="btn btn-danger btn-block">Clear Cart</a>
        {{ csrf_field() }}
    </div>


@endsection
