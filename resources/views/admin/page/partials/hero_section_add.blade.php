@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Hero Section')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Hero Section') }}</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form action="{{ route('admin.hero_section.store', ['slug' => $slug]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" required class="form-control" id="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('Subtitle') }}</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="description">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="status" name="status">
                                        <option value="">-- Select Status --</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                
                                <!-- Image -->
                                <div class="col-md-12">
                                    <label for="background_image">Background Image</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="background_image">Choose New Background Image</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="background_image" id="background_image">
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                            @error('background_image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-3">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>

@endsection
