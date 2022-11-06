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
                                <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
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
                                        <h5 class="text-success fs-14 mb-0">
                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                            +16.24 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span
                                                class="counter-value" data-target="559.25">0</span>k
                                        </h4>
                                        {{--<a href="#" class="text-decoration-underline">View net
                                            earnings</a>--}}
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
                                        <h5 class="text-danger fs-14 mb-0">
                                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                                            -3.57 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                class="counter-value" data-target="36894">0</span></h4>
                                        <a href="/admin/order/show" class="text-decoration-underline">View all orders</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info rounded fs-3">
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
                                        <h5 class="text-success fs-14 mb-0">
                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                            +29.08 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                class="counter-value" data-target="183.35">0</span>M
                                        </h4>
                                        <a href="/admin/customers/show" class="text-decoration-underline">See details</a>
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

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p
                                            class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            My Balance</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-muted fs-14 mb-0">
                                            +0.00 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span
                                                class="counter-value" data-target="165.89">0</span>k
                                        </h4>
                                       {{-- <a href="#" class="text-decoration-underline">Withdraw money</a>--}}
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
                                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
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
                                        <h5 class="text-danger fs-14 mb-0">
                                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                                            -3.57 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                class="counter-value" data-target="36894">0</span></h4>
                                        <a href="/admin/order/show" class="text-decoration-underline">View all orders</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info rounded fs-3">
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
                                            Active Coupon</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-muted fs-14 mb-0">
                                            +0.00 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span
                                                class="counter-value" data-target="165.89">0</span>k
                                        </h4>
                                        {{-- <a href="#" class="text-decoration-underline">Withdraw money</a>--}}
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
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
                                            Inactive Coupon</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-muted fs-14 mb-0">
                                            +0.00 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span
                                                class="counter-value" data-target="165.89">0</span>k
                                        </h4>
                                        {{-- <a href="#" class="text-decoration-underline">Withdraw money</a>--}}
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
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
                                            Total Coupon</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-success fs-14 mb-0">
                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                            +29.08 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span
                                                class="counter-value" data-target="183.35">0</span>M
                                        </h4>
                                        <a href="/admin/customers/show" class="text-decoration-underline">See details</a>
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
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xl-5">
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
                    </div><!-- end col -->

                    <div class="col-xl-7">
                        <!-- card -->
                        <div class="card card-height-100">

                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-soft-info btn-sm shadow-none">
                                        <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                    </button>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table
                                        class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Vendor</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                       class="fw-medium link-primary">#VZ2112</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="assets/images/users/avatar-1.jpg"
                                                                 alt=""
                                                                 class="avatar-xs rounded-circle shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Alex Smith</div>
                                                    </div>
                                                </td>
                                                <td>Clothes</td>
                                                <td>
                                                    <span class="text-success">$109.00</span>
                                                </td>
                                                <td>Zoetic Fashion</td>
                                                <td>
                                                    <span class="badge badge-soft-success">Paid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">5.0<span
                                                            class="text-muted fs-11 ms-1">(61
                                                                            votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                       class="fw-medium link-primary">#VZ2111</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="assets/images/users/avatar-2.jpg"
                                                                 alt=""
                                                                 class="avatar-xs rounded-circle shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Jansh Brown</div>
                                                    </div>
                                                </td>
                                                <td>Kitchen Storage</td>
                                                <td>
                                                    <span class="text-success">$149.00</span>
                                                </td>
                                                <td>Micro Design</td>
                                                <td>
                                                                    <span
                                                                        class="badge badge-soft-warning">Pending</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.5<span
                                                            class="text-muted fs-11 ms-1">(61
                                                                            votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                       class="fw-medium link-primary">#VZ2109</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="assets/images/users/avatar-3.jpg"
                                                                 alt=""
                                                                 class="avatar-xs rounded-circle shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Ayaan Bowen</div>
                                                    </div>
                                                </td>
                                                <td>Bike Accessories</td>
                                                <td>
                                                    <span class="text-success">$215.00</span>
                                                </td>
                                                <td>Nesta Technologies</td>
                                                <td>
                                                    <span class="badge badge-soft-success">Paid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.9<span
                                                            class="text-muted fs-11 ms-1">(89
                                                                            votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                       class="fw-medium link-primary">#VZ2108</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="assets/images/users/avatar-4.jpg"
                                                                 alt=""
                                                                 class="avatar-xs rounded-circle shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Prezy Mark</div>
                                                    </div>
                                                </td>
                                                <td>Furniture</td>
                                                <td>
                                                    <span class="text-success">$199.00</span>
                                                </td>
                                                <td>Syntyce Solutions</td>
                                                <td>
                                                    <span class="badge badge-soft-danger">Unpaid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.3<span
                                                            class="text-muted fs-11 ms-1">(47
                                                                            votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
                                            <tr>
                                                <td>
                                                    <a href="apps-ecommerce-order-details.html"
                                                       class="fw-medium link-primary">#VZ2107</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-2">
                                                            <img src="assets/images/users/avatar-6.jpg"
                                                                 alt=""
                                                                 class="avatar-xs rounded-circle shadow" />
                                                        </div>
                                                        <div class="flex-grow-1">Vihan Hudda</div>
                                                    </div>
                                                </td>
                                                <td>Bags and Wallets</td>
                                                <td>
                                                    <span class="text-success">$330.00</span>
                                                </td>
                                                <td>iTest Factory</td>
                                                <td>
                                                    <span class="badge badge-soft-success">Paid</span>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 fw-medium mb-0">4.7<span
                                                            class="text-muted fs-11 ms-1">(161
                                                                            votes)</span></h5>
                                                </td>
                                            </tr><!-- end tr -->
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
