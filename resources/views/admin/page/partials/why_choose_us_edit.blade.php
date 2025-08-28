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
                        <h3 class="card-title mt-1">{{ __('Why Choose Us Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.why-choose-us.update', $whyUs->id) }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="update_whyus_title">{{ __('Title ') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="update_whyus_title" name="title"
                                        value="{{ old('title', $whyUs->title) }}">
                                    <span class="text-danger error" id="error_title"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="update_whyus_subtitle">{{ __('SubTitle') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="update_whyus_subtitle" name="subtitle"
                                        value="{{ old('subtitle', $whyUs->subtitle) }}">
                                    <span class="text-danger error" id="error_subtitle"></span>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="update_whyus_description">{{ __('Description') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="update_whyus_description"
                                        name="description" value="{{ old('description', $whyUs->description) }}">
                                    <span class="text-danger error" id="error_description"></span>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="update_whyus_status">{{ __('Status') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="update_whyus_status" name="status">
                                        <option value="active"
                                            {{ old('status', $whyUs->status) == 'active' ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="inactive"
                                            {{ old('status', $whyUs->status) == 'inactive' ? 'selected' : '' }}>
                                            {{ __('Inactive') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="update_whyus_order_no">{{ __('Order No') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="update_whyus_order_no" name="order_no"
                                        value="{{ old('order_no', $whyUs->order_no) }}">
                                    <span class="text-danger error" id="error_order_no"></span>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="update_whyus_icon">{{ __('Icon') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="update_whyus_icon" name="icon"
                                        value="{{ old('icon', $whyUs->icon) }}">
                                    <span class="text-danger error" id="error_icon"></span>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
