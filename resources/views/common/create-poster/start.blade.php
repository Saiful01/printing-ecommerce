@extends("layouts.common")
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-md-16">
                <form action="/dropzone/store" method="post" name="file" files="true" enctype="multipart/form-data"
                      class="dropzone" id="image-upload">
                    @csrf
                    <div class="dz-message custom_uploader">
                        <h4 class="alert-heading">Drag &amp; Drop Your File Here</h4>
                        <p>or use the button below to choose a file.</p>
                        <p class="uploader_large_icon"><i class="icon-qr-code"></i></p>
                        <p><a href="javascript:void(0);" class="btn btn-success"><i class="icon-shield"></i> Choose An Image File</a></p>
                        <p><small>We recommend uploading JPG, PNG, TIF or PDF files for faster uploads and better results.</small></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('footer-scripts')
        @once
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

            <script type="text/javascript">
                Dropzone.options.imageUpload = {
                    maxFilesize: 1,
                    acceptedFiles: ".jpeg,.jpg,.png,.tif,.pdf",

                    init: function () {
                        this.on("success", function (file, responseText) {

                            console.log("success"+responseText);
                            window.location.href = '/create-poster';
                        });
                    }
                };
            </script>

        @endonce
    @endpush


@endsection
