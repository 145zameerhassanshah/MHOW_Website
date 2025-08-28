<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationSource;
use Illuminate\Http\Request;

class DonationSourceController extends Controller
{
    public function index()
    {
        $donationSources = DonationSource::all();
        return view('admin.donation-source.index', compact('donationSources')); 
    }


    public function add()
    {
        return view('admin.donation-source.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:donation_sources,name'
        ]);

        $donationSource = new DonationSource();
        $donationSource->name = $request->name;
        $donationSource->created_by = auth()->id();
        $donationSource->save();

        return redirect()->route('admin.donation-source.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Donation Source added Successfully!'
        ]);
    }

    public function edit($id)
{
    $source = DonationSource::findOrFail($id);  

    return view('admin.donation-source.edit', compact('source'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:donation_sources,name,' . $id
        ]);

        $donationSource = DonationSource::findOrFail($id);
        $donationSource->name = $request->name;
        $donationSource->updated_by = auth()->id();
        $donationSource->save();

        return redirect()->route('admin.donation-source.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Donation Source updated Successfully!'
        ]);
    }

    public function trash()
    {
        $sources = DonationSource::onlyTrashed()->get();
        return view('admin.donation-source.restore', compact('sources'));
    }


    public function delete($id)
    {
        $donationSource = DonationSource::findOrFail($id);
        $donationSource->deleted_by = auth()->id();
        $donationSource->delete();

        return redirect()->route('admin.donation-source.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Donation Source deleted Successfully!'
        ]);
    }

    public function restorePage()
    {
        $trashedSources = DonationSource::onlyTrashed()->get();
        return view('admin.donation-source.restore', compact('trashedSources'));
    }

    public function restore($id)
    {
        $donationSource = DonationSource::withTrashed()->findOrFail($id);
        $donationSource->restore();

        return redirect()->route('admin.donation-source.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Donation Source restored Successfully!'
        ]);
    }

    public function forceDelete($id)
    {
        $donationSource = DonationSource::withTrashed()->findOrFail($id);
        $donationSource->forceDelete();

        return redirect()->route('admin.donation-source.index')->with('notification', [
            'alert' => 'success',
            'message' => 'Donation Source deleted Permanently!'
        ]);
    }
}
