@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Document Required')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Document Required Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.document-required.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Field -->

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="description">{{ __('Description') }} <span
                                            class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-md-4">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="status" name="status">
                                        <option value="active">{{ __('Active') }}</option>
                                        <option value="inactive">{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <input required value="1" type="number" class="form-control" id="order_no" name="order_no" value="{{ old('order_no') }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- icon -->
                                <div class="col-md-4">
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
