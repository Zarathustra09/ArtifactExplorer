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

        .event-item {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .event-item h4 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .event-item p {
            font-size: 0.9rem;
            color: #666;
        }

        .event-item img {
            border-radius: 8px;
            margin-top: 15px;
            transition: opacity 0.3s ease;
        }

        .event-item img:hover {
            opacity: 0.8;
        }

        .owl-carousel .owl-nav button {
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .owl-carousel .owl-dots .owl-dot.active {
            background-color: #007bff;
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
            <h5 class="title-bg">Upcoming Events</h5>
            <div class="owl-carousel owl-theme" id="eventCarousel">
                <!-- Event items will be populated here by JavaScript -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Custom Styling -->
<style>
    .event-item {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .event-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .event-item h4 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #007bff;
    }

    .event-item p {
        font-size: 0.9rem;
        color: #666;
    }

    .event-item img {
        border-radius: 8px;
        margin-top: 15px;
        transition: opacity 0.3s ease;
    }

    .event-item img:hover {
        opacity: 0.8;
    }

    .owl-carousel .owl-nav button {
        background-color: #007bff;
        color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
    }

    .owl-carousel .owl-dots .owl-dot.active {
        background-color: #007bff;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            views: {
                dayGridMonth: { buttonText: 'Month' },
                timeGridWeek: { buttonText: 'Week' },
                timeGridDay: { buttonText: 'Day' }
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                fetch('/event/data')
                    .then(response => response.json())
                    .then(data => {
                        const events = data.map(event => ({
                            id: event.id,
                            title: event.title,
                            start: event.start_date,
                            end: event.end_date,
                            description: event.description,
                            location: event.location,
                            image_url: event.image_url
                        }));
                        successCallback(events);
                        populateEventCarousel(events);
                    })
                    .catch(() => {
                        failureCallback();
                        alert('There was an error while fetching events!');
                    });
            },
            eventClick: function(info) {
                const event = info.event;
                Swal.fire({
                    title: event.title,
                    html: `
                    <p><strong>Description:</strong> ${event.extendedProps.description}</p>
                    <p><strong>Location:</strong> ${event.extendedProps.location}</p>
                    <p><strong>Start:</strong> ${new Date(event.start).toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true })}</p>
                    <p><strong>End:</strong> ${event.end ? new Date(event.end).toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true }) : 'N/A'}</p>
                    ${event.extendedProps.image_url ? `<img src="/storage/${event.extendedProps.image_url}" alt="${event.title}" style="width: 100%; height: auto;">` : ''}
                `,
                    showCloseButton: true,
                    showCancelButton: false,
                    focusConfirm: true
                });
            }
        });
        calendar.render();

        function populateEventCarousel(events) {
            const eventCarousel = document.getElementById('eventCarousel');
            events.forEach(event => {
                const eventItem = document.createElement('div');
                eventItem.classList.add('item');
                eventItem.innerHTML = `
                <div class="event-item">
                    <h4>${event.title}</h4>
                    <p>${event.description.length > 100 ? event.description.substring(0, 100) + '...' : event.description}</p>
                    <p><strong>Location:</strong> ${event.location}</p>
                    <p><strong>Start:</strong> ${new Date(event.start).toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true })}</p>
                    <p><strong>End:</strong> ${event.end ? new Date(event.end).toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true }) : 'N/A'}</p>
                    ${event.image_url ? `<img src="/storage/${event.image_url}" alt="${event.title}" style="width: 100%; height: auto;">` : ''}
                </div>
            `;
                eventCarousel.appendChild(eventItem);
            });

            $('#eventCarousel').owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });
        }
    });
</script>

</body>

</html>
