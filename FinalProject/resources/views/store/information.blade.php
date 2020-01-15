@extends('layout.master')
@section('title')
    Checkout Form
@endsection
@section('content')
    @include('partials.nav')
    <div class="container grayStripe">
        <h3>@include('partials.message')</h3>
        <h3 class="error">@include('partials.errors')</h3>
    </div>

{{--  Could maybe use this as a partial, show it once they go through with checkout? --}}

    <div class="container-fluid" id="background">
        <section id="mainContact">
            <div class="container-fluid">
                <h2 class="mb-5 text-center">Forms</h2>
                <div class="row">
                    <!-- member info-->
                    <div class="ml-auto col-sm-12 col-md-12 col-lg-6">
                        <div class="card mb-2">

                            <form>
                                <div class="form-row">
                                    <div class="form-group col-lg-11 col-md-11 m-auto">
                                        <label for="firstName" class="col-form-label">First Name</label>
                                        <input class="form-control form-control-sm" id="firstName" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-lg-11 col-md-11 m-auto">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input class="form-control form-control-sm" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-lg-11 col-md-11 m-auto">
                                        <label for="cellphone" class="col-form-label">Cell Phone</label>
                                        <input class="form-control form-control-sm" id="cellphone" placeholder="Cell Phone">
                                    </div>
                                </div>
                                <div class="form-row ml-md-5 ml-lg-4">

                                    <div class="form-group col-lg-6 col-md-5">
                                        <label for="city" class="col-form-label">City</label>
                                        <input class="form-control form-control-sm" id="city" placeholder="City">
                                    </div>
                                    <div class="form-group col-lg-2 col-md-2">
                                        <label for="state" class="col-form-label">State</label>
                                        <input class="form-control form-control-sm" id="state" placeholder="State">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3">
                                        <label for="zip" class="col-form-label">Zipcode</label>
                                        <input class="form-control form-control-sm" id="zip" placeholder="Zipcode">
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="mr-auto col-sm-12 col-md-12 col-lg-6">

                        <div class="form-group">
                            <label for="message">Your Message...</label>
                            <textarea class="form-control" id="message" rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Message Importance...</label>
                            <select id="inputState" class="form-control">
                                <option selected></option>
                                <option>Extremely Important</option>
                                <option>A little Important</option>
                                <option>Not At All Important</option>
                            </select>
                            <div class="form-group pt-3">
                                <button type="button" class="btn btn-secondary">Submit</button>
                                <button type="button" class="btn btn-dark">Reset</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div> <!-- end form -->

@endsection
