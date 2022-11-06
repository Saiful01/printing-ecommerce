@extends('layouts.admin')
@section('title', 'Add Tax')

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
                    <h4 class="mb-sm-0">Tax</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                            <li class="breadcrumb-item active">Tax Add</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Tax</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/tax/store" method="post"
                                  enctype="multipart/form-data">
                                <div class="row gy-4">
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Amount (In percentage)</label>
                                            @csrf
                                            <input type="text" class="form-control" name="amount" id="amount"
                                                   placeholder="10" required>
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
