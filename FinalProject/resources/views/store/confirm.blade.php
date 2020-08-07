@extends('layout.master')
@section('title')
    Order Confirmation
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
                <h1>Order Confirmation</h1>
                <div class="hero-buttons pb-3">
                    <a href="{{route('products')}}" class="button button-white">RETURN TO STORE</a>
                </div>
            </div> <!-- end hero-copy -->

        </div> <!-- end hero -->
    </header>

    {{--  cart items  --}}
    <div class="container cart">
        <div class="row">
            <div class="col-md-9">
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


                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <table class="table table-sm">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h2>Subtotal: ${{$totalPrice}}</h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="row">
                                <form method="POST" action="{{route('calc-shipping')}}">
                                <select id="shippingOption" name="shippingOption" class="form-control-sm col-md-8 mr-auto">
                                    <option id="option1" value="4.99">USPS First Class - $4.99</option>
                                    <option id="option2" value="8.99">USPS Priority - $8.99</option>
                                    <option id="option3"  value="12.99">Fedex Overnight - $12.99</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-dark col-md-3 mr-auto" >Total</button>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @if(Session::has('shippingOption'))
                        <td><h2>Total: ${{$totalPrice + $shippingOption}}</h2></td>
                         @else<td>Total: &nbsp; --</td>
                         @endif
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="hero-buttons total text-center">
                    <a class="btn btn-dark btn-lg btn-block" disabled>Confirm Order</a>
                </div>
            </div>
        </div>
        <div class="container cart details">
            <div class="row">
                <div class="col-md-9">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th><strong>Ship To</strong></th>
                            <th><strong>Bill To</strong></th>
                            <th><strong>Payment</strong></th>
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
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
