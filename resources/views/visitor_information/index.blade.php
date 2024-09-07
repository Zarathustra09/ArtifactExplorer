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
                            <th >Full Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Occupation</th>
                            <th>Nationality</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $entry)
                            <tr>
                                <td>{{ $entry['full_name'] }}</td>
                                <td>{{ $entry['age'] }}</td>
                                <td>{{ $entry['gender'] }}</td>
                                <td>{{ $entry['occupation'] }}</td>
                                <td>{{ $entry['nationality'] }}</td>
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
