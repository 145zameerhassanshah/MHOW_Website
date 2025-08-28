<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhyChooseUsController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $whyUs = WhyChooseUs::where('page_id', $page->id)->get();
        return view('admin.page.partials.why_choose_us_list', compact('whyUs', 'slug'));
    }

    public function getByPageId($pageId)
    {
        if (!is_numeric($pageId)) {
            return response()->json(['error' => 'Invalid page ID'], 400);
        }

        $whyChooseUs = WhyChooseUs::where('page_id', $pageId)->orderBy('id', 'DESC')->get();
        return response()->json(['data' => $whyChooseUs]);
    }

    public function add($slug)
    {
        return view('admin.page.partials.why_choose_us_add', compact('slug'));
    }

    // Store Why Choose Us
    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'icon' => 'required|string',
            'order_no' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $page = Page::where('slug', $slug)->first();

        $why_choose_us = new WhyChooseUs();
        $why_choose_us->page_id = $page->id;
        $why_choose_us->title = $request->title;
        $why_choose_us->subtitle = $request->subtitle;
        $why_choose_us->description = $request->description;
        $why_choose_us->icon = $request->icon;
        $why_choose_us->order_no = $request->order_no;
        $why_choose_us->status = $request->status;
        $why_choose_us->save();

        $notification = [
            'alert' => 'success',
            'message' => 'Why Choose Us added successfully!',
        ];
        return redirect()->route('admin.why-choose-us.index', $slug)->with('notification', $notification);
    }

    // Delete Why Choose Us
    public function delete($id)
    {
        $why_choose_us = WhyChooseUs::findOrFail($id);
        $why_choose_us->delete();

        $notification = [
            'alert' => 'success',
            'message' => 'Why Choose Us deleted successfully!',
        ];
        return redirect()->back()->with('notification', $notification);
    }

    // Edit Why Choose Us
    public function edit($id)
    {
        $whyUs = WhyChooseUs::findOrFail($id);
        $slug = $whyUs->page->slug;

        return view('admin.page.partials.why_choose_us_edit', compact('slug', 'whyUs'));
    }

    // Update Why Choose Us
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'icon' => 'required|string',
            'order_no' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $why_choose_us = WhyChooseUs::findOrFail($id);
        $why_choose_us->title = $request->title;
        $why_choose_us->subtitle = $request->subtitle;
        $why_choose_us->description = $request->description;
        $why_choose_us->icon = $request->icon;
        $why_choose_us->order_no = $request->order_no;
        $why_choose_us->status = $request->status;
        $why_choose_us->save();

        $notification = [
            'alert' => 'success',
            'message' => 'Why Choose Us updated successfully!',
        ];
        return redirect()->route('admin.why-choose-us.index', $why_choose_us->page->slug)->with('notification', $notification);
    }
}
