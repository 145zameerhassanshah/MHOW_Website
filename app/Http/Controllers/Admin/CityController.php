<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    public function add($id)
    {
        $cities = City::where('country_id', $id)->get();
        $country = Country::find($id);
        return view('admin.city.add', compact('cities', 'country'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('cities')->where(function ($query) use ($request) {
                    return $query->where('country_id', $request->country_id);
                }),
            ],
            'country_id' => 'required|exists:countries,id',
        ]);

        City::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);

        $notification = array(
            'message' => 'City Added Successfully!',
            'alert' => 'success'
        );

        return redirect()->back()->with('notification', $notification);
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.city.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('cities')
                    ->where(fn($query) => $query->where('country_id', $request->country_id))
                    ->ignore($city->id),
            ],
            'country_id' => 'required|exists:countries,id',
        ]);

        $city->update([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);

        $notification = array(
            'message' => 'City Updated Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.city.add', $request->country_id)->with('notification', $notification);
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        $notification = array(
            'message' => 'City Deleted Successfully!',
            'alert' => 'success'
        );

        return redirect()->back()->with('notification', $notification);
    }

    public function restorePage()
    {

        $cities = City::onlyTrashed()->get();
        return view('admin.city.restore', compact('cities'));
    }

    public function restore($id)
    {
        $city = City::withTrashed()->find($id);
        $city->restore();

        $notification = array(
            'message' => 'City Restored Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $city = City::withTrashed()->find($id);

        $city->forceDelete();

        $notification = array(
            'message' => 'City Permanently Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
