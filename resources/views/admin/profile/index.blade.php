@extends('layouts.admin')

@section('title', 'Profile')


@section('content')



    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="/admin-assets/images/profile-bg.jpg" alt="" class="profile-wid-img"/>
                </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="avatar-lg">
                            @if(Auth::user()->profile_image != null)
                                <img class="img-thumbnail rounded-circle"
                                     src="{{Auth::user()->profile_image}}"
                                     alt="user-img">
                            @else
                                <img src="/admin-assets/images/users/avatar-1.jpg" alt="user-img"
                                     class="img-thumbnail rounded-circle"/>
                            @endif

                        </div>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <div class="p-2">
                            <h3 class="text-white mb-1">{{Auth::user()->name}}</h3>
                            <p class="text-white-75">Admin</p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i
                                        class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{Auth::user()->address}}
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <!--end row-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                                       role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Overview</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-5">Complete Your Profile</h5>
                                                <div
                                                    class="progress animated-progress custom-progress progress-label">
                                                   {{-- <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: {{profileStatistics()}}%"
                                                         aria-valuenow="{{profileStatistics()}}" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <div class="label">{{profileStatistics()}}%</div>
                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Info</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Full Name :</th>
                                                            <td class="text-muted">{{Auth::user()->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                            <td class="text-muted">{{Auth::user()->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                            <td class="text-muted">{{Auth::user()->email}}</td>
                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->


                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-9">
                                        <div class="card mt-xxl-n5">
                                            <div class="card-header">
                                                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab"
                                                           href="#personalDetails" role="tab">
                                                            <i class="fas fa-home"></i>
                                                            Personal Details
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword"
                                                           role="tab">
                                                            <i class="far fa-user"></i>
                                                            Change Password
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                                        <form action="/admin/profile-update" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="firstnameInput" class="form-label">
                                                                            Name</label>
                                                                        <input type="text" class="form-control"
                                                                               id="firstnameInput"
                                                                               placeholder="Enter your name" name="name"
                                                                               value="{{Auth::user()->name}}">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->

                                                                <!--end col-->
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="phonenumberInput"
                                                                               class="form-label">Phone
                                                                            Number</label>
                                                                        <input type="text" class="form-control"
                                                                               id="phonenumberInput"
                                                                               placeholder="Enter your phone number"
                                                                               name="phone"
                                                                               value="{{Auth::user()->phone}}">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="emailInput" class="form-label">Email
                                                                            Address</label>
                                                                        <input type="email" class="form-control"
                                                                               id="emailInput"
                                                                               placeholder="Enter your email"
                                                                               name="email"
                                                                               value="{{Auth::user()->email}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="emailInput" class="form-label">Profile
                                                                            Image</label>
                                                                        <input type="file" class="form-control"
                                                                               id="emailInput" name="image"
                                                                               placeholder="Enter your Image">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->


                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Updates
                                                                        </button>
                                                                        <button type="button"
                                                                                class="btn btn-soft-success">Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </form>
                                                    </div>
                                                    <!--end tab-pane-->
                                                    <div class="tab-pane" id="changePassword" role="tabpanel">
                                                        <form action="/admin/password-update" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row g-2">
                                                                <div class="col-lg-4">
                                                                    <div>
                                                                        <label for="oldpasswordInput"
                                                                               class="form-label">Old
                                                                            Password*</label>
                                                                        <input type="password" class="form-control"
                                                                               id="oldpasswordInput" name="old_password"
                                                                               placeholder="Enter current password"
                                                                               value="{{ old('old_password') }}" required>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-4">
                                                                    <div>
                                                                        <label for="newpasswordInput"
                                                                               class="form-label">New
                                                                            Password*</label>
                                                                        <input type="password" class="form-control"
                                                                               id="newpasswordInput" name="new_password"
                                                                               placeholder="Enter new password"
                                                                               value="{{ old('new_password') }}" required>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-4">
                                                                    <div>
                                                                        <label for="confirmpasswordInput"
                                                                               class="form-label">Confirm
                                                                            Password*</label>
                                                                        <input type="password" class="form-control"
                                                                               id="confirmpasswordInput"
                                                                               name="confirm_password"
                                                                               placeholder="Confirm password"
                                                                               value="{{ old('confirm_password') }}" required>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->

                                                                <!--end col-->
                                                                <div class="col-lg-12">
                                                                    <div class="text-end">
                                                                        <button type="submit" class="btn btn-success">
                                                                            Change
                                                                            Password
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </form>
                                                        <div class="mt-4 mb-3 border-bottom pb-2">

                                                            <h5 class="card-title">Login History</h5>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-3">
                                                            <div class="flex-shrink-0 avatar-sm">
                                                                <div
                                                                    class="avatar-title bg-light text-primary rounded-3 fs-18">
                                                                    <i class="ri-smartphone-line"></i>
                                                                </div>
                                                            </div>
                                                           {{-- @foreach(getLoginHistoery() as $res)
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6>{{$res->created_at}}</h6>
                                                            </div>
                                                            @endforeach--}}

                                                        </div>

                                                    </div>
                                                    <!--end tab-pane-->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>

                            <!--end tab-pane-->
                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->




@endsection
