<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReferralSource;
use Illuminate\Http\Request;

class ReferralSourceController extends Controller
{
    // List all referral sources
    public function index()
    {
        $referralsource = ReferralSource::all();
        return view('admin.refferal_source.index', compact('referralsource'));
    }

    // Show add form
    public function add()
    {
        return view('admin.refferal_source.add');
    }

    // Store new referral source
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'order_no' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $referralsource = new ReferralSource();
        $referralsource->title = $request->title;
        $referralsource->order_no = $request->order_no ?? 0;
        $referralsource->status = $request->status;
        $referralsource->save();

        return redirect()->route('admin.referralsource.index')->with('success', 'Referral source created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $referralSource = ReferralSource::findOrFail($id);
        return view('admin.refferal_source.edit', compact('referralSource'));
    }

    // Update referral source
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'order_no' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $referralSource = ReferralSource::findOrFail($id);
        $referralSource->title = $request->title;
        $referralSource->order_no = $request->order_no ?? 0;
        $referralSource->status = $request->status;
        $referralSource->save();

        return redirect()->route('admin.referralsource.index')->with('success', 'Referral source updated successfully.');
    }
    // Delete referral source
    public function delete($id)
    {
        $referralSource = ReferralSource::findOrFail($id);
        $referralSource->delete();

        return redirect()->route('admin.referralsource.index')->with('success', 'Referral source deleted successfully.');
    }

}
