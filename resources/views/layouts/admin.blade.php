<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<head>

    <meta charset="utf-8"/>
    <title>Poster Print Store | Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="/admin-assets/images/favicon.ico">


    <!--Swiper slider css-->

    <!-- Layout config Js -->
    <script src="/admin-assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="/admin-assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="/admin-assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="/admin-assets/css/app.min.css" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="/admin-assets/css/custom.min.css" rel="stylesheet" type="text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <script>
        var app = angular.module('myApp', []);
    </script>

</head>

<body ng-app="myApp">
@include('sweetalert::alert')


<!-- Begin page -->
<div id="layout-wrapper">


    <!-- Header Start-->
@include('include.admin.header')
<!-- Header End-->

    <!-- Sidebar Start-->
@include('include.admin.sidebar')
<!-- Sidebar End-->


    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Admin Panel.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by<a href="https://qubitsolutionlab.com/" target="_blank"> {{ getCopyright() }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->


<!-- JAVASCRIPT -->
<script src="/admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin-assets/libs/simplebar/simplebar.min.js"></script>
<script src="/admin-assets/libs/node-waves/waves.min.js"></script>
<script src="/admin-assets/libs/feather-icons/feather.min.js"></script>
<script src="/admin-assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
{{--<script src="/admin-assets/js/plugins.js"></script>--}}


<!-- include summernote css/js -->
<script src="/admin-assets/js/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<link rel="stylesheet" type="text/css" href="/admin-assets/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="/admin-assets/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function () {
        $('#data-table').DataTable({
            "pageLength": 25,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>

@stack('extra_resource')

<!-- App js -->
<script src="/admin-assets/js/app.js"></script>

</body>


</html>
