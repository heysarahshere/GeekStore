@extends('layout.master')
@section('title')
    About Geek Store
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
                <h1>Hello, {{ auth()->user()->username }}.</h1>

                <div class="container">
                    <div class="row mb-2">
                        <button class="btn btn-dark" type="button" data-toggle="collapse"
                                data-target="#collapsePastOrders" aria-expanded="false"
                                aria-controls="collapsePastOrders">
                            Past Orders
                        </button>
                        <button class="btn btn-dark ml-2" type="button" data-toggle="collapse"
                                data-target="#collapseInfo" aria-expanded="false" aria-controls="collapseInfo">
                            Preferences
                        </button>
                    </div>
                </div>
            </div>
                        <div class="col-sm-6 col-md-9 col-lg-8 m-auto" ><a href="#">
                                <img class="card-img-top"  src="#" alt="dev">
                            </a>
                        </div>
        </div> <!-- end hero -->

    </header>


    <div class="container cart">

        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th><h2>Past Orders</h2></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    </tbody>
                </table>
            </div>
            <div class="collapse" id="collapsePastOrders">
                <div class="card card-body">

                    <div class="featured-section ">
                        <div class="products container">
                            <div class="row">
                                @foreach($orders as $order)
                                    <div class="col-md-3 pl-5 pr-5 m-5">
                                        <div class="card dark" style="width: 20rem;">
                                            <div class="card-header dark-header">
                                                <div>
                                                    <strong>Status: {{$order->status}}</strong>
                                                </div>
                                                <strong>Order date: {{$order->created_at}}</strong>
                                            </div>
                                            <ul class="list-group list-group-flush dark">
                                                <li class="list-group-item">
                                                    Items ordered: {{$order->itemCount}}</li>
                                                <li class="list-group-item">Shipping
                                                    method: {{$order->shippingMethod}}</li>
                                                <li class="list-group-item">Shipping
                                                    cost: {{$order->shippingCost}}</li>
                                                <li class="list-group-item">
                                                    Subtotal: {{$order->subTotal}}</li>
                                                <li class="list-group-item">
                                                    Total: {{$order->totalPrice}}</li>
                                                {{--                                                <li class="list-group-item">{{Payment::find($order->payment_id)}}</li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                    {{-- review shipping --}}
                    <div class="container cart details">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-sm">

                                    <thead>
                                    <tr>
                                        <th><h2>Personal Information</h2></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <div class="collapse" id="collapseInfo">
                                        <div class="card card-body">
                                    @if(count($user->orders))

                                        <tbody>
                                        <tr>
                                            <td><strong>Shipping Address</strong></td>
                                            <td><strong>Billing Address</strong></td>
                                            <td><strong>Primary Payment Method</strong></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>{{$user->shipping_line1 ?? ""}}</p>
                                                <p>{{$user->shipping_line2 ?? ""}}</p>
                                                <p>{{$user->shipping_city ?? ""}}, {{$user->shipping_state ?? ""}}</p>
                                                <p>{{$user->shipping_zip ?? ""}}</p>
                                            </td>
                                            <td>
                                                <p>{{$user->billing_line1 ?? ""}}</p>
                                                <p>{{$user->billing_line2 ?? ""}}</p>
                                                <p>{{$user->billing_city ?? ""}}, {{$user->billing_state ?? ""}}</p>
                                                <p>{{$user->billing_zip ?? ""}}</p>
                                            </td>
                                            <td>
                                                <p>Credit
                                                    Card: {{('***********' . substr($payment->creditCardNumber,-4)) ?? ""}}</p>
                                                <p>Expires: {{$payment->creditCardMonth ?? ""}}
                                                    /{{$payment->creditCardYear ?? ""}}</p>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @else
                                        <table>
                                            <tbody>
                                            <tr>
                                                <th>You have no past orders.</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                        </div>
                                    </div>
                                </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- to upload profile picture --}}
    {{--            <div class="container">--}}
    {{--                <div class="row justify-content-center">--}}
    {{--                    <div class="col-md-12">--}}
    {{--                        <div class="card">--}}
    {{--                            <div class="card-body">--}}
    {{--                                @if (session('status'))--}}
    {{--                                    <div class="alert alert-success" role="alert">--}}
    {{--                                        {{ session('status') }}--}}
    {{--                                    </div>--}}
    {{--                                @endif--}}
    {{--                                <div class="container">--}}
    {{--                                    <div class="row">--}}
    {{--                                        <div class="col-12">--}}
    {{--                                            @if ($errors->any())--}}
    {{--                                                <div class="alert alert-danger alert-dismissible" role="alert">--}}
    {{--                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
    {{--                                                        <span aria-hidden="true">×</span>--}}
    {{--                                                    </button>--}}
    {{--                                                    <ul>--}}
    {{--                                                        @foreach ($errors->all() as $error)--}}
    {{--                                                            <li>--}}
    {{--                                                                {{ $error }}--}}
    {{--                                                            </li>--}}
    {{--                                                        @endforeach--}}
    {{--                                                    </ul>--}}
    {{--                                                </div>--}}
    {{--                                            @endif--}}
    {{--                                            <form action="{{ route('profile-update') }}" method="POST" role="form" enctype="multipart/form-data">--}}
    {{--                                                @csrf--}}
    {{--                                                <div class="form-group row">--}}
    {{--                                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>--}}
    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}">--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="form-group row">--}}
    {{--                                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>--}}
    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="form-group row">--}}
    {{--                                                    <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile Image</label>--}}
    {{--                                                    <div class="col-md-6">--}}
    {{--                                                        <input id="profile_image" type="file" class="form-control" name="profile_image">--}}
    {{--                                                        @if (auth()->user()->image)--}}
    {{--                                                            <code>{{ auth()->user()->image }}</code>--}}
    {{--                                                        @endif--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="form-group row mb-0 mt-5">--}}
    {{--                                                    <div class="col-md-8 offset-md-4">--}}
    {{--                                                        <button type="submit" class="btn btn-dark">Update Profile</button>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </form>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
@endsection
