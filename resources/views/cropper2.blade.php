@extends("layouts.common")
@section("content")

    <div class="container">


        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- <h3>Demo:</h3> -->
                    <div class="docs-demo">
                        <div class="img-container">
                            <img src="uploads/1.jpg" alt="Picture" height="250">
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <button id="change">Change</button>

    </div>

    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>




    <script type="text/javascript">


        function changeRatio() {


            initCropper();
        }

        window.onload = function () {
            'use strict';

            var Cropper = window.Cropper;
            var URL = window.URL || window.webkitURL;
            var container = document.querySelector('.img-container');
            var image = container.getElementsByTagName('img').item(0);
            var download = document.getElementById('download');
            var actions = document.getElementById('actions');
            var dataX = document.getElementById('dataX');
            var dataY = document.getElementById('dataY');
            var dataHeight = document.getElementById('dataHeight');
            var dataWidth = document.getElementById('dataWidth');
            var dataRotate = document.getElementById('dataRotate');
            var dataScaleX = document.getElementById('dataScaleX');
            var dataScaleY = document.getElementById('dataScaleY');
            var options = {
                aspectRatio: 16 / 9,
                preview: '.img-preview',
                ready: function (e) {
                    console.log(e.type);
                },
                cropstart: function (e) {
                    console.log(e.type, e.detail.action);
                },
                cropmove: function (e) {
                    console.log(e.type, e.detail.action);
                },
                cropend: function (e) {
                    console.log(e.type, e.detail.action);
                },
                crop: function (e) {
                    var data = e.detail;

                    console.log(e.type);
                   /* dataX.value = Math.round(data.x);
                    dataY.value = Math.round(data.y);
                    dataHeight.value = Math.round(data.height);
                    dataWidth.value = Math.round(data.width);
                    dataRotate.value = typeof data.rotate !== 'undefined' ? data.rotate : '';
                    dataScaleX.value = typeof data.scaleX !== 'undefined' ? data.scaleX : '';
                    dataScaleY.value = typeof data.scaleY !== 'undefined' ? data.scaleY : '';*/
                },
                zoom: function (e) {
                    console.log(e.type, e.detail.ratio);
                }
            };
            var cropper = new Cropper(image, options);
            var originalImageURL = image.src;
            var uploadedImageType = 'image/jpeg';
            var uploadedImageName = 'cropped.jpg';
            var uploadedImageURL;


            var reply_click = function()
            {
                cropper.destroy();

                var options = {
                    aspectRatio: 1 / 1,
                    preview: '.img-preview',
                    ready: function (e) {
                        console.log(e.type);
                    },
                    cropstart: function (e) {
                        console.log(e.type, e.detail.action);
                    },
                    cropmove: function (e) {
                        console.log(e.type, e.detail.action);
                    },
                    cropend: function (e) {
                        console.log(e.type, e.detail.action);
                    },
                    crop: function (e) {
                        var data = e.detail;

                        console.log(e.type);
                        /* dataX.value = Math.round(data.x);
                         dataY.value = Math.round(data.y);
                         dataHeight.value = Math.round(data.height);
                         dataWidth.value = Math.round(data.width);
                         dataRotate.value = typeof data.rotate !== 'undefined' ? data.rotate : '';
                         dataScaleX.value = typeof data.scaleX !== 'undefined' ? data.scaleX : '';
                         dataScaleY.value = typeof data.scaleY !== 'undefined' ? data.scaleY : '';*/
                    },
                    zoom: function (e) {
                        console.log(e.type, e.detail.ratio);
                    }
                };
                 cropper = new Cropper(image, options);
                alert("Button clicked");
            }
            document.getElementById('change').onclick = reply_click;
        };

    </script>

@endsection
