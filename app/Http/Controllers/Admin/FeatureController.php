<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class FeatureController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $features = Feature::where('page_id', $page->id)->get();
        return view('admin.page.partials.feature_list', compact('slug', 'features'));
   }

   
    public function add($slug)
    {
        return view('admin.page.partials.feature_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'order_no' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $page = Page::where('slug', $slug)->first();
        $feature = new Feature();
        $feature->page_id = $page->id;
        $feature->title = $request->title;
        $feature->subtitle = $request->subtitle;
        $feature->description = $request->description;
        $feature->icon = $request->icon;
        $feature->order_no = $request->order_no;
        $feature->status = $request->status;
        $feature->save();

        return redirect()->route('admin.feature.index', ['slug' => $slug])->with('notification', ['alert' => 'success', 'message' => 'Feature added Successfully!']);
    }

    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        $slug = $feature->page->slug;
        return view('admin.page.partials.feature_edit', compact('feature', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'order_no' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $feature = Feature::findOrFail($id);
        $feature->title = $request->title;
        $feature->subtitle = $request->subtitle;
        $feature->description = $request->description;
        $feature->icon = $request->icon;
        $feature->order_no = $request->order_no;
        $feature->status = $request->status;
        $feature->save();

        return redirect()->route('admin.feature.index', ['slug' => $feature->page->slug])->with('notification', ['alert' => 'success', 'message' => 'Feature updated Successfully!']);
    }

    public function delete($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'Feature deleted Successfully!']);
    }
}
