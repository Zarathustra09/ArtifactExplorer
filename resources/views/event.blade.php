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

        .fc .fc-toolbar-chunk .fc-button {
            background-color: #97CC70; /* Apply the green color to buttons */
            border-color: #97CC70; /* Button borders */
            color: #fff; /* Button text color */
        }
        .fc .fc-toolbar-chunk .fc-button:hover {
            background-color: #85b863; /* Darker hover effect */
            border-color: #85b863;
        }

        .fc-toolbar-title {
            color: #97CC70; /* Green color for the month title */
            font-size: 24px;
            font-weight: bold;
            text-align: center; /* Center the title */
            width: 100%; /* Ensure it stretches across the toolbar */
        }

        .fc-event {
            background-color: #97CC70 !important; /* Green background */
            border-color: #FFFFFF !important; /* White border */
            color: #FFFFFF !important; /* White text */
        }


        #calendar {
            width: 100%;
            height: 600px;
            max-width: 1200px;
            margin: 20px auto; /* Add margin for better spacing */
        }
        /* Calendar container with responsive height */
        #calendar {
            width: 100%;
            height: 600px;
            max-width: 1200px;
            margin: 20px auto; /* Add margin for better spacing */
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

            <h2>Event Calendar</h2>

            <!-- Calendar container -->
            <div id="calendar"></div>

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

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // Set the default view (Month)
            headerToolbar: {
                left: 'prev,next today', // Navigation buttons
                center: 'title', // Calendar title
                right: 'dayGridMonth,timeGridWeek,timeGridDay' // Buttons for Month, Week, and Day views
            },
            views: {
                dayGridMonth: { // Month view
                    buttonText: 'Month'
                },
                timeGridWeek: { // Week view
                    buttonText: 'Week'
                },
                timeGridDay: { // Day view
                    buttonText: 'Day'
                }
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                fetch('/event/data')
                    .then(response => response.json())
                    .then(data => {
                        // Transform the API data to match FullCalendar's expected structure
                        const events = data.map(event => ({
                            id: event.id,
                            title: event.title,
                            start: event.start_date, // FullCalendar expects 'start'
                            end: event.end_date,     // FullCalendar expects 'end'
                            description: event.description,
                            location: event.location
                        }));
                        successCallback(events); // Provide transformed data to FullCalendar
                    })
                    .catch(() => {
                        failureCallback();
                        alert('There was an error while fetching events!');
                    });
            }
        });
        calendar.render();
    });
</script>

</body>
</html>
