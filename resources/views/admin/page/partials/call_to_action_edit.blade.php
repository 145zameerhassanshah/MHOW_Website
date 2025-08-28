@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Call To Action')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('CallToAction Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.call-to-action.update', ['id' => $cta->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="ctaTitle">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="ctaTitle" name="title" value="{{ $cta->title }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="ctaSubtitle">{{ __('Subtitle') }}</label>
                                    <input type="text" class="form-control" id="ctaSubtitle" name="subtitle" value="{{ $cta->subtitle }}">
                                    @error('subtitle')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
    
                                <div class="col-md-4">
                                    <label for="ctaButtonText">{{ __('Button Text') }} <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="ctaButtonText" name="button_text" value="{{ $cta->button_text }}">
                                    @error('button_text')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="ctaButtonLink">{{ __('Button Link') }} <span class="text-danger">*</span></label>
                                    <input required type="url" class="form-control" id="ctaButtonLink" name="button_link" value="{{ $cta->button_link }}">
                                    @error('button_link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
    
                                <div class="col-md-4">
                                    <label for="ctaStatus">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="ctaStatus" name="status">
                                        <option value="active" {{ $cta->status == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ $cta->status == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
