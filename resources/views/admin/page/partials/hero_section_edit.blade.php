@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Hero Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Hero Section') }}</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.hero_section.update', $hero_section->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- If your route expects PUT, uncomment below --}}
                            {{-- @method('PUT') --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $hero_section->title) }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('Subtitle') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        value="{{ old('subtitle', $hero_section->subtitle) }}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="description">{{ __('Description') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ old('description', $hero_section->description) }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="status" name="status">
                                        <option value="active"
                                            {{ old('status', $hero_section->status) == 'active' ? 'selected' : '' }}>
                                            {{ __('Active') }}</option>
                                        <option value="inactive"
                                            {{ old('status', $hero_section->status) == 'inactive' ? 'selected' : '' }}>
                                            {{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                
                                <!-- Image Upload -->
                                <div class="col-md-12">
                                    <label for="background_image">{{ __('Background Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="background_image">{{ __('Choose New Background Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="background_image" id="background_image">
                                            @if ($hero_section->background_image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($hero_section->background_image) }}" alt="Current Image" width="50px">
                                            @endif
                                            @error('background_image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary btn-sm float-right">Update</button>
                                </div>
                            </div>


                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>

@endsection
