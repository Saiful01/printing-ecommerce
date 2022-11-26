@extends("layouts.common")
@section("content")

    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>Banners</span></li>
                </ul>
            </div>
        </div>
        <div class="holder holder-mt-xsmall homepage_slider mb-3">
            <div class="container ">
                <div class="row">
                    <div class="col-lg col-xl slider_image">
                        <img src="/common/images/assets/Vinyl-Banner.png" alt="Poster Print Store"
                             title="Premium quality poster prints">
                    </div>
                    <div class="col-lg col-xl text-center">
                        <h1>Custom Banners <br></h1>
                        <p class="hps_bigtext"><strong>Create a banner for a life event like a milestone birthday or retirement party</strong></p>
                        <!--p>
                          If you order before 1pm EST, we will <strong>SHIP TODAY!</strong>
                        </p-->
                        <p class="hps_bigtext">
                            <strong>100% SATISFACTION GUARANTEED </strong>
                        </p>
                        <br>
                        <div>
                            <a href="/start-journey" class="btn btn-default"
                               title="Create custom banner prints">
                                CREATE YOUR BANNER NOW !
                                <br>
                                <small>Upload Your files, fast and easy !</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
