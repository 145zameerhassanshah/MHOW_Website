<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use App\Models\VolunteerType;
use App\Models\Country;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
 public function index()
    {
        $volunteers = Volunteer::with(['volunteerType', 'country'])->get();
        return view('admin.volunteer.index', compact('volunteers'));
    }

    public function add()
    {
        $types = VolunteerType::all();
        $countries = Country::all();
        return view('admin.volunteer.create', compact('types', 'countries'));
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255|string',
        'email' => 'required|max:255|email',
        'phone' => 'required|max:20 |string',
        'volunteer_type_id' => 'required|exists:volunteer_types,id',
        'country_id' => 'required|exists:countries,id',
        'status' => 'in:active,inactive',
        'image' => 'nullable|image|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('assets/admin/uploads/volunteer_images'), $filename);
        $data['image'] = 'assets/admin/uploads/volunteer_images/' . $filename;
    }

    Volunteer::create($data);

    return redirect()->route('admin.volunteer.index')->with('notification', [
        'alert' => 'success',
        'message' => 'Volunteer added Successfully!'
    ]);
}

    public function edit($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $types = VolunteerType::all();
        $countries = Country::all();
        return view('admin.volunteer.edit', compact('volunteer', 'types', 'countries'));
    }

   public function update(Request $request, $id)
{
    $volunteer = Volunteer::findOrFail($id);

    $request->validate([
        'name' => 'required|max:255|string',
        'email' => 'required|max:255|email',
        'phone' => 'required|max:20 |string',
        'volunteer_type_id' => 'required|exists:volunteer_types,id',
        'country_id' => 'required|exists:countries,id',
        'status' => 'in:active,inactive',
        'image' => 'nullable|image|max:2048'
    ]);

    $data = $request->all();

if ($request->hasFile('image')) {
    // Delete old image if it exists
            if ($volunteer->image && file_exists(public_path($volunteer->image))) {
        unlink(public_path($volunteer->image));

    }

    // Upload new image
    $imageFile = $request->file('image');
    $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
    $imageFile->move(public_path('assets/admin/uploads/volunteer_images'), $filename);
    $data['image'] = 'assets/admin/uploads/volunteer_images/' . $filename;
}

$volunteer->update($data);

    return redirect()->route('admin.volunteer.index')->with('notification', [
        'alert' => 'success',
        'message' => 'Volunteer updated Successfully!'
    ]);
}


    public function delete($id)
    {
        Volunteer::findOrFail($id)->delete();
        return redirect()->route('admin.volunteer.index')->with('notification', [
        'alert' => 'success',
        'message' => 'Volunteer deleted Successfully!'
    ]);
    }

    public function trash()
    {
        $volunteers = Volunteer::onlyTrashed()->paginate(10);
        return view('admin.volunteer.trash', compact('volunteers'));
    }

    public function restore($id)
    {
        Volunteer::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.volunteer.trash')->with('success', 'Volunteer restored successfully.');
    }

    public function forceDelete($id)
    {
        Volunteer::withTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.volunteer.trash')->with('success', 'Volunteer permanently deleted.');
    }
}
