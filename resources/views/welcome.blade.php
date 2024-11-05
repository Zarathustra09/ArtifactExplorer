<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Museo ni Miguel Malvar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS
    ================================================== -->
    <link href="http://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/bootstrap-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/css/custom-styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="{{ asset('landing-page/css/style-ie.css') }}"/>
<![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('new_logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('new_logo.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('new_logo.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('new_logo.png') }}">

    <!-- JS -->
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="{{ asset('landing-page/js/bootstrap.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('landing-page/js/jquery.custom.js') }}"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#btn-blog-next").click(function () {
                $('#blogCarousel').carousel('next')
            });
            $("#btn-blog-prev").click(function () {
                $('#blogCarousel').carousel('prev')
            });

            $("#btn-client-next").click(function () {
                $('#clientCarousel').carousel('next')
            });
            $("#btn-client-prev").click(function () {
                $('#clientCarousel').carousel('prev')
            });
        });

        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                slideshow: true,
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
<style>
    .btn-custom {
        padding: 15px 30px; /* Increase padding for a larger button */
        font-size: 1.2em;    /* Increase font size */
    }
</style>

</head>

<body class="home">
<!-- Color Bars (above header)-->
<div class="color-bar-1"></div>
<div class="color-bar-2 color-bg"></div>

<div class="container">

  @include('layouts.header')

        <!-- Slider Carousel
       ================================================== -->
        <div class="span8">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <a href="{{ asset('landing-page/gallery-single.htm') }}">
                        <img src="{{ asset('gallery_img/gallery_1n2/Battle-of-Zapote-Bridge.jpg') }}" alt="slider" width="600" height="400"/>
                    </a>
                </div>
                <div class="item">
                    <a href="{{ asset('landing-page/gallery-single.htm') }}">
                        <img src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-fighting-on-horseback.jpg') }}" alt="slider" width="600" height="400"/>
                    </a>
                </div>
                <div class="item">
                    <a href="{{ asset('landing-page/gallery-single.htm') }}">
                        <img src="{{ asset('gallery_img/gallery_1n2/Miguel-Malvar-with-his-wife-Paula.jpg') }}" alt="slider" width="600" height="400"/>
                    </a>
                </div>
                <div class="item">
                    <a href="{{ asset('landing-page/gallery-single.htm') }}">
                        <img src="{{ asset('gallery_img/gallery_3/The-Surrender.jpg') }}" alt="slider" width="600" height="400"/>
                    </a>
                </div>
            </div>
        </div>


        <!-- Headline Text
        ================================================== -->
        <div class="span4">
            <h3>Heneral Miguel Malvar<br />
            </h3>
            <p class="lead">A museum that showcases the life and times of Gen. Miguel Malvar.</p>
            <p>MALVAR, MIGUEL (Sept. 27, 1865 – Oct. 13, 1911), farmer, businessman. Revolutionary general, was born in the small town of Santo Tomas, Batangas province. He was the first of three children of Maximo Malvar and Tiburcia Carpio. His father was a timber cutter by occupation and operated logging activities on Mount Makiling;. later he accumulated some money and bought lands which he planted to sugarcane and rice; and then he became a teniente del barrio, sometime in 1890 or 1891. </p>
            <a href="https://www.malvar.net/article/biography"><i class="icon-plus-sign"></i>Read More</a>
        </div>
    </div><!-- End Headline -->

    <!-- resources/views/welcome.blade.php -->

    <!-- resources/views/welcome.blade.php -->

    <div class="row"><!-- Begin Bottom Section -->

        <!-- Visitor Ratings
        ================================================== -->
        <div class="span12">

            <h5 class="title-bg">Visitor Ratings
                <small>All the latest feedback</small>
            </h5>

            <div id="visitorRatingsCarousel" class="owl-carousel owl-theme">
                @foreach($results as $result)
                    <div class="item">
                        <div class="d-flex align-items-center mb-4">
                            <div>
                                <h5 class="card-title mb-1">{{ $result->full_name }}</h5>
                                <div class="text-muted small">User</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <strong class="d-block mb-1">How was your visit:</strong>
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $result->visit_rating >= $i ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                        </div>

                        <p class="card-text"><strong>Feedback:</strong> {{ $result->feedback }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

<div class="row"><!-- New Section Begin -->

    <!-- ARtifact Explorer Endorsement
    ================================================== -->

    <!-- App Promo Image Section
    ================================================== -->
    <div class="span12">
        <h5 class="title-bg">Explore History with ARtifact Explorer
            <small>Discover artifacts like never before</small>
        </h5>

        <img src="{{ asset('NEW CONTENT/Artifact Explorer.png') }}" alt="ARtifact Explorer App" style="width: 100%; height: auto;">
    </div>

</div><!-- End New Section -->

<div class="row"><!-- New Section Begin -->

    <!-- ARtifact Explorer Endorsement
    ================================================== -->

    <!-- App Promo Image Section
    ================================================== -->
    <div class="span12">
        <h5 class="title-bg">Explore History with ARtifact Explorer
            <small>Discover artifacts like never before</small>
            <a href="{{asset('NEW CONTENT/Malvar.apk')}}" download class="btn btn-success btn-lg pull-right">DOWNLOAD APP</a>

        </h5>
        <img src="{{ asset('NEW CONTENT/new-promotion.png') }}" alt="ARtifact Explorer App" style="width: 100%; height: auto;">
    </div>

</div><!-- End New Section -->


</div> <!-- End Container -->

<!-- Footer Area
    ================================================== -->

@include('layouts.footer')

<!-- Scroll to Top -->
<div id="toTop" class="hidden-phone hidden-tablet">Back to Top</div>

</body>

<script>
    $(document).ready(function(){
        $("#visitorRatingsCarousel").owlCarousel({
            items: 3, // Display 3 items per slide
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    });


    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1, // Display 1 items per slide
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    });
</script>
</html>
