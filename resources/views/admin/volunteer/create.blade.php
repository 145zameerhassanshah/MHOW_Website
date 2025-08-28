@extends('admin.layouts.master')
@section('title', 'Add Volunteer')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="card border-top border-5 border-primary">
                        <div class="card-header">
                            <h3 class="card-title mt-1">Add Volunteer</h3>
                            <a href="{{ route('admin.volunteer.index') }}" class="btn btn-sm btn-secondary float-right">Back
                                to List</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.volunteer.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Volunteer Type <span class="text-danger">*</span></label>
                                    <select name="volunteer_type_id" class="form-control" required>
                                        <option value="">Select Type</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('volunteer_type_id') == $type->id ? 'selected' : '' }}>
                                                {{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('volunteer_type_id')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Country <span class="text-danger">*</span></label>
                                    <select name="country_id" class="form-control" required>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger"><i class="fa fa-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Save Volunteer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
