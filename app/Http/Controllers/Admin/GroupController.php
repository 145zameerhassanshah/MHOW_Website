<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::latest()->paginate(10);
        return view('admin.group.index', compact('groups'));
    }

    public function create()
    {
        $groups = Group::latest()->get();
        return view('admin.group.create',compact('groups'));
    }

    // Store a newly created group in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:groups',
            'type' => 'required',
            'description' => 'nullable|string',
        ]);

        Group::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.group.index')->with('success', 'Group created successfully.');
    }

    // Display the specified group
    public function show($id)
    {
        $group = Group::findOrFail($id);
        return view('admin.groups.show', compact('group'));
    }

    // Show the form for editing the specified group
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('admin.groups.edit', compact('group'));
    }

    // Update the specified group in storage
    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name,' . $group->id,
            'type' => 'required|in:hero,intro_section,features,faq,why_choose_us,testimonials,documents_required,procedure,cta',
            'description' => 'nullable|string',
        ]);

        $group->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.group.index')->with('success', 'Group updated successfully.');
    }

    // Remove the specified group from storage
    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('admin.group.index')->with('success', 'Group deleted successfully.');
    }

}
