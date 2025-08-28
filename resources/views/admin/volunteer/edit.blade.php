@extends('admin.layouts.master')
@section('title', 'Volunteer Edit')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="card border-top border-5 border-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title mt-1">Edit Volunteer</h3>
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    Please fix the errors below.
                                </div>
                            @endif

                            <form action="{{ route('admin.volunteer.update', $volunteer->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $volunteer->name) }}">
                                    @error('name')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $volunteer->email) }}">
                                    @error('email')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $volunteer->phone) }}">
                                    @error('phone')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Volunteer Type <span class="text-danger">*</span></label>
                                    <select name="volunteer_type_id" class="form-control">
                                        <option value="">Select Type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('volunteer_type_id', $volunteer->volunteer_type_id) == $type->id ? 'selected' : '' }}>
                                                {{ $type->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('volunteer_type_id')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Country <span class="text-danger">*</span></label>
                                    <select name="country_id" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id', $volunteer->country_id) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active"
                                            {{ old('status', $volunteer->status) == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive"
                                            {{ old('status', $volunteer->status) == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-lg-12 m-0 mt-1">
                                    <div class="row">
                                        <label for="image"
                                            class="col-sm-12 control-label m-0">{{ __('Image') }}</label>

                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <label class="custom-file-label"
                                                    for="image">{{ __('Choose Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="image"
                                                    id="image">
                                            </div>

                                            <!-- Display current image if available -->
                                            @if ($volunteer->image)
                                                <img class="mw-400 mt-1 show-img img-demo"
                                                    src="{{ asset($volunteer->image) }}" alt="" width="100px">
                                            @else
                                                <img class="mw-400 mt-1 show-img img-demo"
                                                    src="{{ asset('assets/uploads/core/img-demo.jpg') }}" alt=""
                                                    width="100px">
                                            @endif

                                            @if ($errors->has('image'))
                                                <p class="text-danger">{{ $errors->first('image') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Update Volunteer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
