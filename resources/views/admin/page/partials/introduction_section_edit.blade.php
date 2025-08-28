@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Introduction Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Introduction Section Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.introduction_section.update', $intro_section->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $intro_section->title }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }}</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        value="{{ $intro_section->subtitle}}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" id="description"
                                        name="description"
                                        value="{{ $intro_section->description }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="col-md-4">
                                    <label for="update_status">{{ __('Status') }} <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="update_status" name="status" required>
                                        <option value="active" {{ $intro_section->status == 'active' ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="inactive"
                                            {{ $intro_section->status == 'inactive' ? 'selected' : '' }}>
                                            {{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Image Upload -->
                                <div class="col-md-4">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="image" id="image">
                                            @if ($intro_section->images)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($intro_section->images) }}" alt="Current Image"
                                                    width="50px">
                                            @else
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                            @endif
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Icon Upload -->
                                <div class="col-md-4">
                                    <label for="icon">{{ __('Icon') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="icon">{{ __('Choose New Icon') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="icon" id="icon">
                                                @if ($intro_section->icon)
                                                    <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                        src="{{ asset($intro_section->icon) }}" alt="Current Image"
                                                        width="50px">
                                                @else
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                                @endif
                                            @error('icon')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
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
