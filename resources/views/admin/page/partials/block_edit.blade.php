@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Block')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Block Edit') }}</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.block.update', $block->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Title -->
                                <div class="col-md-12 mb-3">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Title" value="{{ old('title', $block->title) }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }}</label>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                        placeholder="Enter Subtitle" value="{{ old('subtitle', $block->subtitle) }}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Image type -->
                                <div class="col-md-6">
                                    <label for="type">{{ __('Image Type') }} <span class="text-danger">*</span></label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="image" {{ old('type', $block->type) == 'image' ? 'selected' : '' }}>
                                            Image
                                        </option>
                                        <option value="gallery"
                                            {{ old('type', $block->type) == 'gallery' ? 'selected' : '' }}>
                                            Gallery</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <p class="text-danger">{{ $errors->first('type') }}</p>
                                    @endif
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="image" id="image">
                                            @if ($block->image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($block->image) }}" alt="Current Image" width="50px">
                                            @endif
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Icon Upload -->
                                <div class="col-md-6">
                                    <label for="icon">{{ __('Icon') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="icon">{{ __('Choose New Icon') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="icon" id="icon">
                                            @if ($block->icon)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($block->icon) }}" alt="Current Icon" width="50px">
                                            @endif
                                            @error('icon')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <!-- Features -->
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Features') }}</label>
                                    <div id="features-container">
                                        @foreach ($block->features as $index => $feature)
                                            <div class="row mb-3 feature-group border rounded p-2">
                                                <div class="col-md-6">
                                                    <input type="text" name="features[{{ $index }}][title]"
                                                        class="form-control" placeholder="Feature Title"
                                                        value="{{ old('features.' . $index . '.title', $feature->title) }}"
                                                        required>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" name="features[{{ $index }}][order]"
                                                        class="form-control" placeholder="Order No"
                                                        value="{{ old('features.' . $index . '.order', $feature->order_no) }}"
                                                        required>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-end">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-feature">Remove</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="add-feature">Add
                                        Feature</button>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" class="form-control summernote" name="description" rows="6">{{ old('description', $block->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            let featureIndex = $('#features-container .feature-group').length;

            $('#add-feature').click(function() {
                $('#features-container').append(`
                <div class="row mb-3 feature-group border rounded p-2">
                    <div class="col-md-6">
                        <input type="text" name="features[${featureIndex}][title]" class="form-control" placeholder="Feature Title" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="features[${featureIndex}][order_no]" class="form-control" placeholder="Order No" required>
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                    </div>
                </div>
            `);
                featureIndex++;
            });

            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.feature-group').remove();
            });
        });
    </script>
@endsection
