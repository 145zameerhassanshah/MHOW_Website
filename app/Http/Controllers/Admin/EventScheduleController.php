<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{EventSchedule, Event};

class EventScheduleController extends Controller
{
    public function index($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $event_schedules = EventSchedule::where('event_id', $event->id)->orderBy('date')->orderBy('start_time')->get();
        return view('admin.event.partials.event_schedule_list', compact('event_schedules', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.event.partials.event_schedule_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order_no' => 'nullable|integer',
            'status' => 'required'
        ]);

        $event = Event::where('slug', $slug)->first();

        $event_schedule = new EventSchedule();
        $event_schedule->event_id = $event->id;
        $event_schedule->date = $request->date;
        $event_schedule->start_time = $request->start_time;
        $event_schedule->end_time = $request->end_time;
        $event_schedule->title = $request->title;
        $event_schedule->description = $request->description;
        $event_schedule->status = $request->status;
        $event_schedule->order_no = $request->order_no ?? 0;
        $event_schedule->save();

        return redirect()->route('admin.event_schedule.index', ['slug' => $event->slug])->with('notification', ['alert' => 'success', 'message' => 'Event Schedule created successfully!']);
    }

    public function edit($id)
    {
        $event_schedule = EventSchedule::findOrFail($id);
        $slug = $event_schedule->event->slug;
        return view('admin.event.partials.event_schedule_edit', compact('event_schedule', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable|after:start_time',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order_no' => 'nullable|integer',
            'status' => 'required'
        ]);

        $event = EventSchedule::findOrFail($id);
        $event->date = $request->date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->status = $request->status;
        $event->order_no = $request->order_no ?? 0;
        $event->save();

        return redirect()->route('admin.event_schedule.index', ['slug' => $event->event->slug])->with('notification', ['alert' => 'success', 'message' => 'Event Schedule updated successfully!']);
    }

    public function delete($id)
    {
        $event = EventSchedule::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Event Schedule deleted successfully!']);
    }
}
