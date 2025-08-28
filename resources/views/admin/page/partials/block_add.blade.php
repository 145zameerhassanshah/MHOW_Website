@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Block')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Add Block</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.block.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <!-- Title Field -->
                                <div class="col-md-12 mb-3">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subtitle Field -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                        placeholder
                                        ="Enter Subtitle" value="{{ old('subtitle') }}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type">{{ __('Image Type') }} <span class="text-danger">*</span></label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image
                                        </option>
                                        <option value="gallery" {{ old('type') == 'gallery' ? 'selected' : '' }}>
                                            Gallery</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <p class="text-danger">{{ $errors->first('type') }}</p>
                                    @endif
                                </div>
                                <!-- Image -->
                                <div class="col-md-6">
                                    <label for="image">Image</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">Choose New Image</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="image" id="image">
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="50px">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Icon -->
                                <div class="col-md-6">
                                    <label for="icon">Icon</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="icon">Choose New Icon</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="icon" id="icon">
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="50px">
                                            @error('icon')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--  image type -->


                                <!-- Features Fields -->
                                <div class="col-md-12 mb-3">
                                    <label>Features</label>
                                    <div id="features-container"></div>
                                    <button type="button" class="btn btn-secondary mt-2" id="add-feature">Add
                                        Feature</button>
                                </div>

                                <!-- Description Field -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control summernote" name="description" placeholder="Enter Description"
                                        rows="6">{{ old('description') }}</textarea>
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
            let featureIndex = 0;

            function addFeatureRow(index) {
                $('#features-container').append(`
                    <div class="row mb-3 feature-group border rounded p-2">
                        <div class="col-md-6">
                            <input type="text" name="features[${index}][title]" class="form-control" placeholder="Feature Title" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="features[${index}][order_no]" class="form-control" placeholder="Order No" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                        </div>
                    </div>
                `);
            }

            // Add initial feature row
            addFeatureRow(featureIndex);
            featureIndex++;

            // Add more feature rows
            $('#add-feature').click(function() {
                addFeatureRow(featureIndex);
                featureIndex++;
            });

            // Remove feature row
            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.feature-group').remove();
            });
        });
    </script>
@endsection
