@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Page Detail')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Feature Image Edit') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.feature_image.update', $feature_image->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $feature_image->title) }}" >
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $feature_image->subtitle) }}">
                                    @error('subtitle') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="3" >{{ old('description', $feature_image->description) }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="active" {{ old('status', $feature_image->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status', $feature_image->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="{{ old('order_no', $feature_image->order_no) }}">
                                    @error('order_no') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input type="file" class="form-control" id="image" value="{{ old('image', $feature_image->image) }}"name="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                                    @if($feature_image->image)
                                        <div class="mt-2">
                                            <img src="{{ asset( $feature_image->image) }}" alt="Current Image" height="100">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-primary float-right" type="submit">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
