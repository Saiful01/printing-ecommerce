@extends('layouts.admin')

@section('title', 'Gallery Show')


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
                <h4 class="mb-sm-0">Gallery</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboards</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
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
                    <h4 class="card-title mb-0">Add, Edit & Remove


                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                id="create-btn" data-bs-target="#addCountry"><i
                                class="ri-add-line align-bottom me-1"></i> Add
                        </button>
                        @include('admin.gallery.create')
                    </h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="customerList">


                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="data-table">
                                <thead class="table-light">
                                <tr>


                                    <th class="sort" data-sort="Image"> Image</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                @foreach($result['data'] as $item)
                                    <tr>


                                        <td class="logo"><img src="{{$item->featured_image}}" width="100px">
                                        </td>


                                        <td class="status">
                                                    <span
                                                        class="badge {{ ($item->is_active == 1) ? 'badge-soft-success' : 'badge-soft-danger'}} text-uppercase">{{ ($item->is_active == 1) ? 'Active' : 'Inactive'}}</span>
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                {{-- <div class="edit">
                                                     <button class="btn btn-sm btn-success edit-item-btn"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#editModal{{$item->id}}">
                                                         Edit
                                                     </button>
                                                 </div>--}}
                                                <div class="remove">
                                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal{{$item->id}}">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    @include('admin.gallery.edit')
                                    @include('admin.gallery.delete')




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
