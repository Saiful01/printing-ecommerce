@extends("layouts.common")
@section("content")

    <style>
      /*  .cropper-bg{
            width: 100% !important;
            height: auto !important;
        }*/
    </style>

    <div class="holder">
        <div class="container mb-4">
            <div class="row">
                <div class="col-6">
                    <!-- Poster print options selection -->
                    <div class="card product_selection" id="pp_size_selection">
                        <div class="card-header">Choose Your Print Options</div>
                        <div class="card-body poster_customize">


                            <div class="form-group row">
                                <label for="cart_item_media" class="col-sm-7 col-form-label">Product:</label>
                                <div class="col-sm-11">
                                    <select name="select_product_id" id="select_product_id" class="form-control" onchange="select_product();">
                                        <option selected="selected" value="photo">Poster Prints</option>
                                        <option value="framed">Framed Poster Prints</option>
                                        <option value="foamcore">Foam Core Board</option>
                                        <option value="aluminum">Aluminum Prints</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cart_item_media" class="col-sm-4 col-form-label">Paper:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" onchange="calculate_poster();" name="cart_item[media]" id="cart_item_media">
                                        <option selected="selected" value="satin">Photo Premium Satin</option>
                                        <option value="gloss">Photo Premium Glossy</option>
                                        <option value="vinyl">Banner-Vinyl</option>
                                        <option value="canvas">Canvas</option>
                                        <option value="adhesive">Self Adhesive Synthetic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="size_options" class="col-sm-4 col-form-label">Size:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="size_options">
                                        <option value="0">Select Size</option>
                                        <option value="18x12">18 x 12</option>
                                        <option value="20x16">20 x 16</option>
                                        <option value="24x16">24 x 16</option>
                                        <option value="24x18">24 x 18</option>
                                        <option value="30x20">30 x 20</option>
                                        <option value="32x24">32 x 24</option>
                                        <option value="36x24" selected="selected">36 x 24</option>
                                        <option value="40x30">40 x 30</option>
                                        <option value="48x32">48 x 32</option>
                                        <option value="48x36">48 x 36</option>
                                        <option value="54x36">54 x 36</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="CustomLength">Or choose your custom size:</label>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <input value="36" class="form-control" data-product="photo" min="8" max="60" type="text" name="cart_item[print_width]" id="cart_item_print_width">
                                    </div>
                                    <div class="col-md-1"> x </div>
                                    <div class="col-md-4">
                                        <input value="24" class="form-control" data-product="photo" min="8" max="60" type="text" name="cart_item[print_height]" id="cart_item_print_height">
                                    </div>
                                    <div class="col-md-2"> </div>
                                </div>
                            </div>
                            <!-- FRAME -->
                            <div id="sp_step_frame" class="form-group row frame_selection">
                                <div class="col-md-12">
                                    <p>Framing Options:</p>
                                    <select class="form-control" onchange="calculate_poster();" name="cart_item[frame]" id="cart_item_frame">
                                        <option value="none">No Frame</option>
                                        <option value="24x36">24x36 Frame</option>
                                        <option value="27x40">27x40 Frame</option>
                                    </select>
                                </div>
                            </div>
                            <!-- FRAME -->
                            <div class="col-md-12 subtotal_row">
                                SUBTOTAL: <span class="float-right" id="sp_subtotal_price">$18.99</span> <span class="float-right mr-2"><small><em id="sp_print_price_inc">$26.59</em></small></span>
                            </div>

                        </div>
                    </div>
                    <!-- Poster print options selection -->
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Preview Your Print</div>
                        <div class="card-body">
                            <div class="col-md-10 offset-md-1 text-center" id="crop_box">
                                <img id="image" src="/uploads/{{$temporary_image}}" alt="Picture">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bottom_buttons">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/create-custom-posters" class="btn btn-sm btn-secondary float-left"><span class="fas fa-undo-alt"></span> Change Uploaded Image</a>
                        <button type="button" class="btn btn-lg btn-success float-right" id="cropper_preview_print">
                            PREVIEW YOUR PRINT
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" id="crop">Crop</button>

