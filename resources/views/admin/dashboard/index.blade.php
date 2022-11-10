@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col">

            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Good Morning, {{Auth::user()->name}}</h4>
                                <p class="text-muted mb-0">Here's what's happening with your store
                                    today.</p>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Total Earnings</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-info fs-14 mb-0">
                                            <i class=" fs-13 align-middle"></i>
                                            {{$earningDifferenceInpercentage}} %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span>{{$earningCount}}</span>
                                        </h4>
                                        <a href="/admin/order/show" class="text-decoration-underline">View Source</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success rounded fs-3">
                                                            <i class="bx bx-dollar-circle"></i>
                                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Orders</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-info fs-14 mb-0">
                                            <i class="fs-13 align-middle"></i>
                                            {{$orderDifferenceInpercentage}} %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{$orderCount}}</span>
                                        </h4>
                                        <a href="/admin/order/show" class="text-decoration-underline">View all
                                            orders</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-shopping-bag"></i>
                                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Customers</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-info fs-14 mb-0">
                                            <i class=" fs-13 align-middle"></i>
                                            {{$customerDifferenceInpercentage}} %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{$customers}}</span>
                                        </h4>
                                        <a href="/admin/customers/show" class="text-decoration-underline">See
                                            details</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning rounded fs-3">
                                                            <i class="bx bx-user-circle"></i>
                                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                    <div class="col-xl-3 col-md-">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Wall Art & Poster</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-info fs-14 mb-0">
                                            <i class="fs-13 align-middle"></i>
                                            {{$wallArtDifferenceInpercentage}} %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{$wallArtCount}}</span>
                                        </h4>
                                        <a href="/admin/order/show" class="text-decoration-underline">View all
                                            orders</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info rounded-2 fs-2">
                                                        <i data-feather="briefcase"></i>
                                                    </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xl-4 col-md-8">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Active Coupon</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-info fs-14 mb-0">
                                            <i class="fs-13 align-middle"></i>
                                            {{$activeCouponDifferenceInpercentage}} %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span>{{$activeCouponCount}}</span></h4>
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        </p>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-danger rounded fs-2">
                                                                <i data-feather="activity"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-4 col-md-8">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Total Coupon</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-info fs-14 mb-0">
                                            <i class=" fs-13 align-middle"></i>
                                            {{$couponDifferenceInpercentage}} %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>{{$couponCount}}</span>
                                        </h4>
                                        <a href="/admin/customers/show" class="text-decoration-underline">See
                                            details</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning rounded-2 fs-2">
                                                        <i data-feather="award"></i>
                                                    </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-4 col-md-8">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Inactive Coupon</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-info fs-14 mb-0">
                                            {{$inActiveCouponDifferenceInpercentage}} %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                            <span>{{$inActiveCouponCount}}</span>
                                        </h4>
                                        {{-- <a href="#" class="text-decoration-underline">Withdraw money</a>--}}
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-danger rounded-2 fs-2">
                                                        <i data-feather="clock"></i>
                                                    </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                    {{--<div class="col-xl-5">
                        <div class="card">
                            <div class="card-header border-0 align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                                <div>
                                    <button type="button"
                                            class="btn btn-soft-secondary btn-sm shadow-none">
                                        ALL
                                    </button>
                                    <button type="button"
                                            class="btn btn-soft-secondary btn-sm shadow-none">
                                        1M
                                    </button>
                                    <button type="button"
                                            class="btn btn-soft-secondary btn-sm shadow-none">
                                        6M
                                    </button>
                                    <button type="button"
                                            class="btn btn-soft-primary btn-sm shadow-none">
                                        1Y
                                    </button>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-header p-0 border-0 bg-soft-light">
                                <div class="row g-0 text-center">
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span class="counter-value"
                                                                   data-target="7585">0</span></h5>
                                            <p class="text-muted mb-0">Orders</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1">$<span class="counter-value"
                                                                    data-target="22.89">0</span>k</h5>
                                            <p class="text-muted mb-0">Earnings</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span class="counter-value"
                                                                   data-target="367">0</span></h5>
                                            <p class="text-muted mb-0">Refunds</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-3">
                                        <div
                                            class="p-3 border border-dashed border-start-0 border-end-0">
                                            <h5 class="mb-1 text-success"><span class="counter-value"
                                                                                data-target="18.92">0</span>%</h5>
                                            <p class="text-muted mb-0">Conversation Ratio</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body p-0 pb-2">
                                <div class="w-100">
                                    <div id="customer_impression_charts"
                                         data-colors='["--vz-success", "--vz-primary", "--vz-danger"]'
                                         class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>--}}<!-- end col -->

                    <div class="col-xl-12">
                        <!-- card -->
                        <div class="card card-height-100">

                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                <div class="flex-shrink-0">
                                    {{--<button type="button" class="btn btn-soft-info btn-sm shadow-none">
                                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                    </button>--}}
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table
                                        class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order ID</th>
                                                <th class="sort" data-sort="Image">Order Date</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php($i=1)
                                            @foreach($recentOrder as $item)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>
                                                        <a href="/admin/order/details/{{$item->id}}"
                                                           class="fw-medium link-primary">{{$item->invoice}}</a>
                                                    </td>
                                                    <td class="institute">{{date('d-m-Y', strtotime($item->updated_at))}}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="flex-grow-1">{{$item->customer->firstName}} {{$item->customer->lastName}}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="text-success">${{round($item->sub_price)}}</span>
                                                    </td>
                                                    <td>
                                                        @if($item->is_paid ==1)
                                                            <span class="badge badge-soft-success">Paid</span>
                                                        @else
                                                            <span class="badge badge-soft-danger">Unpaid</span>
                                                        @endif
                                                    </td>
                                                </tr><!-- end tr -->
                                            @endforeach
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

            </div> <!-- end .h-100-->

        </div> <!-- end col -->

    </div>





    @push('extra_resource')
        <!-- jsvectormap css -->
        <link href="/admin-assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css"/>

        <!-- apexcharts -->
        <script src="/admin-assets/libs/apexcharts/apexcharts.min.js"></script>
        <!-- Vector map-->
        <script src="/admin-assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="/admin-assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!--Swiper slider js-->
        <script src="/admin-assets/libs/swiper/swiper-bundle.min.js"></script>

        <!-- Dashboard init -->
        <script src="/admin-assets/js/pages/dashboard-ecommerce.init.js"></script>

    @endpush

@endsection
