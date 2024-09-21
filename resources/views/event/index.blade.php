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
            margin: 20px auto; /* Add margin for better spacing */
        }

        /* Button styling to match the color scheme */
        #addEventButton {
            display: block;
            margin: 20px auto;
            background-color: #97CC70;
            border-color: #85b863;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        #addEventButton:hover {
            background-color: #85b863;
            border-color: #6ea557;
        }

        /* SweetAlert custom input field styles */
        .swal2-input {
            font-size: 16px;
            padding: 10px;
            width: 100%;
        }

        /* Label styles */
        .swal2-field {
            text-align: left;
            margin-bottom: 10px;
        }

        .swal2-field label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .swal2-field input {
            margin-top: 5px;
        }
    </style>

    <!-- Button to trigger SweetAlert -->
    <button id="addEventButton" class="btn">Add Event</button>

    <!-- Calendar container -->
    <div id="calendar"></div>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                },
                eventClick: function(info) {
                    const event = info.event;
                    Swal.fire({
                        title: 'Edit Event',
                        showCancelButton: true, // Enable Cancel button
                        confirmButtonText: 'Update', // Confirm button text
                        cancelButtonText: 'Cancel',  // Cancel button text
                        showDenyButton: true, // Enable Delete button
                        denyButtonText: 'Delete', // Delete button text
                        html: `
                            <div class="swal2-field">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="swal2-input" value="${event.title}">
                            </div>
                            <div class="swal2-field">
                                <label for="description">Description</label>
                                <input type="text" id="description" class="swal2-input" value="${event.extendedProps.description}">
                            </div>
                            <div class="swal2-field">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" id="start_date" class="swal2-input" value="${new Date(event.start).toISOString().slice(0, 16)}">
                            </div>
                            <div class="swal2-field">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" id="end_date" class="swal2-input" value="${event.end ? new Date(event.end).toISOString().slice(0, 16) : ''}">
                            </div>
                            <div class="swal2-field">
                                <label for="location">Location</label>
                                <input type="text" id="location" class="swal2-input" value="${event.extendedProps.location}">
                            </div>
                        `,
                        focusConfirm: false,
                        preConfirm: () => {
                            const title = Swal.getPopup().querySelector('#title').value;
                            const description = Swal.getPopup().querySelector('#description').value;
                            const start_date = Swal.getPopup().querySelector('#start_date').value;
                            const end_date = Swal.getPopup().querySelector('#end_date').value;
                            const location = Swal.getPopup().querySelector('#location').value;
                            if (!title || !start_date) {
                                Swal.showValidationMessage(`Please enter title and start date`);
                            }
                            return { title, description, start_date, end_date, location };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send AJAX request to edit event
                            fetch(`/event/edit/${event.id}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify(result.value)
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Success', data.message, 'success');
                                        calendar.refetchEvents(); // Refresh calendar events
                                    } else {
                                        Swal.fire('Error', 'There was an error updating the event', 'error');
                                    }
                                })
                                .catch(() => {
                                    Swal.fire('Error', 'There was an error updating the event', 'error');
                                });
                        } else if (result.isDenied) {
                            // Send AJAX request to delete event
                            fetch(`/event/destroy/${event.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire('Deleted!', data.message, 'success');
                                        calendar.refetchEvents(); // Refresh calendar events
                                    } else {
                                        Swal.fire('Error', 'There was an error deleting the event', 'error');
                                    }
                                })
                                .catch(() => {
                                    Swal.fire('Error', 'There was an error deleting the event', 'error');
                                });
                        }
                    });
                }
            });
            calendar.render();

            // Add Event Button Click Handler
            document.getElementById('addEventButton').addEventListener('click', function() {
                Swal.fire({
                    title: 'Add Event',
                    showCancelButton: true, // Enable Cancel button
                    confirmButtonText: 'Submit', // Confirm button text
                    cancelButtonText: 'Cancel',  // Cancel button text
                    html: `
                        <div class="swal2-field">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="swal2-input" placeholder="Enter title">
                        </div>
                        <div class="swal2-field">
                            <label for="description">Description</label>
                            <input type="text" id="description" class="swal2-input" placeholder="Enter description">
                        </div>
                        <div class="swal2-field">
                            <label for="start_date">Start Date</label>
                            <input type="datetime-local" id="start_date" class="swal2-input">
                        </div>
                        <div class="swal2-field">
                            <label for="end_date">End Date</label>
                            <input type="datetime-local" id="end_date" class="swal2-input">
                        </div>
                        <div class="swal2-field">
                            <label for="location">Location</label>
                            <input type="text" id="location" class="swal2-input" placeholder="Enter location">
                        </div>
                    `,
                    focusConfirm: false,
                    preConfirm: () => {
                        const title = Swal.getPopup().querySelector('#title').value;
                        const description = Swal.getPopup().querySelector('#description').value;
                        const start_date = Swal.getPopup().querySelector('#start_date').value;
                        const end_date = Swal.getPopup().querySelector('#end_date').value;
                        const location = Swal.getPopup().querySelector('#location').value;
                        if (!title || !start_date) {
                            Swal.showValidationMessage(`Please enter title and start date`);
                        }
                        return { title, description, start_date, end_date, location };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send AJAX request to store event
                        fetch('/event/store', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(result.value)
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Success', data.message, 'success');
                                    calendar.refetchEvents(); // Refresh calendar events
                                } else {
                                    Swal.fire('Error', 'There was an error creating the event', 'error');
                                }
                            })
                            .catch(() => {
                                Swal.fire('Error', 'There was an error creating the event', 'error');
                            });
                    }
                });
            });
        });
    </script>
@endsection
