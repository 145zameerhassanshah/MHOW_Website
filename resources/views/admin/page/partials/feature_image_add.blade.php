@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Page Detail')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Feature Image Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.feature_image.store',['slug' => $slug]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="featureimg_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="featureimg_title"
                                           name="title" value="{{ old('title') }}">
                                    <span class="text-danger error" id="error_title"></span>
                                </div>
                                   <div class="col-md-6">
                                    <label for="featureimg_subtitle">{{ __('SubTitle') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="featureimg_subtitle"
                                           name="subtitle" value="{{ old('subtitle') }}">
                                    <span class="text-danger error" id="error_subtitle"></span>
                                </div>
                            </div>
                             
                           

                            <div class="row mt-3">
                                <div class="col-12">
                                    <label for="featureimg_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="featureimg_description"
                                           name="description" value="{{ old('description') }}">
                                    <span class="text-danger error" id="error_description"></span>
                                </div>
                                
                            </div>

                            

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="featureimg_status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select class="form-control" id="featureimg_status" name="status">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="featureimg_order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="featureimg_order_no"
                                           name="order_no" value="{{ old('order_no') }}">
                                    <span class="text-danger error" id="error_order_no"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <span class="text-danger error" id="error_image"></span>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-sm float-right" type="submit">{{ ('Submit') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
