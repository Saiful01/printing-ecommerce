@extends('layouts.admin')
@section('title', 'Add Coupon')

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
                    <h4 class="mb-sm-0">Coupon</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                            <li class="breadcrumb-item active">Coupon Add</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Coupon</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/coupon/store" method="post"
                                  enctype="multipart/form-data">
                                <div class="row gy-4">
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Coupon Code</label>
                                            @csrf
                                            <input type="text" class="form-control" name="coupon" id="coupon"
                                                   placeholder="coupon" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Amount (In percentage)</label>
                                            <input type="text" class="form-control" name="discount" id="discount"
                                                   placeholder="10" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Expire Date</label>
                                            <input type="date" class="form-control" name="expiration_date" id="expiration_date" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="col-xxl-2 col-md-2 col-6">
                                    <button type="submit" class="btn btn-success form-control">Save</button>
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
