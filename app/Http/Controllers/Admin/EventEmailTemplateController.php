<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Event, EventEmailTemplate};

class EventEmailTemplateController extends Controller
{
    public function index($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $event_email_templates = EventEmailTemplate::orderBy('created_at')->where('event_id', $event->id)->get();
        return view('admin.event.partials.event_email_list', compact('event_email_templates', 'slug'));
    }
    
    public function add($slug)
    {
        return view('admin.event.partials.event_email_add', compact( 'slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subject' => 'required|max:255',
            'body' => 'required',
            'status' => 'required',
            'send_timing' => 'required'
        ]);

        $event_id = Event::where('slug', $slug)->first()->id;

        $email_template = new EventEmailTemplate();
        $email_template->event_id = $event_id;
        $email_template->title = $request->title;
        $email_template->subject = $request->subject;
        $email_template->body = $request->body;
        $email_template->status = $request->status;
        $email_template->send_timing = $request->send_timing;
        $email_template->updated_by = Auth::id();
        $email_template->save();

        return redirect()->route('admin.event.template.index', ['slug' => $slug])->with('notification', ['alert' => 'success', 'message' => 'Event Schedule updated successfully!']);
    }

    public function edit($id)
    {
        $email_template = EventEmailTemplate::find($id);
        $slug = $email_template->event->slug;
        return view('admin.event.partials.event_email_edit', compact('email_template', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subject' => 'required|max:255',
            'body' => 'required',
            'status' => 'required',
            'send_timing' => 'required'

        ]);

        $email_template = EventEmailTemplate::findOrFail($id);
        $email_template->title = $request->title;
        $email_template->subject = $request->subject;
        $email_template->body = $request->body;
        $email_template->status = $request->status;
        $email_template->send_timing = $request->send_timing;
        $email_template->updated_by = Auth::id();
        $email_template->save();

        return redirect()->route('admin.event.template.index', ['slug' => $email_template->event->slug])->with('notification', ['alert' => 'success', 'message' => 'Event Schedule updated successfully!']);
    }
    
    public function delete($id)
    {
        $event = EventEmailTemplate::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Event Email Template deleted successfully!']);
    }
}
