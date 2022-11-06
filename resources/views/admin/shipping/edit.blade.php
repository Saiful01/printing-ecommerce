@extends('layouts.admin')
@section('title', 'Shipping Item Edit')

@section('content')

    <style>
        .form-label {
            height: 32px;
        }
    </style>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Shipping</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                            <li class="breadcrumb-item active">Shipping Item Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Shipping</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/shipping/update" method="post"
                                  enctype="multipart/form-data">
                                <div class="row gy-4">
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Shipping Title</label>
                                            @csrf
                                            <input type="hidden" name="id" value="{{$results->id}}">
                                            <input type="text" class="form-control" value="{{$results->title}}" name="title" id="title"
                                                   placeholder="Shipping Title" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Shipping Price</label>
                                            <div class="form-icon">
                                                <input type="text" class="form-control form-control-icon" value="{{$results->Shipping_charge}}" name="Shipping_charge" id="Shipping_charge" placeholder="40">
                                                <i class="ri-money-dollar-circle-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="col-xxl-2 col-md-2 col-6">
                                    <button type="submit" class="btn btn-success form-control">Update</button>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div> <!-- container-fluid -->
@endsection
