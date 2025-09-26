@extends('Admin.index')

@section('content')
<div class="container mt-4">
    <h1>Edit Venue</h1>
    <form action="{{ route('admin.venues.update', $venue->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="venue_name">Venue Name:</label>
            <input type="text" name="venue_name" class="form-control" value="{{ $venue->venue_name }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" value="{{ $venue->location }}" required>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category" class="form-control" required>
                <option value="" disabled>Select Category</option>
                <option value="conference" {{ $venue->category == 'conference' ? 'selected' : '' }}>Conference</option>
                <option value="party" {{ $venue->category == 'party' ? 'selected' : '' }}>Party</option>
                <option value="wedding" {{ $venue->category == 'wedding' ? 'selected' : '' }}>Wedding</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Venue</button>
    </form>
</div>
@endsection
