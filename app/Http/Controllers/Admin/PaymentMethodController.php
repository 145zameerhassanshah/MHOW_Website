<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $methods = PaymentMethod::all();
        return view('admin.payment-method.index', compact('methods'));
    }

    public function add()
    {
        return view('admin.payment-method.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:payment_methods,name'
        ]);

        $method = new PaymentMethod();
        $method->name = $request->name;
        $method->created_by = auth()->id();
        $method->save();

        $notification = array(
            'message' => 'Payment Method Created Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('payment.method.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $payment = PaymentMethod::find($id);
        return view('admin.payment-method.edit', compact('payment'));
    }
    


    public function update(Request $request, $id)
    {
        $method = PaymentMethod::find($id);

        $request->validate([
            'name' => 'required|unique:payment_methods,name,' . $method->id,
        ]);

        $method->name = $request->name;
        $method->updated_by = auth()->id();
        $method->save();

        $notification = array(
            'message' => 'Payment Method Updated Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('payment.method.index')->with('notification', $notification);
    }

    public function delete($id)
    {
        $method = PaymentMethod::find($id);
        $method->deleted_by = auth()->id();
        $method->save();
        $method->delete();

        $notification = array(
            'message' => 'Payment Method Deleted Successfully!',
            'alert' => 'success'
        );

        return redirect()->route('payment.method.index')->with('notification', $notification);
    }

    public function restorePage()
    {

        $methods = PaymentMethod::onlyTrashed()->get();
        return view('admin.payment-method.restore', compact('methods'));
    }

    public function restore($id)
    {
        $method = PaymentMethod::withTrashed()->find($id);
        $method->restore();

        $notification = array(
            'message' => 'Payment Method Restored Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }

    public function forceDelete($id)
    {
        $method = PaymentMethod::withTrashed()->find($id);

        $method->forceDelete();

        $notification = array(
            'message' => 'Payment Method Permanently Deleted Successfully!',
            'alert' => 'success',
        );

        return back()->with('notification', $notification);
    }
}
