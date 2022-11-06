<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/admin/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/common/images/logo/logo.png" alt="" height="60">
                    </span>
            <span class="logo-lg">
                        <img src="/common/images/logo/logo.png" alt="" height="60">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="/admin/dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/common/images/logo/logo.png" alt="" height="60">
                    </span>
            <span class="logo-lg">
                        <img src="/common/images/logo/logo.png" alt="" height="60">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item ">
                    <a class="nav-link menu-link {{ Request::is('admin/dashboard') ? 'active' : null }}"
                       href="/admin/dashboard"
                       aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-home"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>

                </li> <!-- end Dashboard Menu -->

                @if (Auth::user()->is_admin)

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/poster/price') ? 'active' : null }}"
                           href="#sidebarPosterPrice"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarPosterPrice">
                            <i class="mdi mdi-android-studio"></i> <span data-key="t-layouts">Poster Price</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarPosterPrice" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/poster/price" class="nav-link" data-key="t-horizontal">Add
                                        Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/poster/price/show" class="nav-link" data-key="t-detached">Show
                                        Details</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/foam-board/price') ? 'active' : null }}"
                           href="#sidebarFoamPrice"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarFoamPrice">
                            <i class="mdi mdi-form-select"></i> <span data-key="t-layouts">Foam Board Price</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarFoamPrice" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/foam-board/price" class="nav-link"
                                       data-key="t-horizontal">Add Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/foam-board/price/show" class="nav-link"
                                       data-key="t-detached">Show Details</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/aluminum/price') ? 'active' : null }}"
                           href="#sidebarAluPrice"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarAluPrice">
                            <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-layouts">Aluminum Price</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarAluPrice" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/aluminum/price" class="nav-link"
                                       data-key="t-horizontal">Add Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/aluminum/price/show" class="nav-link"
                                       data-key="t-detached">Show Details</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/custom/price') ? 'active' : null }}"
                           href="#sidebarCustomPrice"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarCustomPrice">
                            <i class="mdi mdi-grid-large"></i> <span data-key="t-layouts">Custom Price</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarCustomPrice" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/custom/price" class="nav-link"
                                       data-key="t-horizontal">Add Details</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/custom/price/show" class="nav-link"
                                       data-key="t-detached">Show Details</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/product/add') ? 'active' : null }}"
                           href="#sidebarProduct"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarCustomPrice">
                            <i class="mdi mdi-cube-outline"></i> <span data-key="t-layouts">Wall Art & Posters</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarProduct" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/wall-art-poster/add" class="nav-link"
                                       data-key="t-horizontal">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/wall-art-poster/show" class="nav-link"
                                       data-key="t-detached">Show Product</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link menu-link {{ Request::is('/admin/orders') ? 'active' : null }}"
                           href="/admin/order/show"
                           aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="mdi mdi-basket-check"></i> <span data-key="t-dashboards">Orders</span>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/coupon/add') ? 'active' : null }}"
                           href="#sidebarCoupon"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarDashboards">
                            <i class="mdi mdi-atom"></i> <span data-key="t-layouts">Coupon</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarCoupon" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/coupon/add" class="nav-link"
                                       data-key="t-horizontal">Add Coupon</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/coupon/show" class="nav-link"
                                       data-key="t-detached">Coupon List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/shipping/add') ? 'active' : null }}"
                           href="#sidebarShipping"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarDashboards">
                            <i class="mdi mdi-airplane-takeoff"></i> <span data-key="t-layouts">Shipping</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarShipping" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/shipping/add" class="nav-link"
                                       data-key="t-horizontal">Add Shipping</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/shipping/show" class="nav-link"
                                       data-key="t-detached">Shipping List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/tax/add') ? 'active' : null }}"
                           href="#sidebarTax"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarDashboards">
                            <i class="mdi mdi-apps-box"></i> <span data-key="t-layouts">Tax</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarTax" style="">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/admin/tax/add" class="nav-link"
                                       data-key="t-horizontal">Add Tax</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/tax/show" class="nav-link"
                                       data-key="t-detached">Tax List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Request::is('/admin/product/add') ? 'active' : null }}"
                           href="#sidebarCustomers"
                           data-bs-toggle="collapse" role="button" aria-expanded="false"
                           aria-controls="sidebarDashboards">
                            <i class="mdi mdi-account-group"></i> <span data-key="t-layouts">Customers</span>
                        </a>
                        <div class="menu-dropdown collapse" id="sidebarCustomers" style="">
                            <ul class="nav nav-sm flex-column">
                                {{--<li class="nav-item">
                                    <a href="/admin/product/add" class="nav-link"
                                       data-key="t-horizontal">Add customers</a>
                                </li>--}}
                                <li class="nav-item">
                                    <a href="/admin/customers/show" class="nav-link"
                                       data-key="t-detached">Customers List</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                @endif

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('/admin/logout') ? 'active' : null }}"
                       href="/admin/logout">
                        <i class="mdi mdi-logout"></i> <span data-key="t-dashboards">Logout </span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
