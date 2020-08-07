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
                <div class="hero-buttons pb-3">
                    <a href="{{route('products')}}" class="button button-white">RETURN TO STORE</a>
                </div>
            </div> <!-- end hero-copy -->
        </div> <!-- end hero -->
    </header>

    <div class="container">
        <form method="POST" action="{{route('billing')}}">
            <div class="row ship">
                <div class="col-lg-12">
                    <div class="form-group">
                        <h1>Shipping Address</h1>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                   value="{{$shipping != "" ? $shipping['firstName'] : ""}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                   value="{{$shipping != "" ? $shipping['firstName'] : ""}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shipping_line1">Address</label>
                        <input type="text" class="form-control" id="shipping_line1" name="shipping_line1"
                               value="{{$shipping != "" ? $shipping['line1'] : ""}}">
                    </div>
                    <div class="form-group">
                        <label for="shipping_line2">Address 2</label>
                        <input type="text" class="form-control" id="shipping_line2" name="shipping_line2"
                               value="{{$shipping != "" ? $shipping['line2'] : ""}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="shipping_city">City</label>
                            <input type="text" class="form-control" id="shipping_city"
                                   name="shipping_city" value="{{$shipping != "" ? $shipping['city'] : ""}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="shipping_state">State</label>
                            <select id="shipping_state" name="shipping_state" class="form-control">
                                <option value="{{$shipping != "" ? $shipping['state'] : ""}}" selected>
                                    {{$shipping != "" ? $shipping['state'] : ""}}</option>
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
                            <label for="shipping_zip">Zip</label>
                            <input type="text" class="form-control" id="shipping_zip"
                                   name="shipping_zip" value="{{$shipping != "" ? $shipping['zip'] : ""}}">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="billingSame"
                                   name="billingSame">
                            <label class="form-check-label" for="billingSame">Billing is same as Shipping</label>
                        </div>
                    </div>
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-secondary">Next</button>
                        <button type="button" class="btn btn-dark"><a href="{{route('index')}}">Cancel</a></button>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
        </form>
    </div>

@endsection
