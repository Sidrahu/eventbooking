@extends('Admin.index')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Contact Message Details</h2>

    <div class="card shadow-sm w-50 mx-auto"> <!-- Set width to 50% and center align -->
        <div class="card-body">
            <h5 class="font-weight-bold">Name:</h5>
            <p>{{ $contact->name }}</p>
            <h5 class="font-weight-bold">Email:</h5>
            <p>{{ $contact->email }}</p>
            <h5 class="font-weight-bold">Message:</h5>
            <p>{{ $contact->message }}</p>
            <h5 class="font-weight-bold">Submitted At:</h5>
            <p>{{ \Carbon\Carbon::parse($contact->created_at)->format('d M Y, H:i') }}</p> <!-- Using Carbon to format the date -->
            
            <a href="{{ route('contact.index') }}" class="btn btn-primary mt-3">Back to Messages</a> <!-- Button inside the card -->
        </div>
    </div>
</div>
@endsection
