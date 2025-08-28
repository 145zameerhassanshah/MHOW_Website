<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\FileHelper;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('toggle_id')) {
            $department = Department::find($request->toggle_id);

            if ($department) {
                $department->status = $department->status === 'active' ? 'inactive' : 'active';
                $department->save();

                $notification = [
                    'message' => 'Department status updated successfully!',
                    'alert' => 'success',
                ];

                return redirect()->route('admin.department.index')->with('notification', $notification);
            }

            $notification = [
                'message' => 'Department not found!',
                'alert' => 'error',
            ];

            return redirect()->route('admin.department.index')->with('notification', $notification);
        }

        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }

    public function add()
    {
        return view('admin.department.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:departments,name',
            'slug' => 'required|max:255|unique:departments,slug',
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|max:2048|mimes:jpg,jpeg,webp,png'
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->slug = $request->slug;
        $department->description = $request->description;
        if ($request->hasFile('icon')) {
            $iconFile = $request->file('icon');
            $filename = time() . '_' . uniqid() . '.' . $iconFile->getClientOriginalExtension();
            $iconFile->move(public_path('assets/uploads/department/icons'), $filename);
            $department->icon = 'assets/uploads/department/icons/' . $filename;
        }
        $department->status = $request->status;
        $department->created_by = auth()->id();
        $department->save();

        $notification = array(
            'message' => 'Department Created Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.department.index')->with('notification', $notification);
    }


    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $request->validate([
            'name' => 'required|max:255|unique:departments,name,' . $department->id,
            'slug' => 'required|max:255|unique:departments,slug,' . $department->id,
            'status' => 'required|in:active,inactive',
            'icon' => 'nullable|max:2048|mimes:jpg,jpeg,png,webp'
        ]);
        $department->name = $request->name;
        $department->slug = $request->slug;
        $department->description = $request->description;

        if ($request->hasFile('icon')) {
            // Delete old icon if it exists
            if ($department->icon && file_exists(public_path($department->icon))) {
                unlink(public_path($department->icon));
            }

            // Upload new icon
            $iconFile = $request->file('icon');
            $filename = time() . '_' . uniqid() . '.' . $iconFile->getClientOriginalExtension();
            $iconFile->move(public_path('assets/uploads/department/icons'), $filename);
            $department->icon = 'assets/uploads/department/icons/' . $filename;
        }
        $department->status = $request->status;
        $department->updated_by = auth()->id();
        $department->save();

        $notification = array(
            'message' => 'Department Updated Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.department.index')->with('notification', $notification);
    }
    public function toggleStatus($id)
    {
        $department = Department::findOrFail($id);
        $department->status = $department->status === 'active' ? 'inactive' : 'active';
        $department->save();

        return response()->json(['status' => $department->status]);
    }

    public function delete($id)
    {
        $department = Department::find($id);
        $department->deleted_by = auth()->id();
        $department->save();
        $department->delete();

        $notification = array(
            'message' => 'Department Deleted Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('admin.department.index')->with('notification', $notification);
    }
    public function search(Request $request)
    {
        $query = Department::query();

        if ($request->filled('department_name')) {
            $query->where('name', $request->department_name);
        }

        if ($request->filled('department_slug')) {
            $query->where('slug', $request->department_slug);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $departments = $query->with('createdBy')->get();

        $html = view('admin.department.table', compact('departments'))->render();

        return response()->json(['html' => $html]);
    }

    public function restorePage()
    {

        $departments = Department::onlyTrashed()->get();
        return view('admin.department.restore', compact('departments'));
    }

    public function restore($id)
    {
        $department = Department::withTrashed()->find($id);
        $department->restore();

        $notification = array(
            'message' => 'Department Restored Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $department = Department::withTrashed()->find($id);

        $department->forceDelete();

        $notification = array(
            'message' => 'Department Permanently Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
