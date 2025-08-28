@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Page Detail')

@section('content')
    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-top border-5 border-primary">
                    <div class="card-header ">
                        <h3 class="card-title mt-1">{{ __('Edit Procedure') }}</h3>
                        <a href="{{ route('admin.procedures.index',$slug) }}" class="btn btn-sm btn-primary float-right">Back to List</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.procedures.update', $procedure->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Title -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $procedure->title) }}">
                                    @error('title')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('SubTitle') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $procedure->subtitle) }}">
                                    @error('subtitle')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $procedure->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- Status -->
                                <div class="col-md-4 mb-3">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" {{ old('status', $procedure->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status', $procedure->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Order No -->
                                <div class="col-md-4 mb-3">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="{{ old('order_no', $procedure->order_no) }}">
                                    @error('order_no')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-4 mb-3">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('order_no', $procedure->image) }}" accept="image/*">
                                     @if ($procedure->image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($procedure->image) }}" alt="Current Image"
                                                    width="50px">
                                            @else
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                            @endif
                                    @error('image')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-sm float-right" type="submit">
                                        {{ __('Update') }}
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