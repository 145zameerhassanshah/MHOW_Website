@extends('admin.layouts.master')
@section('title', 'Add Slider')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Add Slider') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.slider')}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Image') }} <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                        <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img" name="image" id="image">
                                        </div>
                                        @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                            @endif
                                        <p class="help-block text-info">{{ __('Upload 1920X900 (Pixel) Size image or Squre size image for best quality.
                                                                Only jpg, jpeg, png image is allowed.') }}
                                        </p>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
                                            @if ($errors->has('title'))
                                                <p class="text-danger"> {{ $errors->first('title') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Sub Title') }}</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="sub_title" placeholder="{{ __('Sub Title') }}" value="{{ old('sub_title') }}">
                                            @if ($errors->has('sub_title'))
                                                <p class="text-danger"> {{ $errors->first('sub_title') }} </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Order No') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="serial_no" placeholder="{{ __('Order') }}" value="{{ old('serial_no') }}">
                                            @if ($errors->has('serial_no'))
                                                <p class="text-danger"> {{ $errors->first('serial_no') }} </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                               <option value="0">{{ __('Unpublish') }}</option>
                                               <option value="1">{{ __('Publish') }}</option>
                                              </select>
                                            @if ($errors->has('status'))
                                                <p class="text-danger"> {{ $errors->first('status') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection
