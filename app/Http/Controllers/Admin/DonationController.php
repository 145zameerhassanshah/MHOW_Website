<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Donation;
use App\Models\PaymentMethod;
use App\Models\DonationSource;
use App\Models\Campaign;
use App\Models\Donor;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('donor', 'campaign', 'source', 'paymentmethod')->get();
        return view('admin.donation.index', compact('donations'));
    }

    public function add()
    {
        $donors = Donor::where('status', 'active')->get();
        $campaigns = Campaign::where('status', 'active')->get();
        $methods = PaymentMethod::all();
        $sources = DonationSource::all();
        return view('admin.donation.add', compact('methods', 'sources', 'campaigns', 'donors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_id' => 'required',
            'amount' => 'required|numeric',
            'donation_date' => 'required|date',
        ]);

        Donation::create($request->all());

        return redirect()->route('admin.donation.index')->with('success', 'Donation added successfully!');
    }

    public function edit($id)
    {
        $donation = Donation::findOrFail($id);
        $donors = Donor::where('status', 'active')->get();
        $campaigns = Campaign::where('status', 'active')->get();
        $methods = PaymentMethod::all();
        $sources = DonationSource::all();
        return view('admin.donation.edit', compact('donation', 'donors', 'campaigns', 'methods', 'sources'));
    }

    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        $donation->update([
            'donor_id' => $request->donor_id,
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'transaction_id' => $request->transaction_id,
            'receipt_no' => $request->receipt_no,
            'donation_date' => $request->donation_date,
            'message' => $request->message,
            'payment_method_id' => $request->payment_method_id,
            'donation_source_id' => $request->donation_source_id,
        ]);

        return redirect()->route('admin.donation.index')->with('success', 'Donation updated successfully!');
    }


    public function delete($id)
    {
        Donation::findOrFail($id)->delete();
        return redirect()->route('admin.donation.index')->with('success', 'Donation deleted successfully!');
    }
    public function search(Request $request)
    {
        $query = Donation::query();

        // Corrected field name and added donor name filter
        if ($request->filled('donor_name')) {
            $query->whereHas('donor', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->donor_name . '%');
            });
        }

        if ($request->filled('donation_id')) {
            $query->where('id', $request->donation_id);
        }

        if ($request->filled('campaign_title')) {
            $query->where('campaign_id', $request->campaign_title);
        }

        if ($request->filled('payment_method_id')) {
            $query->where('payment_method_id', $request->payment_method_id);
        }

        if ($request->filled('donation_source_id')) {
            $query->where('donation_source_id', $request->donation_source_id);
        }

        $donations = $query->with(['donor', 'campaign', 'paymentmethod', 'source'])
            ->latest('donation_date')
            ->get();

        $html = view('admin.donation.table', compact('donations'))->render();

        return response()->json(['html' => $html]);
    }

    public function importDonations(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new \App\Imports\DonationsImport, $request->file('file'));

        return back()->with('success', 'Donations imported successfully.');
    }
}
