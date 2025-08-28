@extends('admin.layouts.master')
@section('title', 'Edit Partners')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Edit Partner') }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Partners') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Edit Partner') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.partner.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.partner.update', $partner->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="title" class="col-sm-12 control-label">{{ __('Partner Title') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" id="title" class="form-control" name="title"
                                            value="{{ old('title', $partner->title) }}"
                                            placeholder="{{ __('Partner Title') }}">
                                        @if ($errors->has('title'))
                                            <p class="text-danger"> {{ $errors->first('title') }} </p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="order_no" class="col-sm-12 control-label">{{ __('Order No') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="number" id="order_no" class="form-control" name="order_no"
                                            value="{{ old('order_no', $partner->order_no) }}"
                                            placeholder="{{ __('Order No') }}">
                                        @if ($errors->has('order_no'))
                                            <p class="text-danger"> {{ $errors->first('order_no') }} </p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-sm-12 control-label">{{ __('Image') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <img class="mw-400 mb-3 show-img img-demo"
                                            src="{{ asset('assets/admin/uploads/partner/' . $partner->image) }}"
                                            alt="" width="200px">
                                        <div class="custom-file">
                                            <label class="custom-file-label"
                                                for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img" name="image"
                                                id="image">
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="text-danger"> {{ $errors->first('image') }} </p>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="status" class="col-sm-12 control-label">{{ __('Status') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select id="status" name="status" class="form-control"
                                            value="{{ old('status', $partner->status) }}">

                                            <option value="published"
                                                {{ $partner->status == 'published' ? 'selected' : '' }}>Published
                                            </option>
                                            <option value="draft" {{ $partner->status == 'draft' ? 'selected' : '' }}>
                                                Draft</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif

                                    </div>

                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button type="submit"
                                            class="btn btn-primary btn btn-sm">{{ __('Update') }}</button>
                                    </div>
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
