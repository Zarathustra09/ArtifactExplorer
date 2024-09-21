<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Museo ni Miguel Malvar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .map-container {
            position: relative;
            width: 100%;
            padding-bottom: 40%; /* Adjusted aspect ratio for smaller map */
            height: 100px;
            background: #eee;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0; /* Remove border */
        }

        /* Skeleton loading effect */
        .skeleton {
            background-color: #e0e0e0;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        .skeleton::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: -150%;
            height: 100%;
            width: 150%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
            animation: skeleton-loading 1.5s infinite;
        }

        @keyframes skeleton-loading {
            0% {
                left: -150%;
            }
            50% {
                left: 100%;
            }
            100% {
                left: -150%;
            }
        }

        .skeleton-image {
            height: 160px;
            width: 300px;
        }

        .skeleton-text {
            width: 80%;
            height: 20px;
            margin-top: 10px;
        }

        /* Museum Hours Styling */
        .museum-hours {
            margin-top: 20px;
        }

        .museum-hours h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .museum-hours ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .museum-hours li {
            margin-bottom: 5px;
            font-size: 18px;
            color: #555;
        }

        .museum-hours li span {
            font-weight: bold;
            color: #000;
        }

    </style>

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
<!-- Color Bars (above header) -->
<div class="color-bar-1"></div>
<div class="color-bar-2 color-bg"></div>

<div class="container">

    @include('layouts.header')

    <div class="row"><!--Container row-->

        <div class="span8 contact"><!--Begin page content column-->

            <h2>Contact Us</h2>

{{--            <form action="#" id="contact-form">--}}
{{--                <div class="input-prepend">--}}
{{--                    <span class="add-on"><i class="icon-user"></i></span>--}}
{{--                    <input class="span4" id="prependedInput" size="16" type="text" placeholder="Name">--}}
{{--                </div>--}}
{{--                <div class="input-prepend">--}}
{{--                    <span class="add-on"><i class="icon-envelope"></i></span>--}}
{{--                    <input class="span4" id="prependedInput" size="16" type="text" placeholder="Email Address">--}}
{{--                </div>--}}
{{--                <textarea class="span6"></textarea>--}}
{{--                <div class="row">--}}
{{--                    <div class="span2">--}}
{{--                        <input type="submit" class="btn btn-inverse" value="Send Message">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

            <div class="museum-hours">
                <h4>Museum Hours</h4>
                <ul>
                    <li><span>Monday:</span> CLOSED</li>
                    <li><span>Tuesday:</span> 8:00 AM - 4:00 PM</li>
                    <li><span>Wednesday:</span> 8:00 AM - 4:00 PM</li>
                    <li><span>Thursday:</span> 8:00 AM - 4:00 PM</li>
                    <li><span>Friday:</span> 8:00 AM - 4:00 PM</li>
                    <li><span>Saturday:</span> 8:00 AM - 4:00 PM</li>
                    <li><span>Sunday:</span> 8:00 AM - 4:00 PM</li>
                </ul>
            </div>

        </div>

        <!-- Sidebar -->
        <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->
            <h5 class="title-bg">Our Location</h5>
            <address>
                <strong>Museo ni Miguel Malvar</strong><br>
                446R+2WV, Gov. Malvar St,<br>
                Poblacion 1, Santo Tomas, 4234 Batangas<br>
            </address>

            <address>
                <strong>Ayesha Sayseng-Apostol</strong><br>
                <a href="mailto:mmm@nhcp.gov.ph">mmm@nhcp.gov.ph</a>
            </address>
            <!-- Add Facebook Page link -->
            <h5 class="title-bg">Follow Us on Facebook</h5>
            <p>
                <a href="https://www.facebook.com/museonimiguelmalvar" target="_blank">
                    <i class="fab fa-facebook-f"></i> Visit our Facebook Page
                </a>
            </p>


            <h5 class="title-bg">Map Us</h5>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241.84014873784312!2d121.1421986987333!3d14.110062074424741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd65967f38a1e3%3A0xc87b76eeea6afa6f!2sMuseo%20Ni%20Miguel%20Malvar!5e0!3m2!1sen!2sph!4v1726496256042!5m2!1sen!2sph" style="border:0; width: 100%; height: 300px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div><!-- End sidebar column -->

    </div><!-- End container row -->

</div> <!-- End Container -->
</div>
<!-- Footer Area -->
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

        $(".owl-carousel").owlCarousel({
            items: 1, // Display 1 item per slide
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
