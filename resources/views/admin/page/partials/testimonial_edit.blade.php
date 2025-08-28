@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Testimonial')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card border-top border-5 border-primary">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mt-1">{{ __('Edit Testimonial') }}</h3>
                        <a href="{{ route('admin.testimonial.index', $testimonial->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                {{-- Name (English) --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            value="{{ $testimonial->name }}">
                                        @error('name')
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Order --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_no">{{ __('Order') }} <span class="text-danger">*</span></label>
                                        <input type="number" name="order_no" id="order_no" class="form-control"
                                            value="{{ old('order_no', $testimonial->order_no) }}" required>
                                        @error('order_no')
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Feedback (English) --}}
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="feedback">{{ __('Feedback') }} <span
                                                class="text-danger">*</span></label>
                                        <input name="feedback" id="feedback" class="form-control" value="{{ $testimonial->feedback }}" required>
                                        @error('feedback')
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Designation (English) --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designation">{{ __('Designation') }}</label>
                                        <input type="text" name="designation" id="designation" class="form-control"
                                            value="{{ $testimonial->designation }}">
                                        @error('designation')
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="inactive"
                                                {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>
                                                {{ __('Inactive') }}</option>
                                            <option value="active"
                                                {{ $testimonial->status == 'active' ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                                {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="image" id="image">
                                            @if ($testimonial->image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($testimonial->image) }}" alt="Current Image" width="50px">
                                            @endif
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary float-end">
                                        <i class="fas fa-save"></i> Submit
                                    </button>
                                </div>

                            </div> {{-- .row --}}
                        </form>
                    </div> {{-- .card-body --}}
                </div> {{-- .card --}}
            </div>
        </div>
    </section>
@endsection
