@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Profile Information</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                    <form action="/profile/update" method="post" enctype="multipart/form-data">
                        @csrf
                    <input type="text" class="form-control" name="id" value="{{$data->id}}" hidden>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Name</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="{{$data->name}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="{{$data->email}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Password</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="password" value="{{$data->password}}" placeholder="{{$data->password}}" >

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Profile Pic</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="image" value="{{$data->profile_pic}}">
                            </div>
                        </div>
                        <input type="boolean" class="form-control" name="password" value="{{$data->is_admin}}"  hidden>

                        <div class="form-group row">
                            <label class="col-form-label col-md-2"></label>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
