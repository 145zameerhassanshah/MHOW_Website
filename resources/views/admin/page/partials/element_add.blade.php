@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Element')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Element Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.element.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <!-- Title Fields -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Title in English" value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- SubTitle Fields -->
                                <div class="col-md-6 mb-3">
                                    <label for="subtitle">{{ __('Subtitle') }}</label>
                                    <input type="text" id="subtitle" class="form-control" name="subtitle"
                                        placeholder="Enter Subtitle in English" value="{{ old('subtitle') }}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- image -->
                                <div class="col-md-6">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="image" id="image">
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- icon -->
                                <div class="col-md-6">
                                    <label for="icon">{{ __('Icon') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="icon">{{ __('Choose New Icon') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="icon" id="icon" >
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
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
                                        <div id="feature-container">
                                            <div class="row mb-3 feature-group border rounded p-2">
                                                <div class="col-md-6">
                                                    <input type="text" name="features[0][title]" class="form-control"
                                                        placeholder="Enter Title " required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" name="features[0][order]" class="form-control"
                                                        placeholder="Order No" required>
                                                </div>
                                                <div class="col-md-10 mt-2">
                                                    <input type="text" name="features[0][description]"
                                                        class="form-control" placeholder="Enter Description">
                                                </div>
                                                <div class="col-md-2 text-end mt-2">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-feature">Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="add-feature">Add
                                        Feature</button>
                                </div>

                                <!-- Description Fields -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" class="form-control summernote" name="description"
                                        placeholder="Enter Description in English" rows="6">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                                </div>
                            </div> <!-- /.row -->

                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
@section('js')
<script>
    $(document).ready(function () {
        let featureIndex = 1;

        $('#add-feature').click(function () {
            $('#features-container').append(`
                <div class="row mb-3 feature-group border rounded p-2">
                    <div class="col-md-6">
                        <input type="text" name="features[${featureIndex}][title]" class="form-control" placeholder="Enter Title " required>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="features[${featureIndex}][order]" class="form-control" placeholder="Order No" required>
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

        $(document).on('click', '.remove-feature', function () {
            $(this).closest('.feature-group').remove();
        });
    });
</script>
@endsection
