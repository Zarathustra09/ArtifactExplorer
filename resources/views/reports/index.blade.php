@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-5 text-center">
            <h2 class="mb-3">Survey Report</h2>
            <p class="lead">Search and explore detailed feedback from users.</p>
        </div>

        <form id="search-form" method="GET" action="{{ route('report.index') }}" class="mb-5">
            <div class="input-group">
                <input type="text" name="search" id="search-input" class="form-control form-control-lg" placeholder="Search for feedback..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-lg" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div id="results-container" class="row">
            @foreach($results as $result)
                <div class="col-md-4 mb-4">
                    <div class="card shadow border-0 rounded-lg">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="mr-3">
                                    <img src="https://via.placeholder.com/60" alt="Profile Picture" class="rounded-circle" width="60" height="60">
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">{{ $result->full_name }}</h5>
                                    <div class="text-muted small">User</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <strong class="d-block mb-1">How was your visit:</strong>
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
            <nav>
                <ul class="pagination">
                    {{ $results->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('search-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const searchQuery = document.getElementById('search-input').value;

            fetch('{{ route('report.index') }}?search=' + searchQuery, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    const resultsContainer = document.getElementById('results-container');
                    resultsContainer.innerHTML = '';

                    data.results.forEach(result => {
                        const card = `
                        <div class="col-md-4 mb-4">
                            <div class="card shadow border-0 rounded-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="mr-3">
                                            <img src="https://via.placeholder.com/60" alt="Profile Picture" class="rounded-circle" width="60" height="60">
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-1">${result.full_name}</h5>
                                            <div class="text-muted small">User</div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <strong class="d-block mb-1">How was your visit:</strong>
                                        <div class="star-rating">
                                            ${[...Array(5).keys()].map(i => `
                                                <i class="fas fa-star ${result.visit_rating >= 5 - i ? 'text-warning' : 'text-muted'}"></i>
                                            `).join('')}
                                        </div>
                                    </div>

                                    <p class="card-text"><strong>Feedback:</strong> ${result.feedback}</p>
                                </div>
                            </div>
                        </div>
                    `;
                        resultsContainer.insertAdjacentHTML('beforeend', card);
                    });
                });
        });
    </script>
@endsection
