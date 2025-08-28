@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Event Extra Field')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Event Extra Field') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.event_extra_field.update', $event_extra_field->id) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="field_name">{{ __('Field Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field_name" name="field_name"
                                        value="{{ $event_extra_field->field_name }}" required>
                                    @error('field_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="field_label">{{ __('Field Label') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="field_label" name="field_label"
                                        value="{{ $event_extra_field->field_label }}" required>
                                    @error('field_label')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="field_type">{{ __('Field Type') }} <span class="text-danger">*</span></label>
                                    <select class="form-control" id="field_type" name="field_type" required>
                                        <option value="text" {{ $event_extra_field->field_type == 'text' ? 'selected' : '' }}>Text</option>
                                        <option value="number" {{ $event_extra_field->field_type == 'number' ? 'selected' : '' }}>Number</option>
                                        <option value="textarea" {{ $event_extra_field->field_type == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                        <option value="select" {{ $event_extra_field->field_type == 'select' ? 'selected' : '' }}>Select</option>
                                    </select>
                                    @error('field_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="field_options">{{ __('Field Options') }} ({{ __('comma-separated') }})</label>
                                    <input type="text" class="form-control" id="field_options" name="field_options"
                                        value="{{ $event_extra_field->field_options }}">
                                    @error('field_options')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="placeholder">{{ __('Placeholder') }}</label>
                                    <input type="text" class="form-control" id="placeholder" name="placeholder"
                                        value="{{ $event_extra_field->placeholder }}">
                                    @error('placeholder')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="order_no">{{ __('Order No') }}</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no"
                                        value="{{ $event_extra_field->order_no }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label for="is_required">{{ __('Is Required') }}</label>
                                    <select class="form-control" id="is_required" name="is_required">
                                        <option value="0" {{ $event_extra_field->is_required == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $event_extra_field->is_required == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    @error('is_required')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{ $event_extra_field->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $event_extra_field->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-2">
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
