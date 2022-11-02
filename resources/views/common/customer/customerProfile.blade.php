@extends('layouts.common')
@section('title', 'Profile Page')

@section('content')
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>My account</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 aside aside--left">
                        <div class="list-group">
                            {{--<a href="account-details.html" class="list-group-item active">Account Details</a>--}}
                            <a href="/customer/order/history" class="list-group-item">My Order History</a>
                            <a href="/customer/logout" class="list-group-item">Logout</a>
                        </div>
                    </div>
                    <div class="col-md-10 aside">
                        <h2 class="mb-3">Account Details</h2>
                        <div class="row vert-margin">
                            <div class="col-sm-18">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mt-2">
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">First Name:</label>
                                                <h3>{{$result->firstName}}</h3>
                                            </div>
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">Last Name:</label>
                                                <h3>{{$result->lastName}}</h3>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">Email:</label>
                                                <h3>{{$result->email}}</h3>
                                            </div>
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">Phone:</label>
                                                <h3>{{$result->phone}}</h3>
                                            </div>
                                        </div>
                                        @if($result->customerAddress != null)
                                        <div class="row mt-2">
                                            <div class="col-sm-18">
                                                <label class="text-uppercase">Address 1:</label>
                                                <h3>{{$result->customerAddress->address}}</h3>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">Address 2:</label>
                                                <h3>{{$result->customerAddress->address2}}</h3>
                                            </div>
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">Phone:</label>
                                                <h3>{{$result->customerAddress->phone}}</h3>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">City:</label>
                                                <h3>{{$result->customerAddress->city}}</h3>
                                            </div>
                                            <div class="col-sm-9">
                                                <label class="text-uppercase">Zip Code:</label>
                                                <h3>{{$result->customerAddress->zipCode}}</h3>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
