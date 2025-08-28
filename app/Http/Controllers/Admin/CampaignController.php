<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\FileHelper;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $project_categories = ProjectCategory::all();
        $campaigns = Campaign::with('project')->latest()->get();
        return view('admin.campaign.index', compact('campaigns', 'projects', 'project_categories'));
    }

    public function add()
    {
        $projects = Project::all();
        return view('admin.campaign.add', compact('projects'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|unique:campaigns,title',
                'slug' => 'required|unique:campaigns,slug',
                'project_id' => 'required|exists:projects,id',
                'goal_amount' => 'nullable|numeric',
                'raised_amount' => 'nullable|numeric',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'status' => 'required|in:active,inactive',
                'icon' => 'nullable|max:255',
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        $campaign = new Campaign();
        $campaign->title = $request->title;
        $campaign->slug = $request->slug;
        $campaign->description = $request->description;
        if ($request->hasFile('icon')) {
            $campaign->icon = FileHelper::upload($request->file('icon'), 'assets/uploads/campaign/icons');
        }
        $campaign->project_id = $request->project_id;
        $campaign->goal_amount = $request->goal_amount ?? 0;
        $campaign->raised_amount = $request->raised_amount ?? 0;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;
        $campaign->status = $request->status;
        $campaign->created_by = auth()->id();
        $campaign->save();

        $notification = [
            'message' => 'Campaign Created Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.campaign.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        $projects = Project::all();
        return view('admin.campaign.edit', compact('campaign', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        try {
            $request->validate([
                'title' => 'required|unique:campaigns,title,' . $campaign->id,
                'slug' => 'required|unique:campaigns,slug,' . $campaign->id,
                'project_id' => 'required|exists:projects,id',
                'goal_amount' => 'required|numeric',
                'raised_amount' => 'nullable|numeric',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'status' => 'required|in:active,inactive',
                'icon' => 'nullable|max:255',
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        $campaign->title = $request->title;
        $campaign->slug = $request->slug ?? Str::slug($request->title);
        $campaign->description = $request->description;
        if ($request->hasFile('icon')) {
            if ($campaign->icon) {
                FileHelper::delete($campaign->icon);
            }
            $campaign->icon = FileHelper::upload($request->file('icon'), 'assets/uploads/campaign/icons');
        }
        $campaign->project_id = $request->project_id;
        $campaign->goal_amount = $request->goal_amount;
        $campaign->raised_amount = $request->raised_amount ?? 0;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;
        $campaign->status = $request->status;
        $campaign->updated_by = auth()->id();
        $campaign->save();

        $notification = [
            'message' => 'Campaign Updated Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.campaign.index')->with('notification', $notification);
    }
    public function toggleStatus($id)
    {
        $Campaign = Campaign::findOrFail($id);
        $Campaign->status = $Campaign->status === 'active' ? 'inactive' : 'active';
        $Campaign->save();
    
        return response()->json(['status' => $Campaign->status]);
    }



    public function delete($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->deleted_by = auth()->id();
        $campaign->save();
        $campaign->delete();

        $notification = [
            'message' => 'Campaign Deleted Successfully!',
            'alert' => 'success',
        ];

        return redirect()->route('admin.campaign.index')->with('notification', $notification);
    }

    public function search(Request $request)
    {
        $query = Campaign::query();

        if ($request->filled('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        if ($request->filled('campaign_slug')) {
            $query->where('slug', $request->campaign_slug);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $campaigns = $query->with('createdBy')->get();

        $html = view('admin.campaign.table', compact('campaigns'))->render();

        return response()->json(['html' => $html]);
    }
    public function restorePage()
    {

        $campaigns = Campaign::onlyTrashed()->get();
        return view('admin.campaign.restore', compact('campaigns'));
    }

    public function restore($id)
    {
        $campaign = Campaign::withTrashed()->find($id);
        $campaign->restore();

        $notification = array(
            'message' => 'Campaign Restored Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $campaign = Campaign::withTrashed()->find($id);

        $campaign->forceDelete();

        $notification = array(
            'message' => 'Campaign Permanently Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
