@extends('layouts.admin')

@section('title', 'Customer List')


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
                <h4 class="mb-sm-0">Customer</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                        <li class="breadcrumb-item active">Customer List</li>
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
                    <h4 class="card-title mb-0">Customer


                        <a type="button" href="/admin/wall-art-poster/add" class="btn btn-success add-btn"><i
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
                                        <th class="sort" data-sort="Country">First Name</th>
                                        <th class="sort" data-sort="Country">Last Name</th>
                                        <th class="sort" data-sort="Image">Email</th>
                                        <th class="sort" data-sort="Details">Phone</th>
                                        <th class="sort" data-sort="Details">Address</th>
                                        <th class="sort" data-sort="status">Address 2</th>
                                        <th class="sort" data-sort="status">City</th>
                                        <th class="sort" data-sort="status">State</th>
                                        <th class="sort" data-sort="status">ZipCode</th>
                                        <th class="sort" data-sort="status">Company</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                    @foreach($results as $item)
                                        <tr>
                                            <td class="institute">{{$item->firstName}}</td>
                                            <td class="institute">{{$item->lastName}}</td>
                                            <td class="institute">{{$item->email}}</td>
                                            <td class="institute">{{$item->customerAddress->phone}}</td>
                                            <td class="institute">{{$item->customerAddress->address}}</td>
                                            <td class="institute">{{$item->customerAddress->address2}}</td>
                                            <td class="institute">{{$item->customerAddress->city}}</td>
                                            <td class="institute">{{$item->customerAddress->state}}</td>
                                            <td class="institute">{{$item->customerAddress->zipCode}}</td>
                                            <td class="institute">{{$item->customerAddress->company}}</td>
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
