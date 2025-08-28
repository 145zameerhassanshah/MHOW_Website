@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Testimonial')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Testimonial Add') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.testimonial.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- Row 1: Name and Order --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_no">{{ __('Order') }}<span class="text-danger">*</span></label>
                                        <input type="number" name="order_no" id="order_no" class="form-control" value="{{ old('order_no') }}" required
                                            value="{{ old('order_no') }}">
                                        @error('order_no')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Row 2: Feedback and Designation --}}
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="feedback">{{ __('Feedback') }} <span
                                                class="text-danger">*</span></label>
                                        <input name="feedback" id="feedback" class="form-control" value="{{ old('feedback') }}" required>
                                        @error('feedback')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designation">{{ __('Designation') }}</label>
                                        <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation') }}">
                                        @error('designation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Row 3: Status and Image --}}
                                {{-- Row 3: Status and Image --}}

                                <!-- Status -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="inactive">{{ __('Inactive') }}</option>
                                            <option value="active">{{ __('Active') }}</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="col-md-6">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">Choose New Image</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="image" id="image" required>
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="50px">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="col-12">
                                <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
