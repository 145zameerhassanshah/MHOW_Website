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
                    <div class="card-header ">
                        <h3 class="card-title mt-1">{{ __('Section Add') }}</h3>
                        <a href="{{ route('admin.page.section.index', ['slug' => $slug]) }}"
                           class="btn btn-sm btn-primary float-right">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form action="{{ route('admin.page.section.update',[$pageSection->id ,'slug' => $slug]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Title and Subtitle -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                           placeholder="Enter Title" value="{{ old('title', $pageSection->title) }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }}<span class="text-danger">*</span></label>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                           placeholder="Enter Subtitle" value="{{ old('subtitle', $pageSection->subtitle) }}" required>
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Order No and Type -->
                                <div class="col-md-6 mb-3">
                                    <label for="order_no">{{ __('Order No') }}<span class="text-danger">*</span></label>
                                    <input type="number" id="order_no" class="form-control" name="order_no"
                                           placeholder="Enter Order No" value="{{ old('order_no', $pageSection->order_no) }}" required>
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type">{{ __('Type') }}<span class="text-danger">*</span></label>
                                    <select id="type" name="type" class="form-control" required>
                                        <option selected disabled>Select Type</option>
                                        <option value="R-2-L" {{ old('type', $pageSection->type ?? '') == 'R-2-L' ? 'selected' : '' }}>Right To Left</option>
                                        <option value="L-2-R" {{ old('type', $pageSection->type ?? '') == 'L-2-R' ? 'selected' : '' }}>Left To Right</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}<span class="text-danger">*</span></label>
                                    <textarea id="description" class="form-control summernote" name="description"
                                              placeholder="Enter Description" rows="6" required>{{ old('description', $pageSection->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-12 mb-3">
                                    <label for="image ">{{ __('Image') }} <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="image" id="image required">
                                            @if ($pageSection->image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($pageSection->image) }}" alt="Current Image" width="50px">
                                            @endif
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-primary mt-2 float-right">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
