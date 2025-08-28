@extends('admin.layouts.master')
@section('title', 'Edit ReferralSource')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form class="form-horizontal" action="{{ route('admin.referralsource.update', $referralSource->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card card-primary card-outline mt-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title mt-1"><b>Edit ReferralSource</b></h3>
                                <a href="{{ route('admin.referralsource.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-list"></i> ReferralSource List
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Title -->
                                    <div class="form-group col-md-6">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ old('title', $referralSource->title) }}" required>
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Order Number -->
                                    <div class="form-group col-md-6">
                                        <label for="order_no">Order Number</label>
                                        <input type="number" class="form-control" id="order_no" name="order_no"
                                               value="{{ old('order_no', $referralSource->order_no ?? 0) }}">
                                        @error('order_no')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group col-md-6">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="active" {{ old('status', $referralSource->status) == 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="inactive" {{ old('status', $referralSource->status) == 'inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update ReferralSource
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
