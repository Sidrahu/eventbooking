@extends('layouts.app')

@section('content')
<link href="{{ asset('dist/css/frontend.css') }}" rel="stylesheet">
    <style>
        /* Custom styles for a professional look */
        .venue-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .venue-image {
            border-radius: 8px;
        }
        
        h1, h2 {
            color: #343a40;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .booking-form {
            display: none;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
@include('partials.layouts.navbar')
    <div class="container venue-section">
        <!-- Venue Section with Image and Description -->
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="{{ asset('dist/assets/img/sample4.webp') }}" alt="Wedding Venue" class="img-fluid venue-image" />
            </div>
            <div class="col-md-6">
                <h1>Wedding Venues</h1>
                <p>{{ $venueDetails }}</p>
            </div>
        </div>

        <!-- Book Now Button -->
        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" onclick="toggleForm()">Book Now</button>
            </div>
        </div>

        <!-- Booking Form Section -->
        <div class="row booking-form" id="bookingForm">  
            <div class="col-md-12">
                <h2>Fill out the form to book a Wedding Venue</h2>
                <form action="{{ route('venues.wedding.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="venueName">Venue Name</label>
                        <input type="text" name="venueName" class="form-control" id="venueName" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" id="location" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    <button type="button" class="btn btn-secondary mt-3" onclick="toggleForm()">Close</button> <!-- Close button -->
                </form>
            </div>
        </div>
    </div>

    <script>
        // Function to toggle the form visibility
        function toggleForm() {
            const form = document.getElementById('bookingForm');
            form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
        }
    </script>
@endsection
