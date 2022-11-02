@extends('layouts.common')
@section('title', 'Home Page')

@section('content')

    <div class="page-content">
        <div class="holder">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-18 col-lg-12">
                        <h2 class="text-center">Create an Account</h2>
                        <div class="form-wrapper">
                            <form action="/customer/register/store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="firstName" placeholder="First name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="lastName" placeholder="Last name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="clearfix">
                                    <input id="checkbox1" name="checkbox1" type="checkbox" checked="checked" required>
                                    <label for="checkbox1">By registering your details you agree to our <a href="/terms-and-conditions" class="custom-color"  >Terms and Conditions</a></label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn">create an account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
