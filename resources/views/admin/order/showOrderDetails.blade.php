@extends('layouts.admin')

@section('title', 'Product Order Pages')


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
                <h4 class="mb-sm-0">Order</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                    <h4 class="card-title mb-0">Orders
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">


                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="data-table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="sort" data-sort="Image">#</th>
                                        <th class="sort" data-sort="Image">Product Name</th>
                                        <th class="sort" data-sort="Image">Order Date</th>
                                        <th class="sort" data-sort="Details">Short Details</th>
                                        {{--<th class="sort" data-sort="Details">Coupon</th>--}}
                                        <th class="sort" data-sort="status">Details</th>
                                        <th class="sort" data-sort="status">Tags</th>
                                        <th class="sort" data-sort="status">Image</th>
                                        <th class="sort" data-sort="status">Size Details</th>
                                        <th class="sort" data-sort="status">Quantity</th>
                                        <th class="sort" data-sort="action">Price</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                    @php($i=1)
                                    @foreach($orderIteams as $item)
                                        <tr>
                                            <td class="institute">{{$i++}}</td>
                                            <td class="institute">{{$item->product->title}}</td>
                                            <td class="institute">{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                                            <td class="institute">{{$item->product->short_details}}</td>
                                            <td class="institute">{{$item->product->details}}</td>
                                            <td class="institute">{{$item->product->tag}}</td>
                                            <td class="institute"><img src="{{$item->product->featured_image}}" width="80px"></td>
                                            <td class="institute">{{$item->size}}</td>
                                            <td class="institute">{{$item->quantity}}</td>
                                            <td class="institute">${{round($item->price)}}</td>
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
