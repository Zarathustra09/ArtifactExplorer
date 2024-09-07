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
                        <canvas id="ageDemographicsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Gender Demographics Chart -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="genderDemographicsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Age Demographics Chart
            fetch('{{ route('age-demographics') }}')
                .then(response => response.json())
                .then(data => {
                    const ageLabels = data.map(item => item.age);
                    const ageCounts = data.map(item => item.count);

                    const ageCtx = document.getElementById('ageDemographicsChart').getContext('2d');
                    new Chart(ageCtx, {
                        type: 'bar',
                        data: {
                            labels: ageLabels,
                            datasets: [{
                                label: 'Age Demographics',
                                data: ageCounts,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    display: false,  // Hides the Y-axis
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });

            // Gender Demographics Chart
            fetch('{{ route('gender-demographics') }}')
                .then(response => response.json())
                .then(data => {
                    const genderLabels = data.map(item => item.gender);
                    const genderCounts = data.map(item => item.count);

                    const genderCtx = document.getElementById('genderDemographicsChart').getContext('2d');
                    new Chart(genderCtx, {
                        type: 'doughnut',
                        data: {
                            labels: genderLabels,
                            datasets: [{
                                label: 'Gender Demographics',
                                data: genderCounts,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Gender Demographics'
                                }
                            },
                            rotation: -Math.PI,
                            circumference: Math.PI
                        }
                    });
                });
        });
    </script>
@endsection
