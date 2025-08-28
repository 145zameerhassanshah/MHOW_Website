@extends('admin.layouts.master')
@section('title', 'Edit Country')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <form class="form-horizontal" action="{{ route('admin.country.update', $country->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Edit Country') }}</h3>
                                <div class="card-tools">
                                    <input type="submit" value="Update" class="btn btn-sm btn-primary">
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pb-0">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="name" class="control-label">{{ __('Country Name') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control form-control-sm"
                                            name="name" value="{{ old('name') ?? $country->name }}"
                                            placeholder="{{ __('Enter Country Name') }}">
                                        @if ($errors->has('name'))
                                            <p class="text-danger"> {{ $errors->first('name') }} </p>
                                        @endif
                                    </div>
                                    <!-- Description -->
                                    <div class="col-md-12 mt-2">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="summernote form-control form-control-sm"
                                            placeholder="Enter Description">{{ old('description', $country->description) }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Icon -->
                                    <div class="col-lg-12 mt-2">
                                        <div class="row">
                                            <label for="icon" class="col-sm-12 control-label m-0">Icon</label>
                                            <div class="col-sm-12">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="icon">Choose Icon</label>
                                                    <input type="file" class="custom-file-input up-img" name="icon"
                                                        id="icon">
                                                </div>
                                                <img class="mw-400 mt-1 show-img img-demo" src="{{ asset($country->icon) }}"
                                                    alt="" width="100px">
                                                @error('icon')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                </div>

                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>


@endsection
