<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partner.index', compact('partners'));
    }

    public function add()
    {

        return view('admin.partner.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'order_no' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        $partner = new Partner();

        $partner->title = $request->title;
        $partner->order_no = $request->order_no;
        $partner->status = $request->status;


        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/partner/', $image);

            $partner->image = $image;
        }

        $partner->save();

        $notification = array(
            'message' => 'Partner Added Successfully!',
            'alert' => 'success',
        );


        return redirect()->route('admin.partner.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partner.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'order_no' => 'required',
            'status' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',

        ]);

        $partner = Partner::find($id);
        $partner->title = $request->title;
        $partner->order_no = $request->order_no;
        $partner->status = $request->status;

        if ($request->hasFile('image')) {

            @unlink('assets/admin/uploads/partner/' . $partner->image);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/partner/', $image);

            $partner->image = $image;
        }

        $partner->save();

        $notification = array(
            'message' => 'Partner Updated Successfully!',
            'alert' => 'success',
        );


        return redirect()->route('admin.partner.index')->with('notification', $notification);
    }

    public function delete($id)
    {
        $partner = Partner::find($id);

        @unlink('assets/admin/uploads/partner/' . $partner->image);

        $partner->delete();

        $notification = array(
            'message' => 'Partner Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

}
