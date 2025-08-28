<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.index', compact('countries'));
    }

    public function add()
    {
        $countries = Country::all();
        return view('admin.country.add', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries,name|max:255',
            'icon' => 'required|max:1024|mimes:jpg,jpeg,pnd,webp'
        ]);

        $country = new Country();
        $country->name = $request->name;
        $country->description = $request->description;

        // Handle file upload if exists
    if ($request->hasFile('icon')) {
    $filename = time() . '_' . uniqid() . '.' . $request->icon->getClientOriginalExtension();
    $request->icon->move(public_path('assets/admin/uploads/country'), $filename);
    $country->icon = 'assets/admin/uploads/country/' . $filename; // 
}
$country->save();


        

        $notification = [
            'message' => 'Country Added Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.country.index')->with('notification', $notification);
    }
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.country.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255|unique:countries,name,' . $country->id,
            'icon' => 'nullable|max:1024|mimes:jpg,jpeg,pnd,webp'
        ]);

        $country->name = $request->name;
        $country->description = $request->description;

if ($request->hasFile('icon')) {
    // delete old icon if exists
    if ($country->icon && file_exists(public_path($country->icon))) {
        unlink(public_path($country->icon));
    }
    $imageFile = $request->file('icon');
    $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
    $imageFile->move(public_path('assets/admin/uploads/country'), $filename);
    $country->icon = 'assets/admin/uploads/country/' . $filename; // assign path
}
$country->save();

        $notification = [
            'message' => 'Country Updated Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.country.index')->with('notification', $notification);
    }

    public function delete($id)
    {
        $country = Country::findOrFail($id);

        if ($country->cities()->count() > 0) {
            $notification = array(
                'message' => 'Cannot delete country. Cities are associated with it.',
                'alert' => 'error'
            );
            return redirect()->back()->with('notification', $notification);
        }

        $country->delete();

        $notification = array(
            'message' => 'Country Deleted Successfully!',
            'alert' => 'success'
        );

        return redirect()->back()->with('notification', $notification);
    }

    public function restorePage()
    {

        $countries = Country::onlyTrashed()->get();
        return view('admin.country.restore', compact('countries'));
    }

    public function restore($id)
    {
        $country = Country::withTrashed()->find($id);
        $country->restore();

        $notification = array(
            'message' => 'Country Restored Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $country = Country::withTrashed()->find($id);

        $country->forceDelete();

        $notification = array(
            'message' => 'Country Permanently Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
    
}
