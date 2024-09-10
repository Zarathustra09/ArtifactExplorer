<!-- resources/views/visitor_information/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Bus Number</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                            <th>PWD</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry)
                            <tr>
                                <td>{{ $entry['bus_number'] }}</td>
                                <td>{{ $entry['full_name'] }}</td>
                                <td>{{ $entry['address'] }}</td>
                                <td>{{ $entry['nationality'] }}</td>
                                <td>{{ $entry['gender'] }}</td>
                                <td>{{ $entry['pwd'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($entry['time_in'])->format('F d, Y h:i A') }}</td>
                                <td>{{ $entry['time_out'] ? \Carbon\Carbon::parse($entry['time_out'])->format('F d, Y h:i A') : 'N/A' }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href="#" class="btn btn-info btn-sm mx-1" title="View" onclick="viewEntry({{ $entry['id'] }})">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function viewEntry(entryId) {
            fetch(`/visitor/demographics/${entryId}`)
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: 'Demographic Data',
                        html: `
                            <p><strong>Age 17 Below:</strong> ${data.age_17_below}</p>
                            <p><strong>Age 18-30:</strong> ${data.age_18_30}</p>
                            <p><strong>Age 31-45:</strong> ${data.age_31_45}</p>
                            <p><strong>Age 60 Above:</strong> ${data.age_60_above}</p>
                            <p><strong>Students Grade School:</strong> ${data.students_grade_school}</p>
                            <p><strong>Students High School:</strong> ${data.students_high_school}</p>
                            <p><strong>Students College:</strong> ${data.students_college}</p>
                        `,
                        icon: 'info'
                    });
                })
                .catch(error => {
                    console.error('Error fetching demographic data:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to fetch demographic data.',
                        icon: 'error'
                    });
                });
        }
    </script>
@endsection
