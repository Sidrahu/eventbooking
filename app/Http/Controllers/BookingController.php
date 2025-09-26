<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\BookingsDataTable;

class BookingController extends Controller
{
    public function index(BookingsDataTable $dataTable)
    {
        return $dataTable->render('booking.index'); 
    }


    public function store(Request $request)
{
  
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    
        'event_id' => 'required|exists:events,id', 
    ]);

   
    $booking = Booking::create([
        'name' => $request->name,
        'email' => $request->email,
    
        'event_id' => $request->event_id,
    ]);

    
    return redirect()->back()->with('success', 'Booking confirmed!');
}

 
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.show', compact('booking'));  
    }

}

 

