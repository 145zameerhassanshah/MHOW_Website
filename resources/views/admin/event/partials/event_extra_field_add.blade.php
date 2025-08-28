@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Event Extra Field')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Event Extra Field') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.event_extra_field.store', ['slug' => $slug]) }}"
                            method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="field_name">{{ __('Field Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field_name" name="field_name" value="{{ old('field_name') }}" required>
                                    @error('field_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="field_label">{{ __('Field Label') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field_label" name="field_label" value="{{ old('field_label') }}" required>
                                    @error('field_label')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="field_type">{{ __('Field Type') }} <span class="text-danger">*</span></label>
                                    <select class="form-control" id="field_type" name="field_type" required>
                                        <option value="">-- Select Type --</option>
                                        <option value="text">Text</option>
                                        <option value="number">Number</option>
                                        <option value="textarea">Textarea</option>
                                        <option value="select">Select</option>
                                    </select>
                                    @error('field_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="field_options">{{ __('Field Options') }} ({{ __('comma-separated if select') }})</label>
                                    <input type="text" class="form-control" id="field_options" name="field_options" value="{{ old('field_options') }}">
                                    @error('field_options')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="placeholder">{{ __('Placeholder') }}</label>
                                    <input type="text" class="form-control" id="placeholder" name="placeholder" value="{{ old('placeholder') }}">
                                    @error('placeholder')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="order_no">{{ __('Order No') }}</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="{{ old('order_no') ?? 1 }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label for="is_required">{{ __('Is Required') }}</label>
                                    <select class="form-control" id="is_required" name="is_required">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('is_required')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
