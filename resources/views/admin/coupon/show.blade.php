@extends('layouts.admin')
@section('title', 'Show Coupon List')

@section('content')


    <style>
        .modal-body {

            overflow: auto;
        }

    </style>


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Coupon List</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                        <li class="breadcrumb-item active">Coupon List</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Coupon List


                        <a type="button" href="/admin/coupon/add" class="btn btn-success add-btn"><i
                                class="ri-add-line align-bottom me-1"></i> Add
                        </a>
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">


                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="data-table">
                                <thead class="table-light">
                                    <tr>

                                        <th class="sort" data-sort="Country">Coupon Code</th>
                                        <th class="sort" data-sort="Country">Discount(In percentage)</th>
                                        <th class="sort" data-sort="Image">Expire Date</th>
                                        <th class="sort" data-sort="Details">Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                    @foreach($results as $item)
                                    <tr>
                                        <td class="institute">{{$item->coupon}}</td>
                                        <td class="institute ">${{$item->discount}}</td>
                                        <td class="institute">{{getExpireDateFormat($item->expiration_date)}}</td>
                                        <td class="institute">@if($item->is_active==1) <span class="badge badge-soft-success">Active</span> @else <span class="badge badge-soft-danger">Inactive</span>@endif</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <a href="/admin/coupon/edit/{{$item->id}}" class="btn btn-sm btn-info edit-item-btn">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="remove">
                                                    <a href="/admin/coupon/delete/{{$item->id}}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-sm btn-danger remove-item-btn">
                                                        Remove
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->



    @push('head')

        <!-- prismjs plugin -->
        <script src="/admin-assets/libs/prismjs/prism.js"></script>
        <script src="/admin-assets/libs/list.js/list.min.js"></script>
        <script src="/admin-assets/libs/list.pagination.js/list.pagination.min.js"></script>

        <!-- listjs init -->
        <script src="/admin-assets/js/pages/listjs.init.js"></script>

    @endpush

@endsection
