<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/admin/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/images/logo.png" alt="" height="60">
                    </span>
            <span class="logo-lg">
                        <img src="/images/logo.png" alt="" height="60">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="/admin/dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/images/logo.png" alt="" height="60">
                    </span>
            <span class="logo-lg">
                        <img src="/images/logo.png" alt="" height="60">
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

                    <li class="nav-item ">
                        <a class="nav-link menu-link {{ Request::is('/news') ? 'active' : null }}"
                           href="/news"
                           aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="mdi mdi-list-status"></i> <span data-key="t-dashboards">News</span>
                        </a>

                    </li> <!-- end Dashboard Menu -->
                    <li class="nav-item ">
                        <a class="nav-link menu-link {{ Request::is('/galleries') ? 'active' : null }}"
                           href="/galleries"
                           aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="mdi mdi-view-gallery"></i> <span data-key="t-dashboards">Galleries</span>
                        </a>

                    </li> <!-- end Dashboard Menu -->
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
