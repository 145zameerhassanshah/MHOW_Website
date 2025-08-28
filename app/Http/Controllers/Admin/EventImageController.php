<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventImage;
use App\Models\Event;
class EventImageController extends Controller
{
    public function index($slug)
{
    $event = Event::where('slug', $slug)->firstOrFail();
    $event_images = EventImage::orderBy('order_no')->get();
    return view('admin.event.partials.event_image_list', compact('event_images', 'slug'));
}

public function add($slug)
{
    return view('admin.event.partials.event_image_add', compact('slug'));
}

public function store(Request $request, $slug)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'order_no' => 'required|integer',
        'status' => 'required|boolean',
    ]);

    $event = Event::where('slug', $slug)->firstOrFail();

    // Handle image upload
    $imagePath = $request->file('image')->store('event_images', 'public');

    $event_image = new EventImage();
    $event_image->event_id = $event->id;
    $event_image->title = $request->title;
    $event_image->image = 'storage/' . $imagePath;
    $event_image->order_no = $request->order_no ?? 0;
    $event_image->status = $request->status;
    $event_image->save();

    return redirect()->route('admin.event_image.index', ['slug' => $event->slug])
        ->with('notification', [
            'alert' => 'success', 
            'message' => 'Event Image added successfully!'
        ]);
}

public function edit($id)
{
    $event_image = EventImage::findOrFail($id);
    $slug = $event_image->event->slug;
    return view('admin.event.partials.event_image_edit', compact('event_image', 'slug'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'order_no' => 'required|integer',
        'status' => 'required|boolean',
    ]);

    $event_image = EventImage::findOrFail($id);

    // Update image if new one is provided
    if ($request->hasFile('image')) {
        // Delete old image
        if (file_exists(public_path($event_image->image))) {
            unlink(public_path($event_image->image));
        }
        
        $imagePath = $request->file('image')->store('event_images', 'public');
        $event_image->image = 'storage/' . $imagePath;
    }

    $event_image->title = $request->title;
    $event_image->order_no = $request->order_no ?? 0;
    $event_image->status = $request->status;
    $event_image->save();

    return redirect()->route('admin.event_image.index', ['slug' => $event_image->event->slug])
        ->with('notification', [
            'alert' => 'success', 
            'message' => 'Event Image updated successfully!'
        ]);
}

public function delete($id)
{
    $event_image = EventImage::findOrFail($id);
    
    // Delete the image file
    if (file_exists(public_path($event_image->image))) {
        unlink(public_path($event_image->image));
    }
    
    $event_image->delete();

    return redirect()->back()
        ->with('notification', [
            'alert' => 'success', 
            'message' => 'Event Image deleted successfully!'
        ]);
}
}
