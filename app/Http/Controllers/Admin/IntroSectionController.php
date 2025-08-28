<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\IntroductionSection;

class IntroSectionController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $intro_sections = IntroductionSection::where('page_id', $page->id)->get();
        return view('admin.page.partials.introduction_section_list', compact('slug', 'intro_sections'));
    }

    public function list($id)
    {
        $intro_sections = IntroductionSection::where('group_id', $id)->get();
        return view('admin.intro_section.list', compact('intro_sections', 'id'));
    }

    public function add($slug)
    {
        return view('admin.page.partials.introduction_section_add', compact('slug'));
    }

    // Store Feature
    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:250',
            'subtitle' => 'nullable|max:250',
            'description' => 'nullable|max:250',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|max:2048|mimes:jpg,jpeg,png,webp',
            'icon' => 'nullable|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        $page = Page::where('slug', $slug)->first();
        $intro_section = new IntroductionSection();
        $intro_section->page_id = $page->id;
        $intro_section->title = $request->title;
        $intro_section->subtitle = $request->subtitle;
        $intro_section->description = $request->description;
        $intro_section->status = $request->status;
        if ($request->hasFile('image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/introduction_section'), $filename);
            $imagePath = 'uploads/introduction_section/' . $filename;
            $intro_section->images = $imagePath;
        }
        if ($request->hasFile('icon')) {
            $filename = time() . '_' . uniqid() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move(public_path('uploads/introduction_section'), $filename);
            $iconPath = 'uploads/introduction_section/' . $filename;
            $intro_section->icon = $iconPath;
        }
        $intro_section->save();

        return redirect()->route('admin.introduction_section.index', ['slug' => $slug])->with('notification', ['alert' => 'success', 'message' => 'Introduction Section added Successfully!']);
    }

    // IntroductionSection Delete
    public function delete($id)
    {
        $intro_section = IntroductionSection::find($id);
        // Decode images JSON to array
        if ($intro_section->images && file_exists(public_path($intro_section->images))) {
            unlink(public_path($intro_section->images));
        }
        if ($intro_section->icon && file_exists(public_path($intro_section->icon))) {
            unlink(public_path($intro_section->icon));
        }
        $intro_section->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Introduction Section deleted Successfully!']);
    }

    // IntroductionSection Edit
    public function edit($id)
    {
        $intro_section = IntroductionSection::find($id);
        // Decode images JSON to array
        $slug = $intro_section->page->slug;
        return view('admin.page.partials.introduction_section_edit', compact('intro_section', 'slug'));
    }


    // Update IntroductionSection
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:250',
            'subtitle' => 'nullable|max:250',
            'description' => 'nullable|max:250',
            'status' => 'nullable|in:active,inactive',
            'image' => 'nullable|max:2048|mimes:jpg,jpeg,png,webp',
            'icon' => 'nullable|max:2048|mimes:jpg,jpeg,png,webp',
        ]);
        $intro_section = IntroductionSection::findOrFail($id);
        $intro_section->title = $request->title;
        $intro_section->subtitle = $request->subtitle;
        $intro_section->description = $request->description;
        $intro_section->status = $request->status;
        if ($request->hasFile('image')) {
            unlink(public_path($intro_section->images));
            $filename = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/introduction_section'), $filename);
            $imagePath = 'uploads/introduction_section/' . $filename;
            $intro_section->images = $imagePath;
        }
        if ($request->hasFile('icon')) {
            unlink(public_path($intro_section->icon));
            $filename = time() . '_' . uniqid() . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move(public_path('uploads/introduction_section'), $filename);
            $iconPath = 'uploads/introduction_section/' . $filename;
            $intro_section->icon = $iconPath;
        }
        $intro_section->save();

        return redirect()->route('admin.introduction_section.index', ['slug' => $intro_section->page->slug])->with('notification', ['alert' => 'success', 'message' => 'Introduction Section updated Successfully!']);
    }
}
