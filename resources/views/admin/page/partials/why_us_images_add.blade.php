@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Why Us Image')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                <div class="card border-top border-5 border-primary">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Add Why Us Image</h3>
                        <a href="{{ route('admin.why-us-image.index', ['slug' => $slug]) }}"
                            class="btn btn-sm btn-secondary float-right">
                            Back to List
                        </a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.why-us-image.store', ['slug' => $slug]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                                        value="{{ old('subtitle') }}">
                                    @error('subtitle')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="description" name="description"
                                        value="{{ old('description') }}">
                                    @error('description')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="status" name="status">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="order_no">Order No <span class="text-danger">*</span></label>
                                    <input required type="number" class="form-control" id="order_no" name="order_no"
                                        value="{{ old('order_no') }}">
                                    @error('order_no')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Image -->
                                <div class="col-12">
                                    <label for="image">Image <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">Choose New Image</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="image" id="image" required>
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                width="50px">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
