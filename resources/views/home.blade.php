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
            <div class="row justify-content-center mt-4">
                <!-- Age Demographics Chart -->
                <div class="col-md-6">
                    <div class="card shadow-lg p-4 mb-4">
                        <div class="card-body">
                            <h3>Age Demographic Distribution</h3>
                            <div class="d-flex justify-content-end mb-3">
                                <div class="input-group w-auto">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-filter"></i>
                        </span>
                                    <select class="form-select" aria-label="Filter by Time Period">
                                        <option selected>Filter by</option>
                                        <option value="1">Today</option>
                                        <option value="2">This Week</option>
                                        <option value="3">This Month</option>
                                        <option value="4">This Year</option>
                                    </select>
                                </div>
                            </div>
                            <div style="height: 400px;">
                                <canvas id="ageDemographicsChart" style="height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gender Demographics Chart -->
                <div class="col-md-6">
                    <div class="card shadow-lg p-4 mb-4">
                        <div class="card-body">
                            <h3>Gender Demographic Distribution</h3>
                            <div class="d-flex justify-content-end mb-3">
                                <div class="input-group w-auto">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-filter"></i>
                        </span>
                                    <select class="form-select" aria-label="Filter by Time Period" id="genderFilter">
                                        <option selected>Filter by</option>
                                        <option value="1">Today</option>
                                        <option value="2">This Week</option>
                                        <option value="3">This Month</option>
                                        <option value="4">This Year</option>
                                    </select>
                                </div>
                            </div>
                            <div style="height: 400px;">
                                <canvas id="genderDemographicsChart" style="height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <!-- Most Visited Chart Full Width Below -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-12">
                    <div class="card shadow-lg p-4 mb-4">
                        <div class="card-body">
                            <h3>Most Visited Day</h3>
                            <div class="d-flex justify-content-end mb-3">
                                <div class="input-group w-auto">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-filter"></i>
                        </span>
                                    <select class="form-select" aria-label="Filter by Time Period" id="mostVisitedFilter">
                                        <option selected>Filter by</option>
                                        <option value="1">Today</option>
                                        <option value="2">This Week</option>
                                        <option value="3">This Month</option>
                                        <option value="4">This Year</option>
                                    </select>
                                </div>
                            </div>
                            <div style="height: 400px;">
                                <canvas id="mostVisitedChart" style="height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card shadow-lg p-4 mb-4">
                    <div class="card-body">
                        <h3>Student Demographics</h3>
                        <div class="d-flex justify-content-end mb-3">
                            <div class="input-group w-auto">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-filter"></i>
                        </span>
                                <select class="form-select" aria-label="Filter by Time Period" id="studentFilter">
                                    <option selected>Filter by</option>
                                    <option value="1">Today</option>
                                    <option value="2">This Week</option>
                                    <option value="3">This Month</option>
                                    <option value="4">This Year</option>
                                </select>
                            </div>
                        </div>
                        <div style="height: 400px;">
                            <canvas id="studentDemographicsChart" style="height: 100%;"></canvas>
                        </div>
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
                let ageDemographicsChart = null;
                let genderDemographicsChart = null;
                let mostVisitedChart = null;
                let studentDemographicsChart = null;

                function fetchAgeDemographics(filter) {
                    fetch(`/age-demographics?filter=${filter}`)
                        .then(response => response.json())
                        .then(data => {
                            const ctx = document.getElementById('ageDemographicsChart').getContext('2d');

                            if (ageDemographicsChart) {
                                ageDemographicsChart.destroy();
                            }

                            ageDemographicsChart = new Chart(ctx, {
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
                }

                function fetchGenderDemographics(filter) {
                    fetch(`/gender-demographics?filter=${filter}`)
                        .then(response => response.json())
                        .then(data => {
                            const genders = data.map(item => item.gender);
                            const counts = data.map(item => item.count);

                            const ctx = document.getElementById('genderDemographicsChart').getContext('2d');

                            if (genderDemographicsChart) {
                                genderDemographicsChart.destroy();
                            }

                            genderDemographicsChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: genders,
                                    datasets: [{
                                        label: 'Gender Demographics',
                                        data: counts,
                                        backgroundColor: [
                                            '#97CC70',
                                            '#6FAE55',
                                        ],
                                        borderColor: [
                                            '#5B8B42',
                                            '#497C34',
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

                            window.genderData = data.reduce((acc, item) => {
                                acc[item.gender] = item.count;
                                return acc;
                            }, {});
                            console.log('Gender Data:', window.genderData);
                        })
                        .catch(error => {
                            console.error('Error fetching gender demographics data:', error);
                        });
                }

                function fetchMostVisited(filter) {
                    fetch(`/most-visited?filter=${filter}`)
                        .then(response => response.json())
                        .then(data => {
                            const days = data.map(item => item.day);
                            const visits = data.map(item => item.visits);

                            const ctx = document.getElementById('mostVisitedChart').getContext('2d');

                            if (mostVisitedChart) {
                                mostVisitedChart.destroy();
                            }

                            mostVisitedChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: days,
                                    datasets: [{
                                        label: 'Most Visited Days',
                                        data: visits,
                                        backgroundColor: [
                                            '#97CC70',  // Base color
                                            '#6FAE55',  // Darker shade
                                            '#4F8B43',  // Even darker
                                            '#3C6D34',  // Darkest
                                            '#2A5420'   // Deeper shade if there are more than 4 records
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
                }

                function fetchStudentDemographics(filter) {
                    fetch(`/student-demographics?filter=${filter}`)
                        .then(response => response.json())
                        .then(data => {
                            const ctx = document.getElementById('studentDemographicsChart').getContext('2d');

                            if (studentDemographicsChart) {
                                studentDemographicsChart.destroy();
                            }

                            studentDemographicsChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Grade School', 'High School', 'College / GradSchool'],
                                    datasets: [{
                                        label: 'Student Demographics',
                                        data: [
                                            data.gradeSchool,
                                            data.highSchool,
                                            data.college
                                        ],
                                        backgroundColor: [
                                            '#97CC70',  // Base color
                                            '#6FAE55',  // Darker shade for High School
                                            '#4F8B43'   // Even darker for College / GradSchool
                                        ],
                                        borderColor: [
                                            '#5B8B42',  // Border color for Grade School
                                            '#497C34',  // Border color for High School
                                            '#386829'   // Border color for College / GradSchool
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

                            // Store student data for transfer
                            window.studentData = {
                                'Grade School': data.gradeSchool,
                                'High School': data.highSchool,
                                'College / GradSchool': data.college
                            };
                            console.log('Student Data:', window.studentData);
                        });
                }

                // Initial fetch with default filter
                fetchAgeDemographics('week');
                fetchGenderDemographics('week');
                fetchMostVisited('week');
                fetchStudentDemographics('week');

                // Handle filter change for age demographics
                document.querySelector('select[aria-label="Filter by Time Period"]').addEventListener('change', function (event) {
                    const filter = event.target.value;
                    switch (filter) {
                        case '1':
                            fetchAgeDemographics('today');
                            break;
                        case '2':
                            fetchAgeDemographics('week');
                            break;
                        case '3':
                            fetchAgeDemographics('month');
                            break;
                        case '4':
                            fetchAgeDemographics('year');
                            break;
                        default:
                            fetchAgeDemographics('today');
                            break;
                    }
                });

                // Handle filter change for gender demographics
                document.getElementById('genderFilter').addEventListener('change', function (event) {
                    const filter = event.target.value;
                    switch (filter) {
                        case '1':
                            fetchGenderDemographics('today');
                            break;
                        case '2':
                            fetchGenderDemographics('week');
                            break;
                        case '3':
                            fetchGenderDemographics('month');
                            break;
                        case '4':
                            fetchGenderDemographics('year');
                            break;
                        default:
                            fetchGenderDemographics('today');
                            break;
                    }
                });

                // Handle filter change for most visited
                document.getElementById('mostVisitedFilter').addEventListener('change', function (event) {
                    const filter = event.target.value;
                    switch (filter) {
                        case '1':
                            fetchMostVisited('today');
                            break;
                        case '2':
                            fetchMostVisited('week');
                            break;
                        case '3':
                            fetchMostVisited('month');
                            break;
                        case '4':
                            fetchMostVisited('year');
                            break;
                        default:
                            fetchMostVisited('today');
                            break;
                    }
                });

                // Handle filter change for student demographics
                document.getElementById('studentFilter').addEventListener('change', function (event) {
                    const filter = event.target.value;
                    switch (filter) {
                        case '1':
                            fetchStudentDemographics('today');
                            break;
                        case '2':
                            fetchStudentDemographics('week');
                            break;
                        case '3':
                            fetchStudentDemographics('month');
                            break;
                        case '4':
                            fetchStudentDemographics('year');
                            break;
                        default:
                            fetchStudentDemographics('today');
                            break;
                    }
                });

                function printCharts() {
                    const ageChart = document.getElementById('ageDemographicsChart').toDataURL('image/png');
                    const genderChart = document.getElementById('genderDemographicsChart').toDataURL('image/png');
                    const mostVisitedChart = document.getElementById('mostVisitedChart').toDataURL('image/png');
                    const studentChart = document.getElementById('studentDemographicsChart').toDataURL('image/png');

                    const requestData = {
                        ageChart: ageChart,
                        genderChart: genderChart,
                        mostVisitedChart: mostVisitedChart,
                        studentChart: studentChart,
                        ageData: window.ageData,
                        genderData: window.genderData,
                        mostVisitedData: window.mostVisitedData,
                        studentData: window.studentData
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
