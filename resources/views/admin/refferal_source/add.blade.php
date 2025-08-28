@extends('admin.layouts.master')
@section('title', 'Add ReferralSource')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('admin.referralsource.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary card-outline mt-3 shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Add ReferralSource') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.referralsource.index') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('List Of ReferralSource') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <!-- Title -->
                                <div class="form-group col-md-5">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group col-md-5">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                                                <!-- Order Number -->
                                <div class="form-group col-md-2">
                                    <label for="order_no">Order Number</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="0">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save New ReferralSource
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
