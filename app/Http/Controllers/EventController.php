<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
class EventController extends Controller
{
    public function event()
    {
        
        $events = Event::all();
        return view('Events.index', compact('events'));
    }

    public function create()
    {
        return view('Events.create');
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required',  
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time; 
        $event->location = $request->location;

       
        if ($request->hasFile('image')) {
           
            $imageName = time() . '.' . $request->image->extension();
          
            $request->image->move(public_path('dist/assets/img'), $imageName);
             
            $event->image_url = 'dist/assets/img/' . $imageName;
        }

      
        $event->save();

       
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function destroy($id){

        $events = Event::findOrFail($id);
        $events->delete();
        return redirect()->route('events.index')->with('success', 'event deleted successfully');
    }

    public function edit($id)
{
    
    $events = Event::findOrFail($id);

   
    return view('Events.edit', compact('events'));
  }

  public function update(Request $request, $id){
  
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'event_date' => 'required|date',
        'event_time' => 'required',
        'location' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
    ]);

  
    $event = Event::findOrFail($id);

   
    $event->title = $request->title;
    $event->description = $request->description;
    $event->event_date = $request->event_date;
    $event->event_time = $request->event_time;
    $event->location = $request->location;

 
    if ($request->hasFile('image')) {
       
        if ($event->image_url && file_exists(public_path($event->image_url))) {
            unlink(public_path($event->image_url));
        }

    
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('dist/assets/img'), $imageName);
        
   
        $event->image_url = 'dist/assets/img/' . $imageName;
    }

  
    $event->save();

  
    return redirect()->route('events.index')->with('success', 'Event updated successfully.');
}

public function delete(){
    $event=Event::whereDate('event_date','>',Carbon::today())->get();
  
}
}

  

    

