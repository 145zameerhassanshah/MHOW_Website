@extends('admin.layouts.master')
@section('title', 'Edit Page Section')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" action="{{ route('admin.page.section.update', $pageSection->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('Edit Page Section') }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <!-- Title Fields -->
                                            <div class="col-md-6 mb-3">
                                                <label for="title_en">{{ __('Title (English)') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="title_en" class="form-control" name="title[en]"
                                                    placeholder="Enter Title in English" value="{{ old('title.en', $pageSection->getTranslations('title')['en']) }}"
                                                    required>
                                                @error('title.en')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="title_ar">{{ __('Title (Arabic)') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="title_ar" class="form-control" name="title[ar]"
                                                    placeholder="Enter Title in Arabic" value="{{ old('title.ar', $pageSection->getTranslations('title')['ar']) }}"
                                                    required>
                                                @error('title.ar')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- SubTitle Fields -->
                                            <div class="col-md-6 mb-3">
                                                <label for="subtitle_en">{{ __('Subtitle (English)') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="subtitle_en" class="form-control"
                                                    name="subtitle[en]" placeholder="Enter Subtitle in English"
                                                    value="{{ old('subtitle.en', $pageSection->getTranslations('subtitle')['en']) }}" required>
                                                @error('subtitle.en')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="subtitle_ar">{{ __('Subtitle (Arabic)') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="subtitle_ar" class="form-control"
                                                    name="subtitle[ar]" placeholder="Enter Subtitle in Arabic"
                                                    value="{{ old('subtitle.ar', $pageSection->getTranslations('subtitle')['ar']) }}" required>
                                                @error('subtitle.ar')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- Order Number -->
                                            <div class="col-md-6 mb-3">
                                                <label for="order_no">{{ __('Order No') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" id="order_no" class="form-control" name="order_no"
                                                    value="{{ old('order_no', $pageSection->order_no) }}" placeholder="Enter Order No">
                                                @error('order_no')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- type -->
                                            <div class="col-md-6 mb-3">
                                                <label for="type">{{ __('Type') }}<span class="text-danger">*</span></label>
                                                <select id="type" name="type" class="form-control">
                                                    <option selected disabled>Select Type</option>
                                                    <option value="R-2-L" {{ $pageSection->type == 'R-2-L' ? 'selected' : '' }}>Right To Left</option>
                                                    <option value="L-2-R" {{ $pageSection->type == 'L-2-R' ? 'selected' : '' }}>Left To Right</option>
                                                </select>
                                                @error('type')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                            <!-- Description Fields -->
                                            <div class="col-md-12 mb-3">
                                                <label for="description_en">{{ __('Description (English)') }}<span
                                                        class="text-danger">*</span></label>
                                                <textarea id="description_en" class="form-control summernote" name="description[en]"
                                                    placeholder="Enter Description in English" rows="6" required>{{ old('description.en', $pageSection->getTranslations('description')['en']) }}</textarea>
                                                @error('description.en')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="description_ar">{{ __('Description (Arabic)') }}<span
                                                        class="text-danger">*</span></label>
                                                <textarea id="description_ar" class="form-control summernote" name="description[ar]"
                                                    placeholder="Enter Description in Arabic" rows="6" required>{{ old('description.ar', $pageSection->getTranslations('description')['ar']) }}</textarea>
                                                @error('description.ar')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <!-- image -->
                                            <div class="col-md-12">
                                                <label for="image">{{ __('Image') }}<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="custom-file-label"
                                                            for="image">{{ __('Choose New Image') }}</label>
                                                        <input type="file"
                                                            class="custom-file-input up-img form-control" name="image"
                                                            id="image">
                                                        <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                            src="{{ asset($pageSection->image) }}"
                                                            alt="">
                                                        @error('image')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success btn-lg"
                                                style="border-radius: 10px;">{{ __('Update Page Section') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
