@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" id = "generateReportButton" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>
        <div class="row justify-content-center">
            <!-- Single Row with Weather Widget and Stat Cards -->
            <div class="col-md-12">
                <div class="card shadow-lg p-4 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <!-- Weather Widget on the Left -->
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div id="weatherapi-weather-widget-4"></div>
                                <script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=1857837&wid=4&tu=1&div=weatherapi-weather-widget-4' async></script>
                                <noscript><a href="https://www.weatherapi.com/weather/q/pantay-1857837" alt="Hour by hour Pantay weather">10 day hour by hour Pantay weather</a></noscript>
                            </div>

                            <!-- Stat Cards on the Right -->
                            <div class="col-md-6">
                                <div class="row">
                                    <!-- Visits Today Card -->
                                    <div class="col-12">
                                        <div class="card text-center shadow-lg p-4 mb-4 border-0">
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 1.5em; font-weight: bold;">Visits Today</h5>
                                                <p class="card-text" style="font-size: 3em; font-weight: bold;">{{ $visitToday }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Visits This Month Card -->
                                    <div class="col-12">
                                        <div class="card text-center shadow-lg p-4 mb-4 border-0">
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 1.5em; font-weight: bold;">Visits This Month</h5>
                                                <p class="card-text" style="font-size: 3em; font-weight: bold;">{{ $visitMonth }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of Stat Cards Column -->
                        </div> <!-- End of Row -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row Below -->
        <div class="row justify-content-center mt-4">
            <!-- Age Demographics Chart -->
            <div class="col-md-6">
                <div class="card shadow-lg p-4 mb-4">
                    <div class="card-body">
                        <canvas id="ageDemographicsChart" style="height: 400px"></canvas>
                    </div>
                </div>
            </div>

            <!-- Gender Demographics Chart -->
            <div class="col-md-6">
                <div class="card shadow-lg p-4 mb-4">
                    <div class="card-body">
                        <canvas id="genderDemographicsChart" style="height: 400px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Most Visited Chart Full Width Below -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card shadow-lg p-4 mb-4">
                    <div class="card-body">
                        <canvas id="mostVisitedChart" style="height: 400px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-12 text-center">
                <button id="printCharts" class="btn btn-primary">Print Charts</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch and render charts
            fetch('/age-demographics')
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('ageDemographicsChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['17 y/o and below', '18-30 y/o', '31-45 y/o', '60 y/o and above'],
                            datasets: [{
                                label: 'Age Demographics',
                                data: [
                                    data.seventeen,
                                    data.thirty,
                                    data.fortyfive,
                                    data.sixty
                                ],
                                backgroundColor: [
                                    '#97CC70',  // Base color
                                    '#6FAE55',  // Darker shade for 18-30
                                    '#4F8B43',  // Even darker for 31-45
                                    '#3C6D34'   // Darkest for 60 and above
                                ],
                                borderColor: [
                                    '#5B8B42',  // Border color for 17 y/o and below
                                    '#497C34',  // Border color for 18-30
                                    '#386829',  // Border color for 31-45
                                    '#2A5420'   // Border color for 60 and above
                                ],
                                borderWidth: 2,  // Increased border width for better visual separation
                                borderRadius: 5, // Rounded corners on the bars
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,  // Force y-axis to start at zero
                                        fontColor: '#333',  // Darker tick marks
                                        fontSize: 12,       // Smaller font size for y-axis labels
                                        fontStyle: 'bold'
                                    },
                                    gridLines: {
                                        color: '#CCC'       // Custom grid color
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        fontColor: '#333',  // Darker tick marks for x-axis
                                        fontSize: 12,       // Smaller font size for x-axis labels
                                        fontStyle: 'bold'
                                    },
                                    gridLines: {
                                        color: '#CCC'       // Custom grid color for x-axis
                                    }
                                }]
                            },
                            legend: {
                                labels: {
                                    fontColor: '#333',  // Custom color for the legend text
                                    fontSize: 14,       // Legend text size
                                    fontStyle: 'bold'
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,  // Makes the graph responsive
                            layout: {
                                padding: {
                                    top: 10,
                                    bottom: 10,
                                    left: 20,
                                    right: 20
                                }
                            },
                            animation: {
                                duration: 1500,           // Custom animation duration
                                easing: 'easeOutBounce'   // Custom easing function
                            }
                        }
                    });

                    // Store age data for transfer
                    window.ageData = {
                        '17 y/o and below': data.seventeen,
                        '18-30 y/o': data.thirty,
                        '31-45 y/o': data.fortyfive,
                        '60 y/o and above': data.sixty
                    };
                    console.log('Age Data:', window.ageData);
                });

            fetch('/gender-demographics')
                .then(response => response.json())
                .then(data => {
                    // Map genders and counts
                    const genders = data.map(item => item.gender);
                    const counts = data.map(item => item.count);

                    const ctx = document.getElementById('genderDemographicsChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: genders,  // Use the gender labels from the data
                            datasets: [{
                                label: 'Gender Demographics',
                                data: counts,  // Use the count values from the data
                                backgroundColor: [
                                    '#97CC70',  // Base color
                                    '#6FAE55',  // Darker shade
                                ],
                                borderColor: [
                                    '#5B8B42',  // Border color
                                    '#497C34',  // Darker border color
                                ],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            cutout: '50%',
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#333',
                                        font: {
                                            size: 16,
                                            weight: 'bold'
                                        }
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            animation: {
                                duration: 1500,
                                easing: 'easeOutBounce'
                            }
                        }
                    });

                    // Store gender data for transfer
                    window.genderData = data.reduce((acc, item) => {
                        acc[item.gender] = item.count;
                        return acc;
                    }, {});
                    console.log('Gender Data:', window.genderData);
                })
                .catch(error => {
                    console.error('Error fetching gender demographics data:', error);
                });

            fetch('/most-visited')
                .then(response => response.json())
                .then(data => {
                    const days = data.map(item => item.day);
                    const visits = data.map(item => item.visits);

                    const baseColor = '#97CC70';
                    const colorShades = [
                        '#97CC70',  // Base color
                        '#6FAE55',  // Darker shade
                        '#4F8B43',  // Even darker
                        '#3C6D34',  // Darkest
                        '#2A5420'   // Deeper shade if there are more than 4 records
                    ];

                    // Use shades based on the number of records, repeating colors if necessary
                    const backgroundColors = days.map((_, index) => colorShades[index % colorShades.length]);
                    const borderColors = days.map((_, index) => colorShades[index % colorShades.length]);

                    const ctx = document.getElementById('mostVisitedChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: days,
                            datasets: [{
                                label: 'Number of Visits',
                                data: visits,
                                backgroundColor: backgroundColors,  // Dynamic shades
                                borderColor: borderColors,          // Dynamic border color
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#333',  // Darker tick marks
                                        fontSize: 14,       // Custom font size for y-axis labels
                                        fontStyle: 'bold'
                                    },
                                    gridLines: {
                                        color: '#CCC'  // Custom grid color
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        fontColor: '#333',  // Darker tick marks for x-axis
                                        fontSize: 14,
                                        fontStyle: 'bold'
                                    },
                                    gridLines: {
                                        color: '#CCC'  // Custom grid color for x-axis
                                    }
                                }]
                            },
                            legend: {
                                labels: {
                                    fontColor: '#333',  // Custom color for the legend text
                                    fontSize: 16,
                                    fontStyle: 'bold'
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    top: 10,
                                    bottom: 10,
                                    left: 20,
                                    right: 20
                                }
                            },
                            animation: {
                                duration: 1500,  // Custom animation duration
                                easing: 'easeOutBounce'  // Custom easing function
                            }
                        }
                    });

                    // Store most visited data for transfer
                    window.mostVisitedData = data.reduce((acc, item) => {
                        acc[item.day] = item.visits;
                        return acc;
                    }, {});
                    console.log('Most Visited Data:', window.mostVisitedData);
                })
                .catch(error => {
                    console.error('Error fetching most visited data:', error);
                });

            function printCharts() {
                const ageChart = document.getElementById('ageDemographicsChart').toDataURL('image/png');
                const genderChart = document.getElementById('genderDemographicsChart').toDataURL('image/png');
                const mostVisitedChart = document.getElementById('mostVisitedChart').toDataURL('image/png');

                const requestData = {
                    ageChart: ageChart,
                    genderChart: genderChart,
                    mostVisitedChart: mostVisitedChart,
                    ageData: window.ageData,
                    genderData: window.genderData,
                    mostVisitedData: window.mostVisitedData
                };

                console.log('Data being sent to ChartController:', requestData);

                fetch('/save-charts', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(requestData)
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = '/print-charts';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to save charts. Please try again.'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error saving charts:', error);
                    });
            }

            document.getElementById('printCharts').addEventListener('click', printCharts);
            document.getElementById('generateReportButton').addEventListener('click', printCharts);
        });
    </script>
@endsection
