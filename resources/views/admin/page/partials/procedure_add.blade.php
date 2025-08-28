@extends('admin.layouts.master')
@section('title', 'Add Procedure')
@section('content')
    <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">

<form class="form-horizontal" action="{{ route('admin.procedures.store', ['slug' => $slug]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="subtitle">{{ __('SubTitle') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
            @error('subtitle')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
            @error('description')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
            <select class="form-control" id="status" name="status">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
            </select>
            @error('status')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="order_no" name="order_no" value="{{ old('order_no') }}">
            @error('order_no')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="image">{{ __('Image') }}</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <span class="text-danger"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            <button class="btn btn-primary btn-sm float-right">Submit</button>
        </div>
    </div>
</form>
            </div>
        </div>
                </div>

        <!-- /.row -->
    </section>


@endsection
