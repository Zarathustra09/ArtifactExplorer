<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="weatherapi-weather-widget-4"></div><script type='text/javascript' src='https://www.weatherapi.com/weather/widget.ashx?loc=1857837&wid=4&tu=1&div=weatherapi-weather-widget-4' async></script><noscript><a href="https://www.weatherapi.com/weather/q/pantay-1857837" alt="Hour by hour Pantay weather">10 day hour by hour Pantay weather</a></noscript>
                    </div>
                </div>
            </div>

            <!-- Age Demographics Chart -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="ageDemographicsChart" style="height: 400px"></canvas>
                    </div>
                </div>
            </div>

            <!-- Gender Demographics Chart -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="genderDemographicsChart" style="height: 400px"></canvas>
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

        // Fetch gender demographics data
        fetch('/gender-demographics')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('genderDemographicsChart').getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: data.map(item => item.gender),
                        datasets: [{
                            label: 'Gender Demographics',
                            data: data.map(item => item.count),
                            backgroundColor: [
                                '#FF6384',  // Color for Male
                                '#36A2EB'   // Color for Female
                            ],
                            borderColor: [
                                '#FF6384',  // Border color for Male
                                '#36A2EB'   // Border color for Female
                            ],
                            borderWidth: 2,  // Increased border width for better visual separation
                        }]
                    },
                    options: {
                        cutout: '50%', // Sets the inner radius to 50% to make it a half-doughnut
                        rotation: -90, // Starts the doughnut chart from the top
                        circumference: 180, // Makes the doughnut chart a half-doughnut
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#333',  // Custom color for the legend text
                                    font: {
                                        size: 16,
                                        weight: 'bold'
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
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

    </script>
@endsection
