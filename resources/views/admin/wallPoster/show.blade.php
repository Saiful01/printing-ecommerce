@extends('layouts.admin')

@section('title', 'Wall Art & Poster List')


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
                <h4 class="mb-sm-0">Wall Art & Poster</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                        <li class="breadcrumb-item active">Wall Art & Poster List</li>
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
                    <h4 class="card-title mb-0">Wall Art & Poster List


                        <a type="button" href="/admin/wall-art-poster/add" class="btn btn-success add-btn"><i
                                class="ri-add-line align-bottom me-1"></i> Add
                        </a>
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">


                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="data-table">
                                <thead class="table-light">
                                <tr>

                                    <th class="sort" data-sort="Country">Title</th>
                                    <th class="sort" data-sort="Country">Short Details</th>
                                    <th class="sort" data-sort="Image">Details</th>
                                    <th class="sort" data-sort="Details">Price</th>
                                    <th class="sort" data-sort="Details">Feature Image</th>
                                    <th class="sort" data-sort="status">Tags</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                @foreach($results as $item)
                                    <tr>
                                        <td class="institute">{{$item->title}}</td>
                                        <td class="institute">{{$item->short_details}}</td>
                                        <td class="institute">{{$item->details}}</td>
                                        <td class="institute">{{$item->price}}</td>
                                        <td class="institute">{{$item->featured_image}}</td>
                                        <td class="institute">{{$item->tag}}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <a href="/admin/custom/price/edit/{{$item->id}}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-sm btn-info edit-item-btn">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="show">
                                                    <a href="/admin/custom/price/show/{{$item->id}}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-sm btn-success show-item-btn">
                                                        Details
                                                    </a>
                                                </div>
                                                <div class="remove">
                                                    <a href="/admin/custom/price/delete/{{$item->id}}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-sm btn-danger remove-item-btn">
                                                        Remove
                                                    </a>
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
