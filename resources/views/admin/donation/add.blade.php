@extends('admin.layouts.master')
@section('title', 'Add Donation')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form class="form-horizontal" action="{{ route('admin.donation.store') }}" method="post">
                @csrf
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>Add Donation</b></h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.donation.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-list"></i> Donation List
                                </a>
                            </div>
                        </div>

                        <div class="card-body py-3">
                            <div class="row">

                                <!-- Donation Date -->
                                <div class="col-md-4 mt-3">
                                    <label for="donation_date">Donation Date <span class="text-danger">*</span></label>
                                    <input type="date" name="donation_date" id="donation_date"
                                        class="form-control form-control-sm">
                                </div>

                                <!-- Donor -->
                                <div class="col-md-4 mt-3">
                                    <label for="donor_id">Select Donor <span class="text-danger">*</span></label>
                                    <select name="donor_id" id="donor_id" class="form-control form-control-sm">
                                    <option value="" disabled {{ old('donor_id') ? '' : 'selected' }}>Select Donor</option>                                        @foreach ($donors as $donor)
                                            <option value="{{ $donor->id }}" {{ old('donor_id') == $donor->id ? 'selected' : '' }}>
                                                {{ $donor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Amount -->
                                <div class="col-md-4 mt-3">
                                    <label for="amount">Amount <span class="text-danger">*</span></label>
                                    <input type="number" name="amount" id="amount"
                                        class="form-control form-control-sm" placeholder="Enter Amount">
                                </div>

                                <!-- Campaign -->
                                <div class="col-md-4 mt-3">
                                    <label for="campaign_id">Select Campaign</label>
                                    <select name="campaign_id" id="campaign_id" class="form-control form-control-sm">
                                    <option value="" disabled {{ old('campaign_id') ? '' : 'selected' }}>Select Campaign</option>                                        <option value="">Select Campaign</option>
                                        @foreach ($campaigns as $campaign)
                                            <option value="{{ $campaign->id }}" {{ old('campaign_id') == $campaign->id ? 'selected' : '' }}>
                                                {{ $campaign->title }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <!-- Transaction ID -->
                                <div class="col-md-4 mt-3">
                                    <label for="transaction_id">Transaction ID</label>
                                    <input type="text" name="transaction_id" id="transaction_id"
                                        class="form-control form-control-sm" placeholder="Enter Transaction ID">
                                </div>

                                <!-- Receipt No -->
                                <div class="col-md-4 mt-3">
                                    <label for="receipt_no">Reference No</label>
                                    <input type="text" name="receipt_no" id="receipt_no"
                                        class="form-control form-control-sm" placeholder="Enter Reference Number">
                                </div>

                                <!-- Payment Method -->

                                <div class="col-md-4 mt-3">
                                    <label for="payment_method_id">Select Payment Method</label>
                                    <select name="payment_method_id" id="payment_method_id" class="form-control form-control-sm">
                                        <option value="" disabled {{ old('payment_method_id') ? '' : 'selected' }}>Select Method</option>

                                        @foreach ($methods as $method)
                                            <option value="{{ $method->id }}" {{ old('payment_method_id') == $method->id ? 'selected' : '' }}>
                                                {{ $method->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Donation Source -->
                                <div class="col-md-4 mt-3">
                                    <label for="donation_source_id">Select Donation Source</label>
                                    <select name="donation_source_id" id="donation_source_id" class="form-control form-control-sm">
                                        <option value="" disabled {{ old('donation_source_id') ? '' : 'selected' }}>Select Donation Source</option>

                                        @foreach ($sources as $source)
                                            <option value="{{ $source->id }}" {{ old('donation_source_id') == $source->id ? 'selected' : '' }}>
                                                {{ $source->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                <!-- Message -->
                                <div class="col-md-12 mt-3">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" rows="3" class="form-control form-control-sm summernote"
                                        placeholder="Enter any message here..."></textarea>
                                </div>

                            </div> <!-- /.row -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm mb-1 btn-primary float-right">Save Donation</button>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>


            </form>
        </div>
    </div>
</section>
@endsection
