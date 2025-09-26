@extends('Admin.index')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Create Event</h2>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
        @csrf
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="event_date">Date</label>
            <input type="date" class="form-control" id="event_date" name="event_date" required>
        </div>

        <div class="form-group">
            <label for="event_time">Time</label>
            <input type="time" class="form-control" id="event_time" name="event_time" required> <!-- Added time field -->
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="form-group">
            <label for="image">Event Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required> <!-- Image upload field -->
        </div>

        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>
@endsection
