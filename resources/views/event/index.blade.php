@extends('layouts.app')

@section('content')

    <style>
        /* Customize the calendar toolbar buttons */
        .fc .fc-toolbar-chunk .fc-button {
            background-color: #97CC70; /* Apply the green color to buttons */
            border-color: #97CC70; /* Button borders */
            color: #fff; /* Button text color */
        }
        .fc .fc-toolbar-chunk .fc-button:hover {
            background-color: #85b863; /* Darker hover effect */
            border-color: #85b863;
        }

        /* Calendar header styling */
        .fc-toolbar-title {
            color: #333; /* Title color */
            font-size: 24px;
            font-weight: bold;
        }

        /* Highlight current day */
        .fc-day-today {
            background-color: #e9f7e1; /* Light green highlight for current day */
        }

        /* Event colors */
        .fc-event {
            background-color: #97CC70 !important;
            border-color: #85b863 !important;
        }

        /* Calendar container with responsive height */
        #calendar {
            width: 100%;
            height: 600px;
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>

    <!-- Calendar container -->
    <div id="calendar"></div>

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
@endsection
