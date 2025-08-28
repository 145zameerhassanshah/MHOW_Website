@extends('admin.layouts.master')
@section('title', 'Edit Donation')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('admin.donation.update', $donation->id) }}" method="POST">
                @csrf
                @method('PUT')
            
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>Edit Donation</b></h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.donation.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-list"></i> Donation List
                                </a>
                            </div>
                        </div>

                        <div class="card-body py-3">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label>Donation Date</label>
                                    <input type="date" name="donation_date" value="{{ old('donation_date', $donation->donation_date) }}"
                                        class="form-control form-control-sm">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label>Select Donor</label>
                                    <select name="donor_id" class="form-control form-control-sm">
                                        @foreach ($donors as $donor)
                                            <option value="{{ $donor->id }}" {{ $donation->donor_id == $donor->id ? 'selected' : '' }}>
                                                {{ $donor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label>Amount</label>
                                    <input type="number" name="amount" value="{{ old('amount', $donation->amount) }}"
                                        class="form-control form-control-sm">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label>Select Campaign</label>
                                    <select name="campaign_id" class="form-control form-control-sm">
                                        @foreach ($campaigns as $campaign)
                                            <option value="{{ $campaign->id }}" {{ $donation->campaign_id == $campaign->id ? 'selected' : '' }}>
                                                {{ $campaign->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label>Transaction ID</label>
                                    <input type="text" name="transaction_id" value="{{ old('transaction_id', $donation->transaction_id) }}"
                                        class="form-control form-control-sm">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label>Reference No</label>
                                    <input type="text" name="receipt_no" value="{{ old('receipt_no', $donation->receipt_no) }}"
                                        class="form-control form-control-sm">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label>Select Payment Method</label>
                                    <select name="payment_method_id" class="form-control form-control-sm">
                                        @foreach ($methods as $method)
                                            <option value="{{ $method->id }}" {{ $donation->payment_method_id == $method->id ? 'selected' : '' }}>
                                                {{ $method->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label>Select Source</label>
                                    <select name="donation_source_id" class="form-control form-control-sm">
                                        @foreach ($sources as $source)
                                            <option value="{{ $source->id }}" {{ $donation->donation_source_id == $source->id ? 'selected' : '' }}>
                                                {{ $source->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label>Message</label>
                                    <textarea name="message" rows="3" class="form-control form-control-sm summernote">{{ old('message', $donation->message) }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-sm mb-1 btn-success float-right">Update Donation</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
