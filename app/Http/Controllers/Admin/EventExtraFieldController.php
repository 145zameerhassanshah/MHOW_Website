<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventExtraField;

class EventExtraFieldController extends Controller
{
    public function index($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $extraFields = EventExtraField::where('event_id', $event->id)->orderBy('order_no')->get();

        return view('admin.event.partials.event_extra_field_list', compact('extraFields', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.event.partials.event_extra_field_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'field_name' => 'required|string|max:255',
            'field_label' => 'required|string|max:255',
            'field_type' => 'required|in:text,textarea,select,number',
            'field_options' => 'nullable|string',
            'placeholder' => 'nullable|string|max:255',
            'is_required' => 'nullable|boolean',
            'order_no' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $event = Event::where('slug', $slug)->firstOrFail();

        $extraField = new EventExtraField();
        $extraField->event_id = $event->id;
        $extraField->field_name = $request->field_name;
        $extraField->field_label = $request->field_label;
        $extraField->field_type = $request->field_type;
        $extraField->field_options = $request->field_options;
        $extraField->placeholder = $request->placeholder;
        $extraField->is_required = $request->is_required;
        $extraField->order_no = $request->order_no ?? 0;
        $extraField->status = $request->status ?? true;
        $extraField->save();

        return redirect()->route('admin.event_extra_field.index', ['slug' => $slug])
            ->with('notification', ['alert' => 'success', 'message' => 'Event Extra Field created successfully!']);
    }

    public function edit($id)
    {
        $event_extra_field = EventExtraField::findOrFail($id);
        $slug = $event_extra_field->event->slug;

        return view('admin.event.partials.event_extra_field_edit', compact('event_extra_field', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'field_name' => 'required|string|max:255',
            'field_label' => 'required|string|max:255',
            'field_type' => 'required|in:text,textarea,select,number',
            'field_options' => 'nullable|string',
            'placeholder' => 'nullable|string|max:255',
            'is_required' => 'nullable|boolean',
            'order_no' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $extraField = EventExtraField::findOrFail($id);
        $extraField->field_name = $request->field_name;
        $extraField->field_label = $request->field_label;
        $extraField->field_type = $request->field_type;
        $extraField->field_options = $request->field_options;
        $extraField->placeholder = $request->placeholder;
        $extraField->is_required = $request->is_required;
        $extraField->order_no = $request->order_no ?? 0;
        $extraField->status = $request->status ?? true;
        $extraField->save();

        return redirect()->route('admin.event_extra_field.index', ['slug' => $extraField->event->slug])
            ->with('notification', ['alert' => 'success', 'message' => 'Event Extra Field updated successfully!']);
    }

    public function delete($id)
    {
        $extraField = EventExtraField::findOrFail($id);
        $extraField->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Event Extra Field deleted successfully!']);
    }
}
