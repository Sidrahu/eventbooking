<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function index (){
        $contacts = Contact::all();

        return view('contact us.index',compact('contacts'));
    }

    public function show($id){

        $contact = Contact::findOrFail($id);
        $contact->formatted_created_at = Carbon::parse($contact->created_at)->format('d M Y, H:i');
        return view ('contact us.show',compact('contact'));
    }
}
