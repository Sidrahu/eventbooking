@extends('Admin.index')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Venue List</h1>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Venue Name</th>
                <th>Location</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venues as $venue)
                <tr>
                    <td>{{ $venue->id }}</td>
                    <td>{{ $venue->venue_name }}</td>
                    <td>{{ $venue->location }}</td>
                    <td>{{ $venue->category }}</td>
                    <td>
                        <!-- Edit Icon -->
                        <a href="{{ route('admin.venues.edit', $venue->id) }}" class="text-primary" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete Icon Form -->
                        <form action="{{ route('admin.venues.destroy', $venue->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; color: #dc5f35;" title="Delete" onclick="return confirm('Are you sure you want to delete this venue?');">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
