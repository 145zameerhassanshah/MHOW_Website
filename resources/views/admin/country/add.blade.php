@extends('admin.layouts.master')
@section('title', 'Add Country')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <form class="form-horizontal" action="{{ route('admin.country.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                Add Country
                                <div class="card-tools">
                                    <a href="{{ route('admin.country.index') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-person-lines-fill"></i> {{ __('Country List') }}
                                    </a>
                                </div>

                            </div>
                            <div class="card-body pb-0">

                                <div class="row">
                                    <div class="col-12">
                                        <label for="name" class="control-label">{{ __('Country Name') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control form-control-sm"
                                            name="name" value="{{ old('name') }}"
                                            placeholder="{{ __('Enter Country Name') }}" required>
                                        @if ($errors->has('name'))
                                            <p class="text-danger"> {{ $errors->first('name') }} </p>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="summernote form-control form-control-sm"
                                            placeholder="Enter Description">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <p class="text-danger">{{ $errors->first('description') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <label for="icon" class="col-sm-12 control-label m-0">Icon</label>
                                            <div class="col-sm-12">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="icon">Choose Icon</label>
                                                    <input type="file" class="custom-file-input up-img" name="icon"
                                                        id="icon">
                                                </div>
                                                <img class="mw-400 mt-1 show-img img-demo"
                                                    src="{{ asset('assets/uploads/core/img-demo.jpg') }}" alt=""
                                                    width="100px">
                                                @if ($errors->has('icon'))
                                                    <p class="text-danger">{{ $errors->first('icon') }}</p>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <button type="submit"
                                            class="btn btn-sm mb-1 btn-primary float-right">{{ __('Save New Country') }}</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
