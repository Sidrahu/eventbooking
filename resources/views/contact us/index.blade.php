@extends('Admin.index')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Contact Messages</h2>

    <!-- Displaying Contacts -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 150px;">Name</th>
                <th style="width: 200px;">Email</th>
                <th style="width: 250px;">Message</th>
                <th style="width: 150px;">Submitted At</th>
                <th style="width: 160px;">Action</th> <!-- Increased width for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</td> <!-- Using Carbon to display time ago -->
                    <td>
                        <!-- View Icon -->
                        <a href="{{ route('contact.show', $contact->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> <!-- Font Awesome Eye Icon -->
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
