@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Section Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.page.section.store', ['slug' => $slug]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Title and Subtitle in One Row -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                           placeholder="Enter Title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }}<span class="text-danger">*</span></label>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                           placeholder="Enter Subtitle" value="{{ old('subtitle') }}" required>
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Order No and Type in One Row -->
                                <div class="col-md-6 mb-3">
                                    <label for="order_no">{{ __('Order No') }}<span class="text-danger">*</span></label>
                                    <input type="number" id="order_no" class="form-control" name="order_no"
                                           value="{{ old('order_no') }}" placeholder="Enter Order No" required>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type">{{ __('Type') }}<span class="text-danger">*</span></label>
                                    <select id="type" name="type" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="R-2-L">Right To Left</option>
                                        <option value="L-2-R">Left To Right</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}<span class="text-danger">*</span></label>
                                    <textarea id="description" class="form-control summernote" name="description"
                                              placeholder="Enter Description" rows="6" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-12">
                                    <label for="image">{{ __('Image') }}<span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="image" id="image" required>
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                 src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
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
