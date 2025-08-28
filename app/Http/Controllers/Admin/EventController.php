<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\EventExtraField;
use App\Models\EventEmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function eventlist()
    {
        $events = Event::all();
        return view('admin.event.list', compact('events'));
    }

    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('admin.event.detail', compact('event', 'slug'));
    }

    public function add()
    {

        return view('admin.event.add');
    }

    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->input('slug'))
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'event_type' => 'required|in:free,paid,subscription',
            'page_type' => 'required|in:lending,charity',
            'show_countries' => 'required|in:yes,no',
            'slug' => 'required|unique:events,slug|max:255',
            'description' => 'required|string',
            'order_no' => 'nullable|integer',
            'event_detail' => 'required|string',
            'status' => 'required|in:active,inactive',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'venue' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:20',
            'admin_emails' => 'required',
            'page_top_text' => 'nullable',
            'footer_text_1' => 'nullable',
            'footer_text_2' => 'nullable',
            'page_form_detail' => 'nullable',
            'marketing_emails' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'meta_image' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        $emails = array_filter(array_map('trim', explode(',', $request->input('marketing_emails'))));

        foreach ($emails as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return back()->withInput()->withErrors([
                    'marketing_emails' => 'One or more email addresses are invalid.',
                ]);
            }
        }

        $emails = array_filter(array_map('trim', explode(',', $request->input('admin_emails'))));

        foreach ($emails as $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return back()->withInput()->withErrors([
                    'admin_emails' => 'One or more email addresses are invalid.',
                ]);
            }
        }

        $event = new Event($request->except(['image', 'banner_image', 'meta_image']));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img'), $imageName);
            $event->image = 'assets/admin/img/' . $imageName;
        }

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $bannerImageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img'), $bannerImageName);
            $event->banner_image = 'assets/admin/img/' . $bannerImageName;
        }

        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $metaImageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img'), $metaImageName);
            $event->meta_image = 'assets/admin/img/' . $metaImageName;
        }

        $event->save();

        $email_template = new EventEmailTemplate();
        $email_template->title = $event->title;
        $email_template->subject = $event->title . 'Booking';
        $email_template->body = '<p><span style="\&quot;font-weight:" bolder;\"=""><b>Dear {{ name }},</b></span></p><p><br></p><p>Thank you for registering for our upcoming event with the following details.</p><p><span style="\&quot;font-weight:" bolder;\"=""><b>Date:</b></span>&nbsp;{{ start_date }}</p><p><span style="\&quot;font-weight:" bolder;\"=""><b>Time:</b></span>&nbsp;{{ start_time }}</p><p><span style="\&quot;font-weight:" bolder;\"=""><b>Event:</b></span>&nbsp;{{ schedule }}</p><p><br></p><p>The team at Wiselife Academy is excited to meet you and looks forward to hearing from you. We\'re thrilled to share a powerful presentation that explores The Puropose of Life and provides guidance on achieving true peace and fulfillment.</p>';
        $email_template->status = 'active';
        $email_template->event_id = $event->id;
        $email_template->created_by = Auth::user()->id;
        $email_template->save();

        return redirect()->route('admin.event.detail', ['slug' => $event->slug])->with('notification', [
            'message' => 'Event Added Successfully!',
            'alert' => 'success'
        ]);
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id);

        @unlink(public_path($event->image));
        @unlink(public_path($event->banner_image));

        $event->delete();

        return redirect()->route('admin.event.index')->with('notification', [
            'message' => 'Event Deleted Successfully!',
            'alert' => 'success'
        ]);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->merge([
            'slug' => Str::slug($request->input('slug'))
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'event_type' => 'required|in:free,paid,subscription',

            'page_type' => 'required|in:lending,charity',
            'show_countries' => 'required|in:yes,no',
            'slug' => 'nullable|unique:events,slug,' . $id,
            'description' => 'required|string',
            'order_no' => 'nullable|integer',
            'event_detail' => 'required|string',
            'status' => 'required|in:active,inactive',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'venue' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'contact_no' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $data = $request->except(['image', 'banner_image']);

        if ($request->hasFile('image')) {
            @unlink(public_path($event->image));
            $file = $request->file('image');
            $imageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img'), $imageName);
            $data['image'] = 'assets/admin/img/' . $imageName;
        }

        if ($request->hasFile('banner_image')) {
            @unlink(public_path($event->banner_image));
            $file = $request->file('banner_image');
            $bannerImageName = time() . rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/img'), $bannerImageName);
            $data['banner_image'] = 'assets/admin/img/' . $bannerImageName;
        }

        $event->update($data);

        return redirect()->route('admin.event.detail', ['slug' => $event->slug])->with('notification', [
            'message' => 'Event Updated Successfully!',
            'alert' => 'success'
        ]);
    }
    public function eventBooking($slug)
    {
         $event = Event::where('slug', $slug)->firstOrFail();
        $bookings = Booking::with(['event', 'bookingFieldValues.eventExtraField'])
            ->where("event_id", $event->id)
            ->get();

        // Get all unique extra fields for this event
        $extraFields = EventExtraField::where('event_id', $event->id)
            ->orderBy('order_no')
            ->get();

        return view("admin.event.booking", compact("bookings", "extraFields"));
    }
}
