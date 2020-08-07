@extends('layout.master')
@section('title')
    Payment & Shipping
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
                <h1>Payment & Shipping</h1>
                <div class="hero-buttons">
                    <a href="{{route('products')}}" class="button button-white">RETURN TO STORE</a>
                </div>
            </div> <!-- end hero-copy -->
        </div> <!-- end hero -->
    </header>

    <div class="container">
        <form method="POST" action="{{route('checkout-confirm')}}">
            <div class="row ship readonly">
                <div class="col-lg-12">
                    <div class="form-group">
                        <h1>Shipping Address</h1>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                   value="{{$shipping['firstName']}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                   value="{{$shipping['lastName']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shipping_line1">Address</label>
                        <input type="text" class="form-control" id="shipping_line1" name="shipping_line1"
                               value="{{$shipping['line1']}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="shipping_line2">Address 2</label>
                        <input type="text" class="form-control" id="shipping_line2" name="shipping_line2"
                               value="{{$shipping['line2']}}" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="shipping_city">City</label>
                            <input type="text" class="form-control" id="shipping_city"
                                   name="shipping_city" value="{{$shipping['city']}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="shipping_state">State</label>
                            <select style="color: #9e9e9e; background-color: rgba(241, 241, 241, 0.12);"
                                    id="shipping_state" name="shipping_state" class="form-control">
                                <option selected value="{{$shipping['state']}}">{{$shipping['state']}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="shipping_zip">Zip</label>
                            <input type="text" class="form-control" id="shipping_zip" name="shipping_zip"
                                   value="{{$shipping['zip']}}" readonly>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="billingSame"
                                   name="billingSame" disabled="disabled" checked="{{$billing == "" ? false : true}}">
                            <label class="form-check-label" for="billingSame">Billing is same as Shipping</label>
                        </div>
                    </div>
                </div>
            </div>
            {{-- billing --}}
            <div class="row readonly">
                <div class="col-lg-12">
                    <h1>Billing Address</h1>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="billingFirstName">First Name</label>
                            <input type="text" class="form-control" id="billingFirstName" name="billingFirstName"
                                   value="{{$billing != ''  ? $billing['firstName'] : ""}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="billingLastName">Last Name</label>
                            <input type="text" class="form-control" id="billingLastName" name="billingLastName"
                                   value="{{$billing != '' ? $billing['lastName'] : ""}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="billing_line1">Address</label>
                        <input type="text" class="form-control" id="billing_line1" name="billing_line1"
                               value="{{$billing != ''  ? $billing['line1'] : ""}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="billing_line2">Address 2</label>
                        <input type="text" class="form-control" id="billing_line2" name="billing_line2"
                               value="{{$billing != '' ? $billing['line2'] : ""}}" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="billing_city">City</label>
                            <input type="text" class="form-control" id="billing_city" name="billing_city"
                                   value="{{$billing != ''  ? $billing['city'] : ""}}" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="billing_state">State</label>
                            <select style="color: #9e9e9e; background-color: rgba(241, 241, 241, 0.12);"
                                    id="billing_state" name="billing_state" class="form-control">
                                <option value="{{$billing != ''  ? $billing['state'] : ""}}"
                                        selected>{{$billing != ''  ? $billing['state'] : ""}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="billing_zip">Zip</label>
                            <input type="text" class="form-control" id="billing_zip" name="billing_zip"
                                   value="{{$billing != '' ? $billing['zip'] : ""}}" readonly>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h1>Payment Method</h1>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="creditCardNumber">Credit Card Number</label>
                            <input type="number" class="form-control" id="creditCardNumber" name="creditCardNumber"
                                   placeholder="1234123412341234">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="creditCardType">Card Type</label>
                            <select id="creditCardType" name="creditCardType" class="form-control">
                                <option selected>Choose...</option>
                                <option>Visa</option>
                                <option>Mastercard</option>
                                <option>American Express</option>
                                <option>Discover</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="creditCardMonth">Exp Month</label>
                            <input type="number" class="form-control" id="creditCardMonth" name="creditCardMonth"
                                   placeholder="MM">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="creditCardYear">Exp Year</label>
                            <input type="number" class="form-control" id="creditCardYear" name="creditCardYear"
                                   placeholder="YYYY">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="creditCard">CVC</label>
                            <input type="number" class="form-control" id="creditCardCode" name="creditCardCode"
                                   placeholder="CVC">
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group pt-3">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
            {{ csrf_field() }}
        </form>
        <form method="POST" action="{{route('return')}}">
            <button type="submit" class="btn btn-dark">Back</button>
            {{ csrf_field() }}
        </form>
    </div> <!-- end hero -->
