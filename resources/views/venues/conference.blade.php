 
@extends('layouts.app')
@section('content')
<link href="{{ asset('dist/css/frontend.css') }}" rel="stylesheet">


    <style>
 

        /* Custom styles for a professional look */
        .venue-section {
            background-color: #f8f9fa; /* Light background for contrast */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .venue-image {
            border-radius: 8px; /* Rounded corners for the image */
        }

        h1, h2 {
            color: #343a40; /* Dark color for headers */
        }

        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s; /* Smooth transition */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
            border-color: #0056b3;
        }

        .booking-form {
            display: none; /* Hide the form initially */
            background: rgba(255, 255, 255, 0.9); /* White background with transparency */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 20px; /* Space above the form */
        }

        .form-group label {
            font-weight: bold; /* Bold labels */
        }
    </style>
@include('partials.layouts.navbar')
    <div class="container venue-section">
        <div class="row mb-4">
            <div class="col-md-6">
                <img src="{{ asset('dist/assets/img/sample3.webp') }}" alt="Conference Hall" class="img-fluid venue-image" />
            </div>
            <div class="col-md-6">
                <h1>Conference Halls</h1>
                <p>{{ $venueDetails }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" onclick="toggleForm()">Book Now</button>
            </div>
        </div>

        <div class="row booking-form" id="bookingForm">  
            <div class="col-md-12">
                <h2>Fill out the form to book a Conference Hall</h2>
                
                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('venues.conference.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="venueName">Venue Name</label>
                        <input type="text" name="venue_name" class="form-control" id="venueName" required>

                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" id="location" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    <button type="button" class="btn btn-secondary mt-3" onclick="toggleForm()">Close</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleForm() {
            const form = document.getElementById('bookingForm');
            form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
        }
    </script>
@endsection
