<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    //

     public function index()
    {
        $events = Event::latest('event_date')->get();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'venue' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        // if ($request->hasFile('image')) {
        //     $validated['image'] = $request->file('image')
        //         ->store('events', 'public');
        // }

if ($request->hasFile('image')) {

    // Set upload folder
    $imagePath = public_path('frontend/assets/event');

    // Create folder if it doesn't exist
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Generate a unique filename
    $filename = 'event_' . uniqid() . '.' .
        $request->file('image')->getClientOriginalExtension();

    // Upload image
    $request->file('image')->move($imagePath, $filename);

    // Save filename in database
    $validated['image'] = $filename;
}



        $validated['status'] = $request->has('status') ? 1 : 0;

        Event::create($validated);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function show(string $id)
    {
        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event'));
    }

    public function showEditForm(string $id)
    {
        $event = Event::findOrFail($id);

        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'venue' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|boolean',
        ]);

        // if ($request->hasFile('image')) {

        //     if ($event->image) {
        //         Storage::disk('public')->delete($event->image);
        //     }

        //     $validated['image'] = $request->file('image')
        //         ->store('events', 'public');
        // }



if ($request->hasFile('image')) {

    // Set upload folder
    $imagePath = public_path('frontend/assets/event');

    // Create folder if it doesn't exist
    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Delete old image if it exists
    if ($event->image) {
        $oldImage = $imagePath . '/' . basename($event->image);

        if (is_file($oldImage)) {
            unlink($oldImage);
        }
    }

    // Generate a unique filename
    $filename = 'event_' . uniqid() . '.' .
        $request->file('image')->getClientOriginalExtension();

    // Upload new image
    $request->file('image')->move($imagePath, $filename);

    // Save filename in database
    $validated['image'] = $filename;
}



        $validated['status'] = $request->has('status') ? 1 : 0;

        $event->update($validated);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
