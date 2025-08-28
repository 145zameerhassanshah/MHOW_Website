<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Group, Page};
use App\Models\WhyUsImage;
use Illuminate\Http\Request;

class WhyUsImageController extends Controller
{


    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $why_us_images = WhyUsImage::where('page_id', $page->id)->get();
        return view('admin.page.partials.why_us_images_list', compact('why_us_images', 'slug'));
    }



    public function add($slug)
    {

        return view('admin.page.partials.why_us_images_add', compact('slug'));
    }

    // Store Feature
    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'order_no' => 'required|integer',
            'status' => 'required|in:active,inactive',

        ]);
        $page = Page::where('slug', $slug)->first();
        $why_us_image = new WhyUsImage();
        $why_us_image->page_id = $page->id;
        $why_us_image->title = $request->title;
        $why_us_image->subtitle = $request->subtitle;
        $why_us_image->description = $request->description;
        $why_us_image->order_no = $request->order_no;
        $why_us_image->status = $request->status;

        if ($request->hasFile('image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/admin/uploads/why_us_image'), $filename);
            $imagePath = 'assets/admin/uploads/why_us_image/' . $filename;
            $why_us_image->image = $imagePath;

}
        $why_us_image->save();

        $notification = [
            'alert' => 'success',
            'message' => 'WhyUsImage added Successfully!'
        ];
        return redirect()->route('admin.why-us-image.index', ['slug' => $slug])->with('notification', $notification);
    }



    public function delete($id)
    {
        $why_us_image = WhyUsImage::find($id);
        if (!$why_us_image) {
            return response()->json([
                'success' => false,
                'message' => 'Image not found.'
            ], 404);
        }
        $imagePath = public_path($why_us_image->image);
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
        $why_us_image->delete();

        $notification = [
            'alert' => 'success',
            'message' => 'WhyUsImage added Successfully!'
        ];
        return redirect()->back()->with('notification', $notification);
    }


    // Feature Edit
    public function edit($id)
    {
        $whyUsImage = WhyUsImage::find($id);
        $slug = $whyUsImage->page->slug;
        return view('admin.page.partials.why_us_images_edit', compact('whyUsImage', 'slug'));

    }

    // Update Feature
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'description' => 'required',
            'image' => 'nullable',
            'order_no' => 'required',
            'status' => 'required',
        ]);
        $why_us_image = WhyUsImage::find($id);
        $why_us_image->title = $request->title;
        $why_us_image->subtitle = $request->subtitle;
        $why_us_image->description = $request->description;
        $why_us_image->order_no = $request->order_no;
        $why_us_image->status = $request->status;
        if ($request->hasFile('image')) {
            @unlink($why_us_image->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/why_us_image/', $image);
            $why_us_image->image = 'assets/admin/uploads/why_us_image/' . $image;
        }
        $why_us_image->save();


        $notification = [
            'alert' => 'success',
            'message' => 'WhyUsImage updated Successfully!'
        ];
        return redirect()->route('admin.why-us-image.index', ['slug' => $why_us_image->page->slug])->with('notification', $notification);
    }
}
