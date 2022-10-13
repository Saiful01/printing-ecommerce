@extends("layouts.common")
@section("content")

    <section>
        <div class="container">

            <div class="container">


                <form action="upload.php" class="dropzone"></form>


                <form action="/create-poster">
                    <div class="input-group row">
                        <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="inputName">
                        </div>
                    </div>
                    <div class="input-group row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <script>

    </script>

@endsection
