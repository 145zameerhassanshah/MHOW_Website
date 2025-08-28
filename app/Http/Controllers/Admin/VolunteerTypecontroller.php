<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerType;

use Illuminate\Http\Request;

class VolunteerTypecontroller extends Controller
{
    public function index()
    {
        $types = VolunteerType::all();
        return view('admin.volunteer-type.index', compact('types'));
    }

    public function add()
    {
        return view('admin.volunteer-type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order_no' => 'integer|required',
            'status' => 'in:active,inactive'
        ]);

        VolunteerType::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'order_no' => $request->order_no ?? 1,
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('admin.volunteer-type.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Volunteer Type added Successfully!'
        ]);
    }

    public function edit($id)
    {
        $type = VolunteerType::findOrFail($id);
        return view('admin.volunteer-type.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $type = VolunteerType::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order_no' => 'integer|required',
            'status' => 'in:active,inactive'
        ]);

        $type->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'order_no' => $request->order_no ?? 1,
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('admin.volunteer-type.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Volunteer Type updated Successfully!'
        ]);
    }

    public function delete($id)
    {
        VolunteerType::findOrFail($id)->delete();
        return redirect()->route('admin.volunteer-type.index')->with('success', 'notification', [
            'alert' => 'success',
            'message' => 'Volunteer Type deleted Successfully!'
        ]);
    }

    public function trash()
    {
        $types = VolunteerType::onlyTrashed()->paginate(10);
        return view('admin.volunteer-type.trash', compact('types'));
    }

    public function restore($id)
    {
        VolunteerType::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.volunteer-type.trash')->with('notification', [
            'alert' => 'success',
            'message' => 'Volunteer Type restored Successfully!'
        ]);
    }

    public function forceDelete($id)
    {
        VolunteerType::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.volunteer-type.trash')->with('notification', [
            'alert' => 'success',
            'message' => 'Volunteer Type deleted Permanently!'
        ]);
    }
}
