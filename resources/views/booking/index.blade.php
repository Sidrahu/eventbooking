@extends('Admin.index')

@section('content')
<div class="container mt-5">
    <h1>Bookings List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <div>
            <input type="text" id="bookingSearch" class="form-control" placeholder="Search Bookings..." style="width: 200px; margin-left: 5px; padding: 5px;">
        </div>
    </div>

    <div class="table-responsive">  
        <table id="bookingsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Event ID</th>
                    <th>Event Title</th>
                    <th>Date Created</th>
                    <th>Action</th>  
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<!-- Include necessary DataTables JS and CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    var table = $('#bookingsTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ route('bookings.index') }}",
            "type": "GET",
            "dataSrc": function(json) {
                console.log(json);  
                return json.data;  
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "event_id" },
            {
                "data": "event.title",  
                "render": function(data, type, row) {
                    return row.event.title;  
                }
            },
            { "data": "created_at" },
            { 
                "data": "action",
                "render": function(data, type, row) {
                    return data;  
                }
            }
        ],
        "columnDefs": [
            { "orderable": false, "targets": -1 } 
        ],
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": false,
        "pageLength": 10,
        "dom": '<"top"lf>rt<"bottom"ip><"clear">'
    });

    $('#bookingSearch').on('keyup', function() {
        table.search(this.value).draw();
    });
});
</script>

 
@endsection
