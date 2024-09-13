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

</head>

<body class="home">
<!-- Color Bars (above header)-->
<div class="color-bar-1"></div>
<div class="color-bar-2 color-bg"></div>

<div class="container">

    @include('layouts.header')

    <!-- Slider Carousel
       ================================================== -->

    <div class="span12 gallery-single">

        <div class="row">
            <div class="span6">
                <img src="{{ asset('Assets/ARTIFACTS/GALLERY 3/The Surrender/the_surrender.jpg') }}" class="align-left thumbnail" alt="image">
            </div>
            <div class="span6">
                <h2>Custom Illustration</h2>
                <p class="lead">For an international ad campaign. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>

                <ul class="project-info">
                    <li><h6>Date:</h6> 09/12/15</li>
                    <li><h6>Client:</h6> John Doe, Inc.</li>
                    <li><h6>Services:</h6> Design, Illustration</li>
                    <li><h6>Art Director:</h6> Jane Doe</li>
                    <li><h6>Designer:</h6> Jimmy Doe</li>
                </ul>

                <button class="btn btn-inverse pull-left" type="button">Visit Website</button>
                <a href="#" class="pull-right"><i class="icon-arrow-left"></i>Back to Gallery</a>
            </div>
        </div>

    </div><!-- End gallery-single-->


</div><!-- End Headline -->

<!-- resources/views/welcome.blade.php -->

<!-- resources/views/welcome.blade.php -->



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
