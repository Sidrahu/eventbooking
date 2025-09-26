<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
   
   
 
    public function wedding()
    {
        $venueDetails = 'Details about Wedding Venues';
        return view('venues.wedding', compact('venueDetails'));
    }

    public function conference()
    {
        $venueDetails = 'This conference hall is perfect for hosting various events, including corporate meetings, seminars, and social gatherings. It is equipped with state-of-the-art technology, such as high-definition projectors, audio-visual systems, and high-speed internet connectivity. The hall features comfortable seating arrangements to accommodate various group sizes, ensuring a pleasant experience for all attendees. Additionally, on-site catering services are available, offering a range of menu options to suit different tastes and dietary requirements. Our dedicated staff is committed to providing exceptional service, making your event a memorable one.';


        return view('venues.conference', compact('venueDetails'));
    }

    public function party()
{
    $venueDetails = 'Our party spaces are perfect for hosting various events, such as birthday parties, anniversaries, and corporate gatherings. Each space is designed to create a vibrant atmosphere that will leave a lasting impression on your guests.

    Here are some key features of our party venues:

     Our venues offer generous space that can accommodate small to large gatherings. Whether you are planning an intimate celebration or a grand event, we have the right space for you.

    We understand that each event is unique, which is why we allow you to customize the decor according to your theme. From elegant table settings to colorful lighting, your vision can come to life.

     
    Book your party space with us today and let us help you create unforgettable memories!';

    return view('venues.party', compact('venueDetails'));
}


    public function submitPartyForm(Request $request)
    {
        $request->validate([
            'venueName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Venue::create([
            'venue_name' => $request->venueName,
            'location' => $request->location,
            'category' => 'party', 
        ]);

        return redirect()->back()->with('success', 'Party space booked successfully!');
    }

    public function submitConferenceForm(Request $request)
{
    $request->validate([
        'venue_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
    ]);

    Venue::create([
        'venue_name' => $request->venue_name,
        'location' => $request->location,
        'category' => 'conference',  
    ]);

    return redirect()->back()->with('success', 'Conference hall booked successfully!');
}

    

    public function submitWeddingForm(Request $request)
    {
        $request->validate([
            'venueName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Venue::create([
            'venue_name' => $request->venueName,
            'location' => $request->location,
            'category' => 'wedding',  
        ]);

        return redirect()->back()->with('success', 'Wedding venue booked successfully!');
    }

    public function index()
    {
        $venues = Venue::all(); 
        return view('venues.index', compact('venues'));  
    }
    public function destroy($id){

        $venue = Venue::findOrFail($id);
        $venue->delete();
        return redirect()->route('venues.index')->with('success' , 'venue deleted successfully');
    }

    public function edit($id){

        $venue = Venue::findOrFail($id);
        return view('venues.edit',compact('venue'));
    }


    public function update(Request $request, $id)
{
 
    $request->validate([
        'venue_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'category' => 'required|in:conference,party,wedding', // Validate category
    ]);

    
    $venue = Venue::findOrFail($id);
    $venue->venue_name = $request->venue_name;
    $venue->location = $request->location;
    $venue->category = $request->category;  
    $venue->save();

    
    return redirect()->route('venues.index')->with('success', 'Venue updated successfully');
}

}





 



