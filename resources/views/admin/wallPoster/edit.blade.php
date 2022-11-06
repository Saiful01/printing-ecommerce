@extends('layouts.admin')
@section('title', 'Wall Art & Poster Edit')

@section('content')

    <style>
        .form-label {
            height: 32px;
        }
    </style>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Wall Art & Poster</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                            <li class="breadcrumb-item active">Wall Art & Poster Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Add Wall Art & Poster</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form action="/admin/wall-art-poster/update" method="post"
                                  enctype="multipart/form-data">
                                <div class="row gy-4 mt-0">
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                   placeholder="Title" value="{{$results->title}}" required>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <input type="hidden" name="id" value="{{$results->id}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row gy-4 mt-0">
                                    <!--end col-->
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Short Details</label>
                                            <textarea class="form-control" id="short_details" name="short_details" rows="3">{{$results->short_details}}</textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Details</label>
                                            <textarea class="form-control" id="details" name="details" rows="3">{{$results->details}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row gy-4 mt-0">
                                    <!--end col-->
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Price</label>
                                            <div class="form-icon">
                                                <input type="text" class="form-control form-control-icon" value="{{$results->price}}" name="price" id="price" placeholder="24">
                                                <i class="ri-money-dollar-circle-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Tags</label>
                                            <input type="text" class="form-control" value="{{$results->tag}}" name="tag" id="tag"
                                                   placeholder="wall & art, design" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="row gy-4 mt-0">
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Feature Image</label>

                                            <div>
                                                <img src="{{$results->featured_image}}" width="100px"/>
                                            </div>
                                            <input type="file" class="form-control" name="image" id="image"
                                                   placeholder="Feature image" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="row gy-4 mt-0">
                                    <div class="col-xxl-4 col-md-4 col-8">
                                        <button type="submit" class="btn btn-success form-control">Update</button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div> <!-- container-fluid -->
@endsection
