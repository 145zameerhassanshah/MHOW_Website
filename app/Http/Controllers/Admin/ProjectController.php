<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Department;
use App\Models\DonationForm;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('projectCategory', 'department', 'createdBy', 'updatedBy')->get();
        $categories = ProjectCategory::all();
        return view('admin.project.index', compact('projects', 'categories'));
    }

    public function add()
    {
        $project_categories = ProjectCategory::all();
        $departments = Department::all();
        $donation_forms = DonationForm::all();
        return view('admin.project.add', compact('project_categories', 'departments', 'donation_forms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:projects,name',
            'slug' => 'required|unique:projects,slug',
            'status' => 'required|in:active,inactive',
            'target_amount' => 'nullable|numeric',
            'icon' => 'required',

            'start_date' => 'nullable|date',

            'end_date' => 'nullable|date|after_or_equal:start_date',
            'department_id' => 'required|exists:departments,id',
            'project_category_id' => 'required|exists:project_categories,id',
            'donation_form_id' => 'required|exists:donation_forms,id'
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->slug = $request->slug;
        $project->description = $request->description;
        $project->target_amount = $request->target_amount;

        if ($request->hasFile('image')) {
            // Upload new image
            $imageFile = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/uploads/project/image'), $filename);
            $project->image = 'assets/uploads/project/image/' . $filename;
        }

        $project->status = $request->status;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->department_id = $request->department_id;
        $project->project_category_id = $request->project_category_id;
        $project->donation_form_id = $request->donation_form_id;
        $project->icon = $request->icon;
        $project->created_by = auth()->id();
        $project->save();

        $notification = [
            'message' => 'Project Created Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.project.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $project_categories = ProjectCategory::all();
        $departments = Department::all();
        $donation_forms = DonationForm::all();
        return view('admin.project.edit', compact('project', 'donation_forms', 'project_categories', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:projects,name,' . $project->id,
            'slug' => 'required|unique:projects,slug,' . $project->id,
            'status' => 'required|in:active,inactive',
            'target_amount' => 'nullable|numeric',
            'icon' => 'required',

            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'department_id' => 'required|exists:departments,id',
            'project_category_id' => 'required|exists:project_categories,id',
            'donation_form_id' => 'required|exists:donation_forms,id'
        ]);

        $project->name = $request->name;
        $project->slug = $request->slug;
        $project->description = $request->description;
        $project->target_amount = $request->target_amount;

        if ($request->hasFile('image')) {
            // Delete old icon if it exists
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            // Upload new image
            $imageFile = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/uploads/project/image'), $filename);
            $project->image = 'assets/uploads/project/image/' . $filename;
        }

        $project->status = $request->status;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->department_id = $request->department_id;
        $project->project_category_id = $request->project_category_id;
        $project->donation_form_id = $request->donation_form_id;
        $project->icon = $request->icon;
        $project->updated_by = auth()->id();
        $project->save();

        $notification = [
            'message' => 'Project Updated Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.project.index')->with('notification', $notification);
    }
    public function toggleStatus($id)
    {
        $Project = Project::findOrFail($id);
        $Project->status = $Project->status === 'active' ? 'inactive' : 'active';
        $Project->save();

        return response()->json(['status' => $Project->status]);
    }


    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->deleted_by = auth()->id();
        $project->save();
        $project->delete();

        $notification = [
            'message' => 'Project Deleted Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.project.index')->with('notification', $notification);
    }
    public function search(Request $request)
    {
        $query = Project::query();

        if ($request->filled('project_category')) {
            $query->where('project_category_id', $request->project_category);
        }

        if ($request->filled('project_name')) {
            $query->where('name', $request->project_name);
        }

        if ($request->filled('project_slug')) {
            $query->where('slug', $request->project_slug);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $projects = $query->with('createdBy')->get();

        $html = view('admin.project.table', compact('projects'))->render();

        return response()->json(['html' => $html]);
    }
    public function restorePage()
    {

        $projects = ProjectCategory::onlyTrashed()->get();
        return view('admin.project.restore', compact('projects'));
    }

    public function restore($id)
    {
        $project  = Project::withTrashed()->find($id);
        $project->restore();

        $notification = array(
            'message' => 'Project Restored Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $project  = Project::withTrashed()->find($id);

        $project->forceDelete();

        $notification = array(
            'message' => 'Project Permanently Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
