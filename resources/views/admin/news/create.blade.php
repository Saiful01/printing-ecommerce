<div class="modal fade" id="addCountry" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
            </div>
            <form action="{{ route('news.store' ) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf

                    <div class="mb-3">

                        <label for="title" class="form-label">Title </label>
                        <input type="text" id="title"
                               class="form-control"
                               placeholder="Enter Title" value="{{old('title')}}" required
                               name="title"/>
                    </div>
                    <div class="mb-3">

                        <label for="" class="form-label">
                            Details </label>
                        <textarea type="text" id="details" cols="10" rows="10"
                                  class="form-control summernote"
                                  placeholder="Enter Details here.."
                                  name="details">{{old('details')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Featured Image</label>
                        <input type="file" id="logo" class="form-control"
                               name="image"/>

                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Category</label>
                        <select class="form-control" data-trigger
                                name="category_id" id="status-field">

                            <option value="">All</option>
                            @foreach(getBlogCategories() as $res)
                            <option value="{{$res->id}}">{{$res->category_title}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Type</label>
                        <select class="form-control" data-trigger
                                name="type" id="status-field">

                            <option value="news">News</option>
                            <option value="notice">Notice</option>
                        </select>

                    </div>

                    <div>
                        <label for="status-field"
                               class="form-label">Status</label>
                        <select class="form-control" data-trigger
                                name="is_active" id="status-field">

                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-success"
                                id="edit-btn">Add
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
