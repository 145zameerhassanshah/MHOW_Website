<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Group, Page};
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $testimonials = Testimonial::where('page_id', $page->id)->orderBy('order_no')->get();
        return view('admin.page.partials.testimonial_list', compact('testimonials', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.page.partials.testimonial_add', compact("slug"));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'order_no' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'image' => 'required|image|max:2048',
        ]);

        $page = Page::where('slug', $slug)->first();

        $testimonial = new Testimonial();
        $testimonial->page_id = $page->id;
        $testimonial->name = $request->name;
        $testimonial->feedback = $request->feedback;
        $testimonial->designation = $request->designation;
        $testimonial->order_no = $request->order_no ?? 0;
        $testimonial->status = $request->status;

        // ✅ Save image before saving record
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('assets/admin/uploads/testimonial/'), $imageName);
            $testimonial->image = 'assets/admin/uploads/testimonial/' . $imageName;
        }

        $testimonial->save(); // ✅ Now the image will be saved with it

        return redirect()->route('admin.testimonial.index', ['slug' => $page->slug])
            ->with('notification', ['alert' => 'success', 'message' => 'Testimonial added Successfully!']);
    }
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $slug = $testimonial->page->slug;
        return view('admin.page.partials.testimonial_edit', compact('testimonial', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'feedback' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'order_no' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|max:2048',
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->feedback = $request->feedback;
        $testimonial->designation = $request->designation;
        $testimonial->order_no = $request->order_no;
        $testimonial->status = $request->status;
        $testimonial->save();
        if ($request->hasFile('image')) {
            @unlink($testimonial->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = time() . rand() . '.' . $extension;
            $file->move('assets/admin/uploads/testimonial/', $image);
            $testimonial->image = 'assets/admin/uploads/testimonial/' . $image;
        }


        return redirect()->route('admin.testimonial.index', ['slug' => $testimonial->page->slug])->with('notification', ['alert' => 'success', 'message' => 'Testimonial updated Successfully!']);
    }

    // Delete the specified testimonial
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        @unlink($testimonial->image);
        $testimonial->delete();
        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Testimonial deleted Successfully!']);
    }
}
