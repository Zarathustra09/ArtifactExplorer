<!-- resources/views/reports/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Survey Report</h2>
        <form method="GET" action="" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach($results as $result)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light rounded-lg">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="mr-3">
                                    <img src="https://via.placeholder.com/60" alt="Profile Picture" class="rounded-circle" width="60" height="60">
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">{{ $result->full_name }}</h5>
                                    <div class="text-muted small">User</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <strong>How was your visit:</strong>
                                <div class="star-rating">
                                    @for($i = 5; $i >= 1; $i--)
                                        <i class="fas fa-star {{ $result->visit_rating >= $i ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                            </div>

                            <p class="card-text"><strong>Feedback:</strong> {{ $result->feedback }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $results->links() }}
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }
        .card-body {
            padding: 20px;
        }
        .star-rating i {
            font-size: 20px;
            color: #f2b600;
        }
        .star-rating i.text-muted {
            color: #ddd;
        }
        .shadow-sm {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
        .border-light {
            border-color: #e9ecef;
        }
        .rounded-lg {
            border-radius: 12px;
        }
        .rounded-circle {
            border-radius: 50%;
        }
    </style>
@endsection
