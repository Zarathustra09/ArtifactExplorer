@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-md-6">
                        <h5 class="mb-0 text-gray-800 fw-bold">Report Overview</h5>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-wrap gap-2 justify-content-start justify-content-md-end">
                            <select id="exportPeriod" class="form-select form-select-sm shadow-none">
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="semi-annually">Semi-Annually</option>
                                <option value="annually">Annually</option>
                            </select>
                            <button id="exportButton" class="btn btn-primary btn-sm">
                                <i class="fas fa-download me-1"></i> Export
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-2 p-md-4">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex flex-wrap gap-2">
                            <button id="applicationButton" class="btn btn-primary btn-sm">Application</button>
                            <button id="museumButton" class="btn btn-secondary btn-sm">Museum</button>
                            <button id="allButton" class="btn btn-success btn-sm">All</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive-xl">
                    <table id="reportTable" class="table table-hover table-striped nowrap w-100">
                        <thead class="table-light">
                        <tr>
                            <th>Device ID</th>
                            <th>Visit</th>
                            <th>Feedback</th>
                            <th>Navigation</th>
                            <th>AR Features</th>
                            <th>Engagement</th>
                            <th>Recommend</th>
                            <th>Improve</th>
                            <th>Helpfulness</th>
                            <th>Satisfaction</th>
                            <th>Knowledge</th>
                            <th>Clarity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Data will be populated here by DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.bootstrap5.min.css">
    <style>
        .table-responsive-xl {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            min-width: 100%;
            width: max-content !important;
        }

        .table td, .table th {
            white-space: nowrap;
            min-width: 100px;
        }

        @media (max-width: 768px) {
            .table td, .table th {
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
            }

            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                margin-left: 0 !important;
            }

            .table-responsive-xl::after {
                content: '';
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0;
                width: 5px;
                background: linear-gradient(to left, rgba(0,0,0,0.05), transparent);
                pointer-events: none;
            }
        }

        .table-responsive-xl::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive-xl::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .table-responsive-xl::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .table-responsive-xl::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#reportTable').DataTable({
                ajax: '{{ route('report.data') }}',
                columns: [
                    { data: 'device_identifier' },
                    { data: 'question_14' },
                    { data: 'question_15' },
                    { data: 'question_16' },
                    { data: 'question_17' },
                    { data: 'question_18' },
                    { data: 'question_19' },
                    { data: 'question_20' },
                    { data: 'question_21' },
                    { data: 'question_22' },
                    { data: 'question_23' },
                    { data: 'question_24' }
                ],
                pageLength: 10,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                scrollX: true,
                scrollCollapse: true,
                autoWidth: false,
                dom: '<"row"<"col-12 col-md-6"l><"col-12 col-md-6"f>>rtip',
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records..."
                },
                initComplete: function() {
                    table.columns.adjust();

                    if (window.innerWidth < 768) {
                        $('.dataTables_wrapper').append(
                            '<div class="text-muted text-center small mt-2">Swipe left/right to see more columns</div>'
                        );
                    }
                }
            });

            $('#applicationButton').on('click', function() {
                table.columns([1, 2, 3, 4, 5, 6, 7]).visible(true);
                table.columns([8, 9, 10, 11]).visible(false);
                table.columns.adjust().draw();
            });

            $('#museumButton').on('click', function() {
                table.columns([1, 2, 3, 4, 5, 6, 7]).visible(false);
                table.columns([8, 9, 10, 11]).visible(true);
                table.columns.adjust().draw();
            });

            $('#allButton').on('click', function() {
                table.columns([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]).visible(true);
                table.columns.adjust().draw();
            });

            $('#exportButton').on('click', function() {
                const period = $('#exportPeriod').val();
                window.location.href = `/feedback/export?period=${period}`;
            });

            var resizeTimer;
            $(window).on('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    table.columns.adjust();
                }, 250);
            });

            if ('ontouchstart' in window) {
                var tableWrapper = $('.table-responsive-xl');
                tableWrapper.on('scroll', function() {
                    $(this).addClass('is-scrolling');
                    clearTimeout($.data(this, 'scrollTimer'));
                    $.data(this, 'scrollTimer', setTimeout(function() {
                        tableWrapper.removeClass('is-scrolling');
                    }, 250));
                });
            }
        });
    </script>
@endsection
