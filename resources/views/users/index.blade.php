@extends('Admin.index')

@section('title', 'Users List')

@section('content')
<div class="container mt-5">
    <h3>Users List</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <!-- Edit Icon -->
                    <a href="{{ route('users.edit', $user->id) }}" class="text-primary">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Icon Form -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; background: none; color: #dc5f35;" onclick="return confirm('Are you sure you want to delete this user?');">
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
