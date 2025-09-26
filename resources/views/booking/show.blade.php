<!-- resources/views/bookings/show.blade.php -->

@extends('Admin.index')

@section('content')
<div class="container mt-5">
    <h1>Booking Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $booking->name }}</p>
            <p><strong>Email:</strong> {{ $booking->email }}</p>
            <p><strong>Event ID:</strong> {{ $booking->event->id }}</p>
            <p><strong>Event Title:</strong> {{ $booking->event->title }}</p>
            <p><strong>Date Created:</strong> {{ $booking->created_at->format('d-m-Y H:i:s') }}</p>
            <a href="{{ route('bookings.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
