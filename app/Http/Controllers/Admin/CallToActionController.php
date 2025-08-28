<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallToAction;
use App\Models\{Group, Page};
use Illuminate\Http\Request;

class CallToActionController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $ctas = CallToAction::where('page_id', $page->id)->orderBy('created_at', 'desc')->get();
        return view('admin.page.partials.call_to_actions_list', compact('slug', 'ctas'));
    }


    public function add($slug)
    {
        return view('admin.page.partials.call_to_action_add', compact('slug'));
    }


    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|url|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        // Create new CTA
        $page = Page::where('slug', $slug)->first();
        $cta = new CallToAction();
        $cta->page_id = $page->id;
        $cta->title = $request->title;
        $cta->subtitle = $request->subtitle;
        $cta->button_text = $request->button_text;
        $cta->button_link = $request->button_link;
        $cta->status = $request->status;
        $cta->save();

        // Return JSON response
        return redirect()->route('admin.call-to-action.index', ['slug' => $slug])->with('notification', ['alert' => 'success', 'message' => 'CallToAction added Successfully!']);
    }

    public function edit($id)
    {
        $cta = CallToAction::findOrFail($id);
        $slug = $cta->page->slug;
        return view('admin.page.partials.call_to_action_edit', compact('cta', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|url|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $cta = CallToAction::findOrFail($id);
        $cta->title = $request->title;
        $cta->subtitle = $request->subtitle;
        $cta->button_text = $request->button_text;
        $cta->button_link = $request->button_link;
        $cta->status = $request->status;
        $cta->save();

        return redirect()->route('admin.call-to-action.index', ['slug' => $cta->page->slug])->with('notification', ['alert' => 'success', 'message' => 'CallToAction updated Successfully!']);
    }

    public function delete($id)
    {
        $cta = CallToAction::findOrFail($id);
        $cta->delete();

        return redirect()->back()->with('notification', ['alert' => 'success', 'message' => 'CallToAction deleted Successfully!']);
    }
}
