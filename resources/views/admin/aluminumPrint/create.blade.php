@extends('layouts.admin')
@section('title', 'Add Aluminum Print Price')

@section('content')
    <style>
        .form-label {
            height: 32px;
        }
        .btn-success{
            margin-top: 54px !important;
        }
    </style>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Aluminum Page</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Aluminum</a></li>
                            <li class="breadcrumb-item active">Print Price</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Input Size & Price</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/aluminum/price/store" method="post"
                                  enctype="multipart/form-data">
                                <div class="row gy-4">
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Aluminum Size</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                   placeholder="12 X 18" required>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Price</label>
                                            <input type="text" class="form-control" name="price" id="price"
                                                   placeholder="25.16" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-md-6">
                                        <button type="submit" class="btn btn-success form-control">Submit</button>
                                    </div>
                                    <!--end col-->
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
