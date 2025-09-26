@extends('Admin.index')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Edit Event</h2>

    <form action="{{ route('events.update', $events->id) }}" method="POST" enctype="multipart/form-data"> <!-- Use update route -->
        @csrf
        @method('PUT') <!-- Specify the method as PUT -->
        <div class="form-group">
            <label for="title">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $events->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $events->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="event_date">Date</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $events->event_date }}" required>
        </div>

        <div class="form-group">
            <label for="event_time">Time</label>
            <input type="time" class="form-control" id="event_time" name="event_time" value="{{ $events->event_time }}" required> <!-- Added time field -->
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $events->location }}" required>
        </div>

        <div class="form-group">
            <label for="image">Event Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*"> <!-- Image upload field (optional) -->
            <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
