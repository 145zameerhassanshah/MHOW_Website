<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\FileHelper;
use Illuminate\Http\Request;
use App\Models\ProjectCategory;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $project_categories = ProjectCategory::all();
        return view('admin.project-category.index', compact('project_categories'));
    }

    public function add()
    {
        return view('admin.project-category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:project_categories,name',
            'slug' => 'required|max:255|unique:project_categories,slug',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|max:2048|mimes:jpg,jpeg,png,webp'
        ]);

        $project_category = new ProjectCategory();
        $project_category->name = $request->name;
        $project_category->slug = $request->slug;
        $project_category->description = $request->description;

        if ($request->hasFile('icon')) {
            $iconFile = $request->file('icon');
            $filename = time() . '_' . uniqid() . '.' . $iconFile->getClientOriginalExtension();
            $iconFile->move(public_path('assets/uploads/project-category/icons'), $filename);
            $project_category->icon = 'assets/uploads/project-category/icons/' . $filename;
        }

        $project_category->status = $request->status;
        $project_category->created_by = auth()->id();
        $project_category->save();

        $notification = array(
            'message' => 'Project Category Created Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.project-category.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $project_category = ProjectCategory::find($id);
        return view('admin.project-category.edit', compact('project_category'));
    }

    public function update(Request $request, $id)
    {
        $project_category = ProjectCategory::find($id);
        $request->validate([
            'name' => 'required|max:255|unique:project_categories,name,' . $project_category->id,
            'slug' => 'required|max:255|unique:project_categories,slug,' . $project_category->id,
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|max:2048|mimes:jpg,jpeg,png,webp'
        ]);
        $project_category->name = $request->name;
        $project_category->slug = $request->slug;
        $project_category->description = $request->description;
        if ($request->hasFile('icon')) {
            // Delete old icon if it exists
            if ($project_category->icon && file_exists(public_path($project_category->icon))) {
                unlink(public_path($project_category->icon));
            }

            // Upload new icon
            $iconFile = $request->file('icon');
            $filename = time() . '_' . uniqid() . '.' . $iconFile->getClientOriginalExtension();
            $iconFile->move(public_path('assets/uploads/project-category/icons'), $filename);
            $project_category->icon = 'assets/uploads/project-category/icons/' . $filename;
        }
        $project_category->status = $request->status;
        $project_category->updated_by = auth()->id();
        $project_category->save();

        $notification = array(
            'message' => 'Project Category Updated Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.project-category.index')->with('notification', $notification);
    }
    public function toggleStatus($id)
    {
        $project_category = ProjectCategory::findOrFail($id);
        $project_category->status = $project_category->status === 'active' ? 'inactive' : 'active';
        $project_category->save();

        return response()->json(['status' => $project_category->status]);
    }


    public function delete($id)
    {
        $project_category = ProjectCategory::find($id);
        $project_category->deleted_by = auth()->id();
        $project_category->save();
        $project_category->delete();

        $notification = array(
            'message' => 'Project Category Deleted Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.project-category.index')->with('notification', $notification);
    }

    public function restorePage()
    {

        $project_categories = ProjectCategory::onlyTrashed()->get();
        return view('admin.project-category.restore', compact('project_categories'));
    }

    public function restore($id)
    {
        $project_category = ProjectCategory::withTrashed()->find($id);
        $project_category->restore();

        $notification = array(
            'message' => 'Project Category Restored Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $project_category = ProjectCategory::withTrashed()->find($id);

        $project_category->forceDelete();

        $notification = array(
            'message' => 'Project Category Permanently Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
