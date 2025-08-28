@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Why Us Image')
@section('content')

@include('admin.page.top-nav')

<section class="content">
    @include('admin.page.side-nav')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-top border-5 border-primary">
                <div class="card-header">
                    <h3 class="card-title mt-1">Edit Why Us Image</h3>
                    <a href="{{ route('admin.why-us-image.index', ['slug' => $slug]) }}" class="btn btn-sm btn-primary float-right">
                        Back to List
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.why-us-image.update', ['id' => $whyUsImage->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" id="title" name="title" value="{{ old('title', $whyUsImage->title) }}">
                                @error('title')
                                    <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $whyUsImage->subtitle) }}">
                                @error('subtitle')
                                    <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <label for="description">{{ __('Description') }} <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="description"
                                        name="description" value="{{ $whyUsImage->description }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                    <label for="update_status">{{ __('Status') }} <span
                                            class="text-danger">*</span></label>
                                    <select required class="form-control" id="update_status" name="status">
                                        <option value="active" {{ $whyUsImage->status == 'active' ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="inactive" {{ $whyUsImage->status == 'inactive' ? 'selected' : '' }}>
                                            {{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <input required type="number" class="form-control" id="order_no" name="order_no"
                                        value="{{ $whyUsImage->order_no }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                                <!-- Image Upload -->
                                <div class="col-md-12">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="image" id="image">
                                            @if ($whyUsImage->image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset('assets/admin/uploads/why_us_image/' . $whyUsImage->image) }}"
                                                    alt="Current Image" width="50px">
                                            @else
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                    width="50px">
                                            @endif
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-sm float-right">Update</button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
