<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<head>

    <meta charset="utf-8"/>
    <title>Sign In | Admin-panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Panel" name="description"/>
    <meta content="Qubit Solution Lab" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="/images/logo.png">

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

    <style>
        .auth-one-bg .bg-overlay {
            /* background: -webkit-gradient(linear,left top,right top,from(#41319c),to(#4b38b3)); */
            background: linear-gradient(to right, #009146, #007838);
            opacity: .9;
        }
    </style>
</head>

<body>
@include('sweetalert::alert')

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                 viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="https://qubitsolutionlab.com/" class="d-inline-block auth-logo">
                                <img src="/images/logo.png" alt="" height="60">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to Admin.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="/admin/login-check" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="username"
                                               placeholder="Enter Email" value="{{ old('email') }}">
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="/admin/forgot-password" class="text-muted">Forgot password?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5" name="password"
                                                   placeholder="Enter password" id="password-input"
                                                   value="{{ old('password') }}">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Sign In</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">
                            &copy; {{date('Y')}}
                            Qubit Admin. Crafted with <i class="mdi mdi-heart text-danger"></i> by

                            <a target="_blank" href="https://abgict.co/">{{ getCopyright() }}</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="/admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin-assets/libs/simplebar/simplebar.min.js"></script>
<script src="/admin-assets/libs/node-waves/waves.min.js"></script>
<script src="/admin-assets/libs/feather-icons/feather.min.js"></script>
<script src="/admin-assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="/admin-assets/js/plugins.js"></script>

<!-- particles js -->
<script src="/admin-assets/libs/particles.js/particles.js"></script>
<!-- particles app js -->
<script src="/admin-assets/js/pages/particles.app.js"></script>
<!-- password-addon init -->
<script src="/admin-assets/js/pages/password-addon.init.js"></script>
</body>


</html>
