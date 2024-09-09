<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <!-- Weather Widget and Stat Cards in One Row -->
            <div class="col-md-4">
                <div class="card shadow-lg p-4 mb-4">
                    <div class="card-body">
                        <div id="weatherapi-weather-widget-4"></div>
                        <script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=1857837&wid=4&tu=1&div=weatherapi-weather-widget-4' async></script>
                        <noscript><a href="https://www.weatherapi.com/weather/q/pantay-1857837" alt="Hour by hour Pantay weather">10 day hour by hour Pantay weather</a></noscript>
                    </div>
                </div>
            </div>

            <!-- Visits Today Card -->
            <div class="col-md-4">
                <div class="card text-center shadow-lg p-4 mb-4 border-0">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 1.5em; font-weight: bold;">Visits Today</h5>
                        <p class="card-text" style="font-size: 3em; font-weight: bold;">{{ $visitToday }}</p>
                    </div>
                </div>
            </div>

            <!-- Visits This Month Card -->
            <div class="col-md-4">
                <div class="card text-center shadow-lg p-4 mb-4 border-0">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 1.5em; font-weight: bold;">Visits This Month</h5>
                        <p class="card-text" style="font-size: 3em; font-weight: bold;">{{ $visitMonth }}</p>
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
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch age demographics data
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
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        color: '#333', // Darker tick marks
                                        font: {
                                            size: 14, // Custom font size for y-axis labels
                                            weight: 'bold'
                                        }
                                    },
                                    grid: {
                                        borderColor: '#CCC', // Custom grid color
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: '#333', // Darker tick marks for x-axis
                                        font: {
                                            size: 14,
                                            weight: 'bold'
                                        }
                                    },
                                    grid: {
                                        borderColor: '#CCC', // Custom grid color for x-axis
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#333',  // Custom color for the legend text
                                        font: {
                                            size: 16,
                                            weight: 'bold'
                                        }
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false, // Makes the graph responsive
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
                });
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
            })
            .catch(error => {
                console.error('Error fetching most visited data:', error);
            });



    </script>
@endsection
