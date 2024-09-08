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
{{--                            <th>Students (Grade School)</th>--}}
{{--                            <th>Students (High School)</th>--}}
{{--                            <th>Students (College)</th>--}}
                            <th>PWD</th>
{{--                            <th>17 y/o below</th>--}}
{{--                            <th>18-30 y/o</th>--}}
{{--                            <th>31-45 y/o</th>--}}
{{--                            <th>60 y/o above</th>--}}
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
{{--                                <td>{{ $entry['students_grade_school'] }}</td>--}}
{{--                                <td>{{ $entry['students_high_school'] }}</td>--}}
{{--                                <td>{{ $entry['students_college'] }}</td>--}}
                                <td>{{ $entry['pwd'] }}</td>
{{--                                <td>{{ $entry['age_17_below'] }}</td>--}}
{{--                                <td>{{ $entry['age_18_30'] }}</td>--}}
{{--                                <td>{{ $entry['age_31_45'] }}</td>--}}
{{--                                <td>{{ $entry['age_60_above'] }}</td>--}}
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href="#" class="btn btn-info btn-sm mx-1" title="View" onclick="viewEntry({{ $entry['id'] }})">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-warning btn-sm mx-1" title="Edit" onclick="editEntry({{ $entry['id'] }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm mx-1" title="Delete" onclick="deleteEntry({{ $entry['id'] }})">
                                            <i class="fas fa-trash"></i>
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
