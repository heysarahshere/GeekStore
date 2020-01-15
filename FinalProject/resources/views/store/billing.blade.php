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

        <form method="POST" action="{{route('payment-post')}}">
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
                            <select  style="color: #9e9e9e; background-color: rgba(241, 241, 241, 0.12);"
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
                <div class="row">
                    <div class="col-lg-12">
                            <h1>Billing Address</h1>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="billingFirstName">First Name</label>
                                <input type="text" class="form-control" id="billingFirstName" name="billingFirstName"
                                       value="{{$billing != ''  ? $billing['firstName'] : ""}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="billingLastName">Last Name</label>
                                <input type="text" class="form-control" id="billingLastName" name="billingLastName"
                                       value="{{$billing != '' ? $billing['lastName'] : ""}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="billing_line1">Address</label>
                            <input type="text" class="form-control" id="billing_line1" name="billing_line1"
                                value="{{$billing != ''  ? $billing['line1'] : ""}}">
                        </div>
                        <div class="form-group">
                            <label for="billing_line2">Address 2</label>
                            <input type="text" class="form-control" id="billing_line2" name="billing_line2"
                                value="{{$billing != '' ? $billing['line2'] : ""}}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="billing_city">City</label>
                                <input type="text" class="form-control" id="billing_city" name="billing_city"
                                value="{{$billing != ''  ? $billing['city'] : ""}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="billing_state">State</label>
                                <select id="billing_state" name="billing_state" class="form-control">
                                    <option value="{{$billing != ''  ? $billing['state'] : ""}}"
                                            selected>{{$billing != ''  ? $billing['state'] : ""}}</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DC">District of Columbia</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="IA">Iowa</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MD">Maryland</option>
                                    <option value="ME">Maine</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MT">Montana</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NY">New York</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VA">Virginia</option>
                                    <option value="VT">Vermont</option>
                                    <option value="WA">Washington</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="billing_zip">Zip</label>
                                <input type="text" class="form-control" id="billing_zip" name="billing_zip"
                                value="{{$billing != '' ? $billing['zip'] : ""}}">
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
            </form>
        <form method="POST" action="{{route('return', ['shipping' => $shipping])}}">
            <button type="submit" class="btn btn-dark">Back to Shipping</button>
            {{ csrf_field() }}
        </form>
    </div> <!-- end hero -->


@endsection
