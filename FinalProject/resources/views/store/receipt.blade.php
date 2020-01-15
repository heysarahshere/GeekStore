@extends('layout.master')
@section('title')
    Order Summary
@endsection
@section('content')


    <header>
        @include('partials.nav')
        <h3>@include('partials.message')</h3>
        <h3 class="error">@include('partials.errors')</h3>

        <div class="hero container pb-4" id="background">
            <div class="hero-copy">
                <h1>Thank You</h1>
                <div class="hero-buttons">
                    <a href="{{route('products')}}" class="button button-white">RETURN TO STORE</a>
                </div>

            </div> <!-- end hero-copy -->

        </div> <!-- end hero -->
    </header>
    {{--  cart items  --}}
    <div class="container cart">
        <div class="row">

            <div class="col-md-12">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th><h3>Order Summary</h3></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th><h2>Item Name</h2></th>
                        <th><h2>Quantity</h2></th>
                        <th><h2>Color</h2></th>
                        <th><h2>Size</h2></th>
                        <th><h2>Price</h2></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->size}}</td>
                            <td>${{$item->price}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>


            {{-- review shipping --}}
            <div class="container cart details">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th><strong>Ship To</strong></th>
                                <th><strong>Bill To</strong></th>
                                <th><strong>Payment</strong></th>
                                <th><h2>Total: ${{$totalPrice + $shippingCost}}</h2></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <p>{{$user['shipping_line1']}}</p>
                                    <p>{{$user['shipping_line2']}}</p>
                                    <p>{{$user['shipping_city']}}, {{$user['shipping_state']}}</p>
                                    <p>{{$user['shipping_zip']}}</p>
                                </td>
                                <td>
                                    <p>{{$user['billing_line1']}}</p>
                                    <p>{{$user['billing_line2']}}</p>
                                    <p>{{$user['billing_city']}}, {{$user['billing_state']}}</p>
                                    <p>{{$user['billing_zip']}}</p>
                                </td>
                                <td>
                                    <p>Credit Card: {{('***********' . substr($payment['creditCardNumber'],-4))}}</p>
                                    <p>Expires: {{$payment['creditCardMonth']}}/{{$payment['creditCardYear']}}</p>
                                </td>
                                <td>
                                    <strong>Subtotal: ${{$totalPrice}}</strong>
                                    </td>
                            </tr>
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                            <tr>
                                <td><strong>Shipping & Handling: ${{$shippingCost}}</strong>
                                    <p>Shipping method: {{$shippingMethod}}</p></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>



@endsection
