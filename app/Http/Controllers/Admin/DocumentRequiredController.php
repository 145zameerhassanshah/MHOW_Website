<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentRequired;
use App\Models\{Group, Page};
use Illuminate\Http\Request;

class DocumentRequiredController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $documents = DocumentRequired::where('page_id', $page->id)->orderBy('order_no')->get();

        return view('admin.page.partials.document_required_list', compact('documents', 'slug'));
    }


    public function list($id)
    {
        $documentRequireds = DocumentRequired::where('group_id', $id)->get();
        return view('admin.document-required.list', compact('documentRequireds', 'id'));
    }
    public function add($slug)
    {
        return view('admin.page.partials.document_required_add', compact('slug'));
    }

    public function store(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'order_no' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $page = Page::where('slug', $slug)->first();
        $document = new DocumentRequired();
        $document->page_id = $page->id;
        $document->title = $request->title;
        $document->description= $request->description;
        if ($request->hasFile('icon')) {
            $iconName = time() . '.' . $request->file('icon')->extension();
            $request->file('icon')->move(public_path('assets/admin/uploads/document/'), $iconName);
            $document->icon = 'assets/admin/uploads/document/' . $iconName;
        }
        $document->order_no = $request->order_no ?? 0;
        $document->status = $request->status;
        $document->save();
        
        return redirect()->route('admin.document-required.index', ['slug' => $slug])->with('notification', ['alert' => 'success', 'message' => 'Document Required added Successfully!']);
    }

    public function edit($id)
    {
        $document = DocumentRequired::findOrFail($id);
        $slug = $document->page->slug;
        return view('admin.page.partials.document_required_edit', compact('document', 'slug'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'order_no' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $document = DocumentRequired::findOrFail($id);
        $document->title = $request->title;
        $document->description= $request->description;
        if ($request->hasFile('icon')) {
            if ($document->icon) {
                @unlink(public_path($document->icon));
            }
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $icon = time() . rand() . '.' . $extension;
            $file->move(public_path('assets/admin/uploads/document/'), $icon);
            $document->icon = 'assets/admin/uploads/document/' . $icon;
        }
        $document->order_no = $request->order_no ?? 0;
        $document->status = $request->status;
        $document->save();
        
        return redirect()->route('admin.document-required.index', ['slug' => $document->page->slug])->with('notification', ['alert' => 'success', 'message' => 'Document Required updated Successfully!']);
    }

    public function delete($id)
    {
        $document = DocumentRequired::findOrFail($id);

        if ($document->icon) {
            @unlink(public_path($document->icon));
        }

        $document->delete();

        return redirect()->back()->with('notificaion', ['alert' => 'success', 'message' => 'Document Required deleted Successfully!']);
    }

}
