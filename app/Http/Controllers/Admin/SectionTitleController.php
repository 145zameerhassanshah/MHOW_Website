<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Group, Page};
use App\Models\SectionTitle;
use Illuminate\Http\Request;

class SectionTitleController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $section_titles = SectionTitle::where('page_id', $page->id)->get();
        return view('admin.page.partials.section_title_list', compact('section_titles', 'slug'));
    }

    public function add($slug)
    {
        $section_types = ['testimonial',
                'faq',
                'feature',
                'procedure',
                'why_choose_us',
                'document',
                'feature_image',
                'hero_section',
                'intro_section',
                'why_us_image',
                'call_to_action',
                'residency-visa',
                'element'];
        return view('admin.page.partials.section_title_add', compact('slug', 'section_types'));
    }


    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:250',
            'subtitle' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:250',
            'status' => 'required|in:active,inactive',
            'type' => 'required|string'
        ]);
        $page = Page::where('slug', $slug)->first();
        $sectionTitle = new SectionTitle();
        $sectionTitle->page_id = $page->id;
        $sectionTitle->title = $request->title;
        $sectionTitle->subtitle = $request->subtitle;
        $sectionTitle->description = $request->description;
        $sectionTitle->status = $request->status;
        $sectionTitle->type = $request->type;
        $sectionTitle->save();

        $notification = [
            'alert' => 'success',
            'message' => 'Section Title added Successfully!'
        ];
        return redirect()->route('admin.section_title.index', $slug)->with('notification', $notification);
    }


    public function edit($id)
    {
        $section_title = SectionTitle::find($id);
        $slug = $section_title->page->slug;
        $section_types = ['testimonial',
                'faq',
                'feature',
                'procedure',
                'why_choose_us',
                'document',
                'feature_image',
                'hero_section',
                'intro_section',
                'why_us_image',
                'call_to_action',
                'residency-visa',
                'element'];
                // dd($section_title);
        return view('admin.page.partials.section_title_edit', compact('section_title', 'slug', 'section_types'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:250',
            'subtitle' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:250',
            'status' => 'required|in:active,inactive',
            'type' => 'required|string'
        ]);
        $sectionTitle = SectionTitle::findOrFail($id);
         $sectionTitle->title = $request->title;
        $sectionTitle->subtitle = $request->subtitle;
        $sectionTitle->description = $request->description;
        $sectionTitle->status = $request->status;
        $sectionTitle->type = $request->type;
        $sectionTitle->save();


        $notification = [
            'alert' => 'success',
            'message' => 'Section Title updated Successfully!'
        ];
        return redirect()->route('admin.section_title.index', $sectionTitle->page->slug)->with('notification', $notification);
    }

    public function delete($id)
    {
        $sectionTitle = SectionTitle::findOrFail($id);
        $sectionTitle->delete();

        $notification = [
            'alert' => 'success',
            'message' => 'Section Title deleted Successfully!'
        ];

        return redirect()->back()->with('notification', $notification);
    }
}
