@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex flex-wrap gap-2">
                    <button id="applicationButton" class="btn btn-primary">Application</button>
                    <button id="museumButton" class="btn btn-secondary">Museum</button>
                    <button id="allButton" class="btn btn-success">All</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body p-2 p-md-4">
                        <div class="table-responsive-xl"> <!-- Changed to table-responsive-xl -->
                            <table id="reportTable" class="table table-hover table-striped nowrap w-100"> <!-- Added nowrap class -->
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
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.bootstrap5.min.css">
    <style>
        /* Enable horizontal scrolling for the table */
        .table-responsive-xl {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Ensure table takes full width */
        .table {
            min-width: 100%;
            width: max-content !important;
        }

        /* Prevent text wrapping in cells */
        .table td, .table th {
            white-space: nowrap;
            min-width: 100px; /* Minimum width for columns */
        }

        /* Custom styling for better mobile experience */
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

            /* Improved touch scrolling indicator */
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

        /* Custom scrollbar styling */
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
                scrollX: true, // Enable horizontal scrolling
                scrollCollapse: true,
                autoWidth: false, // Disable auto-width calculation
                dom: '<"row"<"col-12 col-md-6"l><"col-12 col-md-6"f>>rtip',
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records..."
                },
                initComplete: function() {
                    // Set initial column widths
                    table.columns.adjust();

                    // Add swipe indication for mobile
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

            // Handle window resize
            var resizeTimer;
            $(window).on('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    table.columns.adjust();
                }, 250);
            });

            // Add touch swipe indication
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
