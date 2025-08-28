<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;

class ServiceSectionController extends Controller
{
    public function index($id)
    {
        $service = Service::find($id);
        $serviceSections = ServiceSection::where('service_id', $id)->get();
        return view('admin.service-section.index', compact('serviceSections', 'service'));
    }

    public function add($id)
    {
        $service = Service::find($id);
        return view('admin.service-section.add', compact('service'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:255',
            'subtitle.ar' => 'required|string|max:255',
            'service_id' => 'required|integer',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'order_no' => 'required|integer',
            'type' => 'required',
            'description.en' => 'required',
            'description.ar' => 'required',
        ]);

        $serviceSection = new ServiceSection();

        $serviceSection->title = $request->title;
        $serviceSection->subtitle = $request->subtitle;
        $serviceSection->service_id = $request->service_id;
        $serviceSection->order_no = $request->order_no;
        $serviceSection->type = $request->type;
        $serviceSection->description = $request->description;

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/serviceSection/thumb/', $image);

            $imgManager = new ImageManager(new Driver());

            $thumb_icon = $imgManager->read('assets/admin/uploads/serviceSection/thumb/' . $image);
            $thumb_icon->cover(600, 600);
            $thumb_icon->save(public_path('assets/admin/uploads/serviceSection/' . $image));

            @unlink('assets/admin/uploads/serviceSection/thumb/' . $image);

            $serviceSection->image = 'assets/admin/uploads/serviceSection/' . $image;
        }

        $serviceSection->save();

        $notification = array(
            'message' => 'Service Section Added Successfully!',
            'alert' => 'success',
        );

        return redirect()->route('admin.service.section.index', $serviceSection->service_id)->with('notification', $notification);
    }

    public function edit($id)
    {
        $serviceSection = ServiceSection::findOrFail($id);
        return view('admin.service-section.edit', compact('serviceSection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'subtitle.en' => 'required|string|max:255',
            'subtitle.ar' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'order_no' => 'required|integer',
            'type' => 'required',
            'description.en' => 'required',
            'description.ar' => 'required',
        ]);

        $serviceSection = ServiceSection::find($id);

        $serviceSection->title = $request->title;
        $serviceSection->subtitle = $request->subtitle;
        $serviceSection->order_no = $request->order_no;
        $serviceSection->type = $request->type;
        $serviceSection->description = $request->description;

        if ($request->hasFile('image')) {

            @unlink('assets/admin/uploads/serviceSection/' . $serviceSection->image);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/serviceSection/thumb/', $image);

            $imgManager = new ImageManager(new Driver());

            $thumb_icon = $imgManager->read('assets/admin/uploads/serviceSection/thumb/' . $image);
            $thumb_icon->cover(600, 600);
            $thumb_icon->save(public_path('assets/admin/uploads/serviceSection/' . $image));

            @unlink('assets/admin/uploads/serviceSection/thumb/' . $image);

            $serviceSection->image = 'assets/admin/uploads/serviceSection/' . $image;
        }

        $serviceSection->save();

        $notification = array(
            'message' => 'Service Section Updated Successfully!',
            'alert' => 'success',
        );

        return redirect()->route('admin.service.section.index', $serviceSection->service_id)->with('notification', $notification);
    }

    public function delete($id)
    {
        $serviceSection = ServiceSection::find($id);

        @unlink($serviceSection->image);

        $serviceSection->delete();

        $notification = array(
            'message' => 'Service Section Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
