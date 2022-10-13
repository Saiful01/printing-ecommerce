@extends("layouts.common")
@section("content")

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
                                            <select class="form-select" name="poster_size" id="poster_size" ng-model="poster_size" ng-change="changeAluminium()">>
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


    <script>

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


    </script>
@endsection
