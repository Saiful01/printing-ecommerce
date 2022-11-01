@extends('layouts.admin')
@section('title', 'Add Custom Print Size Price')

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
                    <h4 class="mb-sm-0">Poster Page</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Poster</a></li>
                            <li class="breadcrumb-item active">Size Price</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Input Custom Size & Price</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/custom/price/store" method="post"
                                  enctype="multipart/form-data">
                                <div class="row gy-4">
                                    <div class="col-xxl-2 col-md-2 col-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Min Size</label>
                                            <input type="text" class="form-control" name="min" id="min"
                                                   placeholder="2001" required>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-md-2 col-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Max Size</label>
                                            <input type="text" class="form-control" name="max" id="max"
                                                   placeholder="400" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-md-2 col-6">
                                        <div>
                                            <label for="labelInput" class="form-label">Photo Premium Glossy
                                                Price</label>
                                            <input type="text" class="form-control" name="photo_premium_glossy" id="photo_premium_glossy"
                                                   placeholder="0.0485" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-md-2 col-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Canvas Price</label>
                                            <input type="text" class="form-control" name="canvas" id="canvas"
                                                   placeholder="0.1499" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-md-2 col-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Banner Price</label>
                                            <input type="text" class="form-control" name="banner" id="banner"
                                                   placeholder="0.1249" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-md-2 col-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Self Adhesive Synthetic
                                                Price</label>
                                            <input type="text" class="form-control" name="self_adhesive" id="self_adhesive"
                                                   placeholder="0.0702" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-md-2 col-6">
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
