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
                                    <th class="sort" data-sort="Image">Invoice</th>
                                    <th class="sort" data-sort="Image">Order Date</th>
                                    <th class="sort" data-sort="Details">Customer Name</th>
                                    <th class="sort" data-sort="Details">Shipping Address</th>
                                    <th class="sort" data-sort="status">Total Price</th>
                                    <th class="sort" data-sort="status">Discount</th>
                                    <th class="sort" data-sort="status">Shipping Charge</th>
                                    <th class="sort" data-sort="status">Subtotal Price</th>
                                    <th class="sort" data-sort="status">Payment Status</th>
                                    <th class="sort" data-sort="status">Order Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                @php($i=1)
                                @foreach($order as $item)
                                    <tr>
                                        <td class="institute">{{$i++}}</td>
                                        <td class="institute">{{$item->invoice}}</td>
                                        <td class="institute">{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                                        <td class="institute">{{$item->customer->firstName}} {{$item->customer->lastName}}</td>
                                        <td class="institute">{{$item->billingAddress}}</td>
                                        <td class="institute">${{$item->total_price}}</td>
                                        <td class="institute">${{$item->discount_price}}</td>
                                        <td class="institute">${{$item->Shipping_charge}}</td>
                                        <td class="institute">${{$item->sub_price}}</td>

                                        <td class="institute">@if($item->is_paid ==1) <span class="badge badge-soft-success">Paid</span>
                                            @else <span class="badge badge-soft-danger">Unpaid</span>@endif</td>
                                        <td class="institute"> <span class="badge badge-soft-success">{{getOrderStatusIdToValue($item->order_status)}}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="show">
                                                    <a href="/admin/order/details/{{$item->id}}"  class="btn btn-sm btn-info show-item-btn">
                                                        Details
                                                    </a>
                                                </div>
                                                <div class="show">
                                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Status
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                        @foreach(getOrderStatus() as $key=>$value)
                                                        <a class="dropdown-item" href="/admin/order-status-update/{{$item->id}}/{{$key}}">{{$value}}</a>
                                                        @endforeach


                                                    </div>

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
