<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationForm;
use App\Models\Campaign;
use Illuminate\Support\Facades\Storage;

class DonationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donationForms = DonationForm::orderBy('order_no')->paginate(10);
        return view('admin.donation-form.index', compact('donationForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $compaigns = Campaign::all();
        return view('admin.donation-form.add', compact('compaigns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'purpose' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'compaign_id' => 'required',
            'order_no' => 'nullable|integer',
            'status' => 'required|in:publish,unpublish',
            'amount' => 'required|array|min:1',
            'amount.*.title' => 'required|string|max:255',
            'amount.*.amount' => 'required|numeric',
        ];

        $validated = $request->validate($rules);

        if ($request->hasFile('image')) {

            // Upload new image
            $imageFile = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/uploads/donation-form/image'), $filename);
            $validated['image'] = 'assets/uploads/donation-form/image/' . $filename;
        }

        $model = DonationForm::create($validated);

        foreach ($validated['amount'] as $amountData) {
            $model->amounts()->create([
                'title' => $amountData['title'],
                'amount' => $amountData['amount']
            ]);
        }
        $notification = [
            'alert' => 'success',
            'message' => 'Donation Form added Successfully!'
        ];
        return redirect()->route('donation-forms.index')->with('notification', $notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $donationForm = DonationForm::with('amounts')->findOrFail($id);
        $compaigns = Campaign::all();
        return view('admin.donation-form.edit', compact('donationForm', 'compaigns'));
    }



    public function update(Request $request, DonationForm $donationForm)
    {
        // Main validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'purpose' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'compaign_id' => 'required',
            'order_no' => 'nullable|integer',
            'status' => 'required|in:publish,unpublish',
            'amount' => 'required|array|min:1',
            'amount.*.title' => 'required|string|max:255',
            'amount.*.amount' => 'required|numeric',
        ];

        $validated = $request->validate($rules);


        if ($request->hasFile('image')) {
            // Delete old icon if it exists
            if ($donationForm->image && file_exists(public_path($donationForm->image))) {
                unlink(public_path($donationForm->image));
            }

            // Upload new image
            $imageFile = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/uploads/donation-form/image'), $filename);
            $validated['image'] = 'assets/uploads/donation-form/image/' . $filename;
        }


        $donationForm->update($validated);

        $donationForm->amounts()->delete();

        // Then create new amounts
        foreach ($validated['amount'] as $amountData) {
            $donationForm->amounts()->create([
                'title' => $amountData['title'],
                'amount' => $amountData['amount']
            ]);
        }
        $notification = [
            'alert' => 'success',
            'message' => 'Donation Form Updated Successfully!'
        ];
        return redirect()->route('donation-forms.index')->with('notification', $notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donationForm = DonationForm::findOrFail($id);
        $donationForm->delete();
        $notification = [
            'alert' => 'success',
            'message' => 'Donation Form Deleted Successfully!'
        ];
        return redirect()->route('donation-forms.index')->with('notification', $notification);
    }
}
