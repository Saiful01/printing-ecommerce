<div class="modal fade" id="editModal{{$item->id}}" tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
            </div>
            <form action="{{ route('galleries.update', $item ) }}"
                  method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label for="title" class="form-label">Title </label>
                        <input type="text" id="title"
                               class="form-control"
                               placeholder="Enter Title"
                               value="{{$item->title}}" required
                               name="title"/>
                    </div>
                    <div class="mb-3">

                        <label for="" class="form-label">
                            Details </label>
                        <textarea type="text" id="details"
                                  class="form-control summernote"
                                  placeholder="Enter Details here.."
                                  name="details">{{$item->details}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Featured
                            Image</label>
                        <input type="file" id="logo" class="form-control"
                               name="image"/>

                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Category</label>
                        <select class="form-control" data-trigger
                                name="category_id" id="status-field">

                            <option value="">All</option>
                            @foreach(getBlogCategories() as $res)
                                <option value="{{$res->id}}" @if($item->category_id == $res->id) selected @endif >{{$res->category_title}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Type</label>
                        <select class="form-control" data-trigger
                                name="type" id="status-field">

                            <option value="news" @if($item->type == "news") selected @endif>News</option>
                            <option value="notice" @if($item->type == "notice") selected @endif>Notice</option>
                        </select>

                    </div>

                    <div>
                        <label for="status-field"
                               class="form-label">Status</label>
                        <select class="form-control" data-trigger
                                name="is_active" id="status-field">

                            <option value="1" @if($item->is_active == true) selected @endif>Active</option>
                            <option value="0" @if($item->is_active == false) selected @endif>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-success"
                                id="edit-btn">Update
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
