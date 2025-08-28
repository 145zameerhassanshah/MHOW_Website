<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Group, Page};
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
   

    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $hero_sections = HeroSection::where('page_id', $page->id)->get();
        return view('admin.page.partials.hero_section_list', compact('hero_sections', 'slug'));
    }

    public function add($slug)
    {
        return view('admin.page.partials.hero_section_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
            'subtitle' => 'nullable|max:255',
            'designation' => 'nullable|max:255',
            'background_image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $page = Page::where('slug', $slug)->first();
        $hero_section = new HeroSection();
        $hero_section->page_id = $page->id;
        $hero_section->title = $request->title;
        $hero_section->subtitle = $request->subtitle;
        $hero_section->description = $request->description;
        $hero_section->status = $request->status;

          if ($request->hasFile('background_image')) {
            $filename = time() . '_' . uniqid() . '.' . $request->background_image->getClientOriginalExtension();
            $request->background_image->move(public_path('uploads/background_image'), $filename);
            $imagePath = 'uploads/background_image/' . $filename;
            $hero_section->background_image= $imagePath;
        }

        // if ($request->hasFile('background_image')) {
        //     $imageName = time() . '.' . $request->file('background_image')->extension();
        //     $request->file('background_image')->move(public_path('uploads/hero_section/'), $imageName);
        //     $hero_section->background_image = 'uploads/hero_section/' . $imageName;
        // }

        $hero_section->save();

        return redirect()->route('admin.hero_section.index', ['slug' => $page->slug])
            ->with('notification', ['alert' => 'success', 'message' => 'Hero Section added Successfully!']);
    }

    public function edit($id)
    {
        $hero_section = HeroSection::find($id);
        $slug = $hero_section->page->slug;
        return view('admin.page.partials.hero_section_edit', compact('hero_section', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'status' => 'required',
            'subtitle' => 'nullable|max:255',
            'designation' => 'nullable|max:255',
            'background_image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $hero_section = HeroSection::find($id);
        $hero_section->title = $request->title;
        $hero_section->subtitle = $request->subtitle;
        $hero_section->description = $request->description;
        $hero_section->status = $request->status;

        if ($request->hasFile('background_image')) {
            $imagePath = public_path($hero_section->background_image);
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
            $image = $request->file('background_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/hero_section'), $filename);
            $hero_section->background_image = 'uploads/hero_section/' . $filename;
        }

        $hero_section->save();

        return redirect()->route('admin.hero_section.index', ['slug' => $hero_section->page->slug])
            ->with('notification', ['alert' => 'success', 'message' => 'Hero Section updated Successfully!']);
    }

    public function delete($id)
    {
        $hero_section = HeroSection::find($id);
        $imagePath = public_path($hero_section->background_image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
        }
        $hero_section->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Hero Section deleted Successfully!']);
    }
}
