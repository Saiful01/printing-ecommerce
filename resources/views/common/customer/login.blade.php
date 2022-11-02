@extends('layouts.common')
@section('title', 'Home Page')

@section('content')

    <div class="page-content">
        <div class="holder">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-9">
                        <h2 class="text-center">Login to Account</h2>
                        <div class="form-wrapper">
                            <form action="/customer/login-check">
                                @csrf
                                <input type="hidden" name="previous_url" value="{{$previous}}">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="text-center">
                                    <button class="btn">Login</button>
                                </div>

                                <div class="clearfix">
                                    <label for="checkbox1">Don't have account <a href="/customer/register" class="custom-color"><b>Register Here</b></a></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
