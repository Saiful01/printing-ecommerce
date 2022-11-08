@extends("layouts.common")
@section("content")

    <style>
        /*  .cropper-bg{
              width: 100% !important;
              height: auto !important;
          }*/
    </style>

    <?php

    $name = time();
    $image = time() . ".png";
    ?>

    <div class="page-content">
        <div class="holder">
            <div ng-controller="myCtrl">


                <div class="container mb-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Poster print options selection -->
                            <div class="card product_selection" id="pp_size_selection">
                                <div class="card-header">Choose Your Print Options</div>
                                <div class="card-body poster_customize">
                                    <form>
                                        <div class="form-group row">
                                            <label for="cart_item_media"
                                                   class="col-sm-5 col-form-label">Product:</label>
                                            <div class="col-sm-13">
                                                <select class="form-control" name="product_type" id="product_type"
                                                        ng-model="product_type" ng-change="productChange()">
                                                    <option value="1">Poster Print</option>
                                                    <option value="2">Foam Core Board</option>
                                                    <option value="3">Aluminium Print</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cart_item_media" class="col-sm-5 col-form-label">Paper:</label>
                                            <div class="col-sm-13">
                                                <select class="form-control" name="paper_type" id="paper_type"
                                                        ng-model="paper_type" ng-change="changePosterSize()">
                                                    <option value="1">Photo Premium Glossy</option>
                                                    <option value="2">Canvas</option>
                                                    <option value="3">Banner Vinyl</option>
                                                    <option value="4">Self Adhesive Synthetic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="size_options" class="col-sm-5 col-form-label">Size:</label>
                                            <div class="col-sm-13" id="foam-board">
                                                <select class="form-control" name="poster_size" id="poster_size"
                                                        ng-model="poster_size" ng-change="changeFoamBoard()">
                                                    @foreach($foam_board as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-13" id="aluminium-print">
                                                <select class="form-control" name="poster_size" id="poster_size"
                                                        ng-model="poster_size" ng-change="changeAluminium()">
                                                    @foreach($aluminium_print as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-13" id="poster-print">
                                                <select class="form-control" name="poster_size" id="poster_size"
                                                        ng-model="poster_size"
                                                        ng-change="changePosterSize()">
                                                    @foreach($poster_print as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="CustomLength">Or choose your custom size:</label>
                                            <div class="row align-items-center">
                                                <div class="col-md-3">
                                                    <input value="36" class="form-control" data-product="photo" min="8"
                                                           max="60"
                                                           type="text" name="cart_item[print_width]"
                                                           id="cart_item_print_width">
                                                </div>
                                                <div class="col-md-1"> x</div>
                                                <div class="col-md-4">
                                                    <input value="24" class="form-control" data-product="photo" min="8"
                                                           max="60"
                                                           type="text" name="cart_item[print_height]"
                                                           id="cart_item_print_height">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FRAME -->
                                        <div id="sp_step_frame" class="form-group row frame_selection">
                                            <div class="col">
                                                <p>Framing Options:</p>
                                                <select class="form-control" onchange="calculate_poster();"
                                                        name="cart_item[frame]" id="cart_item_frame">
                                                    <option value="none">No Frame</option>
                                                    {{--<option value="24x36">24x36 Frame</option>
                                                    <option value="27x40">27x40 Frame</option>--}}
                                                </select>
                                            </div>
                                        </div>
                                        <!-- FRAME -->
                                        <div class="col-md-12 subtotal_row">
                                            SUBTOTAL: <span class="float-right">$@{{ price }}</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Poster print options selection -->
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">Preview Your Print</div>
                                <div class="card-body">
                                    <div class="col-lg-18 p-0 " id="crop_box">
                                        <img id="image" src="/uploads/{{$temporary_image}}" alt="Picture">

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4">

                            <div id="result">

                            </div>


                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid bottom_buttons">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-18">
                            <a href="/start-journey" class="btn btn-sm btn-secondary float-left"><span
                                    class="fas fa-undo-alt"></span> Change Uploaded Image</a>
                            <button type="button" class="btn btn-lg btn-success float-right" id="crop">
                                PREVIEW YOUR PRINT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <body>


    {{--<button type="button" class="btn btn-primary" id="crop">Crop</button>--}}

    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>

    <script>

        let poster_array = <?php echo json_encode($poster_print) ?>;

        app.controller('myCtrl', function ($scope, $http) {

            console.log("hello")
            document.getElementById("poster-print").style.display = "block";
            document.getElementById("foam-board").style.display = "none";
            document.getElementById("aluminium-print").style.display = "none";

            $scope.product_type = "1";
            $scope.poster_size = "1";
            $scope.paper_type = "1";
            $scope.price = 0;
            $scope.preview = Math.floor(Date.now() / 1000);
            $scope.hhh = "0000";
            poster.blade.php
            $scope.cart_product_name="";
            $scope.cart_product_type="";
            $scope.cart_product_size="";


            $scope.productChange = function () {

                if ($scope.product_type == 1) {
                    document.getElementById("poster-print").style.display = "block";
                    document.getElementById("aluminium-print").style.display = "none";
                    document.getElementById("foam-board").style.display = "none";
                    $scope.poster_size = "1";
                    $scope.changePosterSize();

                    $scope.cart_product_name="Poster Print";
                } else if ($scope.product_type == 2) {
                    document.getElementById("poster-print").style.display = "none";
                    document.getElementById("foam-board").style.display = "block";
                    document.getElementById("aluminium-print").style.display = "none";
                    $scope.poster_size = "1";
                    $scope.changeFoamBoard();

                    $scope.cart_product_name="Foam Core Board";


                } else {
                    document.getElementById("poster-print").style.display = "none";
                    document.getElementById("foam-board").style.display = "none";
                    document.getElementById("aluminium-print").style.display = "block";
                    $scope.poster_size = "1";
                    $scope.changeAluminium();
                    $scope.cart_product_name="Aluminium Print";
                }
            }

            $scope.changePosterSize = function () {
                console.log(poster_array);
                let data = poster_array.find((poster) => poster.id == $scope.poster_size);
                if ($scope.paper_type == 1) {
                    $scope.price = data['photo_premium_glossy'];
                    console.log($scope.price)
                }
                if ($scope.paper_type == 2) {
                    $scope.price = data['canvas'];
                    console.log($scope.price)
                }
                if ($scope.paper_type == 3) {
                    $scope.price = data['banner'];
                    console.log($scope.price)
                }
                if ($scope.paper_type == 4) {
                    $scope.price = data['self_adhesive'];
                    console.log($scope.price)
                }
            }

            $scope.changeAluminium = function () {
                let al_array = <?php echo json_encode($aluminium_print) ?>;
                let data = al_array.find((poster) => poster.id == $scope.poster_size);
                console.log(data["price"]);

                $scope.price = data["price"];
            }
            $scope.changeFoamBoard = function () {
                let array = <?php echo json_encode($foam_board) ?>;
                console.log($scope.poster_size);

                let data = array.find((poster) => poster.id == $scope.poster_size);
                $scope.price = data['price'];
            }

            $scope.changePosterSize();
            $scope.changeImage = function (preview) {
                $scope.preview = preview;
                $scope.hhh = "1111";
                console.log("call done" + preview)
            }

            window.addEventListener('DOMContentLoaded', function () {


                var image = document.querySelector('#image');
                var minAspectRatio = 1;
                var maxAspectRatio = 1;
                var previews = document.querySelectorAll('.preview');
                var previewReady = false;


                var cropper = new Cropper(image, {
                    /* aspectRatio: 18 / 12,*/
                    ready: function () {
                        var cropper = this.cropper;
                        var containerData = cropper.getContainerData();
                        var cropBoxData = cropper.getCropBoxData();
                        var aspectRatio = cropBoxData.width / cropBoxData.height;
                        var newCropBoxWidth;

                        if (aspectRatio < minAspectRatio || aspectRatio > maxAspectRatio) {
                            newCropBoxWidth = cropBoxData.height * ((minAspectRatio + maxAspectRatio) / 2);

                            cropper.setCropBoxData({
                                left: (containerData.width - newCropBoxWidth) / 2,
                                width: newCropBoxWidth
                            });
                        }
                    },

                    cropmove: function () {
                        var cropper = this.cropper;
                        var cropBoxData = cropper.getCropBoxData();
                        var aspectRatio = cropBoxData.width / cropBoxData.height;

                        if (aspectRatio < minAspectRatio) {
                            cropper.setCropBoxData({
                                width: cropBoxData.height * minAspectRatio
                            });
                        } else if (aspectRatio > maxAspectRatio) {
                            cropper.setCropBoxData({
                                width: cropBoxData.height * maxAspectRatio
                            });
                        }
                    },


                });


                var result = document.getElementById('result');
                document.getElementById('crop').addEventListener('click', function () {
                    var initialAvatarURL;
                    var canvas;

                    result.innerHTML = '';
                    result.appendChild(cropper.getCroppedCanvas());

                    if (cropper) {
                        canvas = cropper.getCroppedCanvas({
                            width: 100,
                            height: 160,
                        });

                        canvas.toBlob(function (blob) {
                            var formData = new FormData();
                            formData.append('avatar', blob, 'avatar.jpg');
                            formData.append('name', {{$name}});
                            formData.append('title', $scope.product_type + "(" + $scope.poster_size + ")");
                            formData.append('price', $scope.price);
                            formData.append('featured_image', "/uploads/" + $scope.preview + ".png");
                            formData.append('size', $scope.poster_size);


                            $.ajax('/upload/crop', {
                                method: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,

                                xhr: function () {
                                    var xhr = new XMLHttpRequest();

                                    xhr.upload.onprogress = function (e) {
                                        var percent = '0';
                                        var percentage = '0%';

                                        if (e.lengthComputable) {
                                            percent = Math.round((e.loaded / e.total) * 100);
                                            percentage = percent + '%';

                                        }
                                    };
                                    return xhr;
                                },

                                success: function (response) {

                                    console.log("success");
                                },

                                error: function () {
                                    console.log("errr");
                                },

                                complete: function (response) {
                                    let id=response.responseText.id;
                                    //Add to Cart Function
                                    let flag = false;
                                    let tempProduct = {
                                        "id": id,
                                        "title": $scope.cart_product_name,
                                        "price": $scope.price,
                                        "featured_image": "/uploads/" + response.responseText.image,
                                        "quantity": 1,
                                        "size": $scope.poster_size,
                                    };
                                    let cartProductList = localStorage.getItem('cart_product');
                                    if (cartProductList !== null && cartProductList !== undefined) {
                                        cartProductList = JSON.parse(cartProductList);

                                        if (cartProductList.length <= 0) {
                                            //Nothing
                                        } else {
                                            for (var cartProduct of cartProductList) {
                                                if (cartProduct.id === id) {
                                                    cartProduct.quantity += 1;
                                                    flag = true;
                                                    break;
                                                }
                                            }
                                        }
                                    } else {
                                        cartProductList = [];
                                    }

                                    if (!flag) {
                                        cartProductList.push(tempProduct);
                                        messageSuccess("Product added to cart")
                                    } else {
                                        messageSuccess("Product added to cart")
                                    }
                                    localStorage.setItem('cart_product', JSON.stringify(cartProductList));

                                    console.log($scope.product_type);

                                },
                            });
                        });
                    }
                });
            });

            function messageError(message) {
                toastr.warning(message, 'Failed')
            }

            function messageSuccess(message) {
                toastr.success(message, 'Success')
            }


        });

    </script>

@endsection
