<!DOCTYPE html>
<html lang="en">
    @include('partials.layouts.header')
<body>
    @include('partials.layouts.navbar')
<div class="container mt-5">
    <div class="event-container">
    
        <div class="event-image">
      
            <img src="{{ asset($event->image_url) }}" class="img-fluid" alt="Event Image">
       
            <pre>{{ asset($event->image_url) }}</pre>
        </div>

      
        <div class="event-details">
            <h1>{{ $event->title }}</h1>
            <p><strong>Description:</strong> {{ $event->description }}</p>
            <p><strong>Date:</strong> {{ $event->event_date }}</p>
            <p><strong>Time:</strong> {{ $event->event_time }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back to Events</a>
        </div>
    </div>
</div>

</body>
</html>
