@extends("layouts.common")
@section("content")

    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>


    <img id="image" src="/uploads/1668236115.jpg" alt="Picture">



    <script>
        // initial set up
        var image = document.querySelector('#image');
        const cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            crop(event) {
                console.log(event.detail.x);
                console.log(event.detail.y);
                console.log(event.detail.width);
                console.log(event.detail.height);
                console.log(event.detail.rotate);
                console.log(event.detail.scaleX);
                console.log(event.detail.scaleY);
            },
        });
    </script>

@endsection
