<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class EventController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('website.pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('website.pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string',
            'description' => 'required',
            'image' => ['nullable', 'required_with:image', File::image()->max(4 * 1024)]
        ]); 
        // dd($request->all());
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/event')) : null;
        // dd($image);
        Event::create([
            'event_name' => $request->event_name,
            'image' => $image,
            'description' => $request->description,
        ]);
        return redirect()->route('event.index')->with(['message' => 'Event created successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {

        return view('website.pages.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        if ($request->hasFile('image')) {
            if ($event->image) {
                $filename = substr($event->image, 17);
                Storage::delete('public/event/' . $filename);
            }
        }
        $image = $request->hasFile('image') ? Storage::url($request->image->store('public/event')) : $event->image;
        $event->update([
            'event_name' => $request->event_name,
            'image' => $image,
            'description' => $request->description,
        ]);
        return redirect()->route('event.index')->with(['message' => 'Event updated successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with(['message' => 'Event deleted successfully', 'alert-type' => 'success']);
    }
}
