@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Element')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Element Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.element.update', $element->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <!-- Title Field -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Title"
                                        value="{{ old('title', $element->title) }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subtitle Field -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }}</label>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                        placeholder="Enter Subtitle"
                                        value="{{ old('subtitle', $element->subtitle) }}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="image" id="image">
                                            @if ($element->image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($element->image) }}" alt="Current Image" width="50px">
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
                                            <label class="custom-file-label" for="icon">{{ __('Choose New Icon') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="icon" id="icon">
                                            @if ($element->icon)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($element->icon) }}" alt="Current Icon" width="50px">
                                            @endif
                                            @error('icon')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Features Fields -->
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Features') }}</label>
                                    <div id="features-container">
                                        @foreach ($element->features as $index => $feature)
                                            <div class="feature-group mb-3 border rounded p-2">
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <input type="text" name="features[{{ $index }}][title]" class="form-control" placeholder="Enter Title" value="{{ old('features.' . $index . '.title', $feature->title) }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="number" name="features[{{ $index }}][order]" class="form-control" placeholder="Enter Order No" value="{{ old('features.' . $index . '.order', $feature->order_no) }}" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="features[{{ $index }}][description]" class="form-control" placeholder="Enter Description" value="{{ old('features.' . $index . '.description', $feature->description) }}">
                                                    </div>
                                                    <div class="col-md-2 text-end mt-2">
                                                        <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="add-feature">Add Feature</button>
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" class="form-control summernote" name="description" rows="6">{{ old('description', $element->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            let featureIndex = {{ count($element->features) }};

            $('#add-feature').click(function() {
                $('#features-container').append(`
                <div class="row mb-3 feature-group border rounded p-2">
                    <div class="col-md-6">
                        <input type="text" name="features[${featureIndex}][title]" class="form-control" placeholder="Enter Title" required>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="features[${featureIndex}][order]" class="form-control" placeholder="Enter Order No" required>
                    </div>
                    <div class="col-md-10 mt-2">
                        <input type="text" name="features[${featureIndex}][description]" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="col-md-2 text-end mt-2">
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
