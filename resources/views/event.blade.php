@extends('layouts.guest-app')


@section('content')


    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Upcoming Events
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="event.html"> Events</a></p>
                </div>
            </div>
        </div>
    </section>


    <section class="upcoming-event-area section-gap" id="events">
        <div class="container">
            <div id="calendar"></div>
        </div>
    </section>








    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

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
                                location: event.location
                            }));
                            successCallback(events);
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
                        html: `<p><strong>Description:</strong> ${event.extendedProps.description}</p>
                           <p><strong>Location:</strong> ${event.extendedProps.location}</p>`,
                        imageUrl: event.extendedProps.image_url,
                        imageAlt: 'Event Image'
                    });
                }
            });
            calendar.render();
        });
    </script>


@endsection