{{--

    <section ng-controller="myCtrl">
        <div class="container">


            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="input-group row">
                                    <div class="col-sm-12">
                                        <label for="product_type">Product</label>
                                        <select class="form-select" name="product_type" id="product_type"
                                                ng-model="product_type" ng-change="productChange()">
                                            <option value="1">Poster Print</option>
                                            <option value="2">Foam Core Board</option>
                                            <option value="3">Aluminium Print</option>
                                        </select>

                                    </div>

                                    <div id="poster-print">
                                        <div class="col-sm-12">
                                            <label for="poster_size">Size</label>
                                            <select class="form-select" name="poster_size" id="poster_size"
                                                    ng-model="poster_size"
                                                    ng-change="changePosterSize()">
                                                @foreach($poster_print as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="paper_type">Paper Type</label>
                                            <select class="form-select" name="paper_type" id="paper_type"
                                                    ng-model="paper_type" ng-change="changePosterSize()">
                                                <option value="1">Photo Premium Glossy</option>
                                                <option value="2">Canvas</option>
                                                <option value="3">Banner Vinyl</option>
                                                <option value="4">Self Adhesive Synthetic</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div id="foam-board">
                                        <div class="col-sm-12">
                                            <label for="poster_size">Size</label>
                                            <select class="form-select" name="poster_size" id="poster_size" ng-model="poster_size" ng-change="changeFoamBoard()">
                                                @foreach($foam_board as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div id="aluminium-print">
                                        <div class="col-sm-12">
                                            <label for="poster_size">Size</label>
                                            <select class="form-select" name="poster_size" id="poster_size" ng-model="poster_size" ng-change="changeAluminium()">
                                                @foreach($aluminium_print as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="input-group row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">

                    Image

                    <p ng-bind="price"></p>
                </div>

            </div>

        </div>
    </section>
--}}


    {{--<script>

        let poster_array = <?php echo json_encode($poster_print) ?>;

        app.controller('myCtrl', function ($scope, $http) {

            document.getElementById("poster-print").style.display = "block";
            document.getElementById("foam-board").style.display = "none";
            document.getElementById("aluminium-print").style.display = "none";

            $scope.product_type = "1";
            $scope.poster_size = "1";
            $scope.paper_type = "1";
            $scope.price = 0;
            $scope.productChange = function () {
                if ($scope.product_type == 1) {
                    document.getElementById("poster-print").style.display = "block";
                    document.getElementById("aluminium-print").style.display = "none";
                    document.getElementById("foam-board").style.display = "none";
                    $scope.poster_size = "1";
                    $scope.changePosterSize();
                } else if ($scope.product_type == 2) {
                    document.getElementById("poster-print").style.display = "none";
                    document.getElementById("foam-board").style.display = "block";
                    document.getElementById("aluminium-print").style.display = "none";
                    $scope.poster_size = "1";
                    $scope.changeFoamBoard();

                } else {
                    document.getElementById("poster-print").style.display = "none";
                    document.getElementById("foam-board").style.display = "none";
                    document.getElementById("aluminium-print").style.display = "block";
                    $scope.poster_size = "1";
                    $scope.changeAluminium();
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

        });


    </script>--}}


    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var image = document.querySelector('#image');
            var minAspectRatio = 1;
            var maxAspectRatio = 1;
            var cropper = new Cropper(image, {
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

            document.getElementById('crop').addEventListener('click', function () {
                var initialAvatarURL;
                var canvas;


                if (cropper) {
                   /* canvas = cropper.getCroppedCanvas({
                        width: 100%,
                        height: 160,
                    });*/



                    canvas.toBlob(function (blob) {
                        var formData = new FormData();
                        formData.append('avatar', blob, 'avatar.jpg');

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

                            success: function () {
                                console.log("ok");
                            },

                            error: function () {
                                console.log("errr");
                            },

                            complete: function () {
                                console.log("done");
                            },
                        });
                    });
                }
            });
        });
    </script>
@endsection
