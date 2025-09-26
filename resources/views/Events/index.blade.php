@extends('Admin.index')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Events</h2>

    {{-- Buttons for Create and Manage Categories --}}
    <div class="mb-3">
        <a href="{{ route('events.create') }}" class="btn btn-primary">Add</a>
    </div>

    <!-- Events Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th style="width: 150px;">Image</th> <!-- Image column -->
                <th style="width: 200px;">Event Title</th>
                <th style="width: 250px;">Description</th>
                <th style="width: 150px;">Date</th>
                <th style="width: 150px;">Location</th>
                <th style="width: 160px;">Actions</th> <!-- Increased width for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>
                    <!-- Displaying the event image -->
                    <img src="{{ $event->image_url }}" style="width: 100px; height: auto;">
                </td>
                <td>
                    <a href="{{ route('events.show', $event->id) }}" class="text-primary">
                        {{ $event->title }}
                    </a>
                </td>
                <td>{{ $event->description }}</td>
                <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    <!-- Styled buttons -->
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
