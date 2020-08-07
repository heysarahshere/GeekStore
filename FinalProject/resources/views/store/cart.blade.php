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
                <div class="hero-buttons pb-3">
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
                <th><h2>Color</h2></th>
                <th><h2>Size</h2></th>
                <th><h2>Price</h2></th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @if($items->count() > 0)
                @foreach($cart->items as $item)
                    <form action="{{route('cart-edit', $item->id) }}" method="POST">
                        <tr>
                            <td>{{$item->name}}</td>
                            <td><input type="text" id="newQuantity" name="newQuantity" value="{{$item->quantity}}">
                                <button type="submit" class="btn btn-dark btn-sm">Update</button>
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                            </td>
                    </form>
                    </td>
                    <td>{{$item->color}}</td>
                    <td>{{$item->size}}</td>
                    <td>${{$item->price * $item->quantity}}</td>

                    <form action="{{ route('cart-delete', ['id' => $item->id]) }}" method="POST">
                        <td class="right">
                            <input type="hidden" value="{{$item->id}}">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                        @csrf
                        @method('DELETE')
                    </form>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>Your cart is empty.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            <tr class="right">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><h2>Total Price: ${{Session::has('newPrice') ? Session('newPrice') : $totalPrice}}</h2></td>
            </tr>
            <tr class="right">
                <td></td>
                <td></td>
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
        @if($items->count() > 0)
        <form action="{{ route('dump-cart') }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-block">Clear Cart</button>
        </form>
            @endif
    </div>


@endsection
