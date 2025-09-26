@extends('Admin.index')

@section('title', 'Reports')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Reports</h3>

    <!-- Monthly Bookings Chart -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Monthly Bookings</h4>
        </div>
        <div class="card-body">
            <canvas id="monthlyBookingsChart"></canvas>
        </div>
    </div>

    <!-- Monthly Venues Chart -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Monthly Venues</h4>
        </div>
        <div class="card-body">
            <canvas id="monthlyVenuesChart"></canvas>
        </div>
    </div>

    <!-- Monthly Users Chart -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Monthly Users</h4>
        </div>
        <div class="card-body">
            <canvas id="monthlyUsersChart"></canvas>
        </div>
    </div>

    <!-- Monthly Events Chart -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Monthly Events</h4>
        </div>
        <div class="card-body">
            <canvas id="monthlyEventsChart"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Monthly bookings data from controller
        const monthlyBookings = @json($finalMonthlyBookings);
        const labelsBookings = Object.keys(monthlyBookings).map(month => {
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", 
                                "August", "September", "October", "November", "December"];
            return monthNames[month - 1]; // -1 to adjust for zero-based index
        });
        const dataBookings = Object.values(monthlyBookings);

        const ctxBookings = document.getElementById('monthlyBookingsChart').getContext('2d');
        new Chart(ctxBookings, {
            type: 'bar',
            data: {
                labels: labelsBookings,
                datasets: [{
                    label: 'Bookings per Month',
                    data: dataBookings,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Monthly Venues Chart
        const monthlyVenues = @json($finalMonthlyVenues);
        const labelsVenues = Object.keys(monthlyVenues).map(month => {
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", 
                                "August", "September", "October", "November", "December"];
            return monthNames[month - 1]; // -1 to adjust for zero-based index
        });
        const dataVenues = Object.values(monthlyVenues);

        const ctxVenues = document.getElementById('monthlyVenuesChart').getContext('2d');
        new Chart(ctxVenues, {
            type: 'bar',
            data: {
                labels: labelsVenues,
                datasets: [{
                    label: 'Venues per Month',
                    data: dataVenues,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Monthly Users Chart
        const monthlyUsers = @json($finalMonthlyUsers);
        const labelsUsers = Object.keys(monthlyUsers).map(month => {
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", 
                                "August", "September", "October", "November", "December"];
            return monthNames[month - 1]; // -1 to adjust for zero-based index
        });
        const dataUsers = Object.values(monthlyUsers);

        const ctxUsers = document.getElementById('monthlyUsersChart').getContext('2d');
        new Chart(ctxUsers, {
            type: 'bar',
            data: {
                labels: labelsUsers,
                datasets: [{
                    label: 'Users per Month',
                    data: dataUsers,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Monthly Events Chart
        const monthlyEvents = @json($finalMonthlyEvents);
        const labelsEvents = Object.keys(monthlyEvents).map(month => {
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", 
                                "August", "September", "October", "November", "December"];
            return monthNames[month - 1]; // -1 to adjust for zero-based index
        });
        const dataEvents = Object.values(monthlyEvents);

        const ctxEvents = document.getElementById('monthlyEventsChart').getContext('2d');
        new Chart(ctxEvents, {
            type: 'bar',
            data: {
                labels: labelsEvents,
                datasets: [{
                    label: 'Events per Month',
                    data: dataEvents,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
