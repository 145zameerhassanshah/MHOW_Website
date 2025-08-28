<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Event;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::limit(50)->get();
        $events = Event::all();
        return view('admin.booking.index', compact('bookings', 'events'));
    }

    public function detail($id)
    {
        $booking = Booking::find($id);
        return view('admin.booking.detail', compact('booking'));
    }

    public function delete($id)
    {
        $booking = Booking::find($id);
        $booking->bookingFieldValues()->delete();
        $booking->delete();

        $notification = array(
            'message' => 'Booking Deleted Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.booking.index')->with('notification', $notification);
    }

    public function search(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('event_id')) {
            $query->where('event_id', $request->event_id);
        }

        if ($request->filled('event_type')) {
            $query->where('event_type', $request->event_type);
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $bookings = $query->get();

        $html = view('admin.booking.table', compact('bookings'))->render();

        return response()->json(['html' => $html]);
    }

    public function eventWiseBookings($slug)
    {
        $events = Event::select('id', 'title')->get();
        $event_id = Event::where('slug', $slug)->first()->id;
        $bookings = Booking::where('event_id', $event_id)->with('event')->select('id', 'event_id', 'schedule_title', 'name', 'email', 'phone_no')->get();
        return view('admin.booking.index', compact('bookings', 'event_id', 'events'));
    }

}
