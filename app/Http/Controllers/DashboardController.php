<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Post; 

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(6);  
        $posts = Post::with('comments')->get();  
        return view('dashboard.index', compact('events', 'posts')); 
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);  
        return view('dashboard.detailpage', compact('event'));  
    }

     
}
