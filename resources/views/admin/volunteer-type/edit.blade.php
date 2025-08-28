@extends('admin.layouts.master')
@section('title', 'Volunteer Type Edit')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="card border-top border-5 border-primary">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Edit Volunteer Type</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.volunteer-type.update', $type->id) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title', $type->title) }}">
                                    @error('title')
                                        <span class="text-danger"><i class="bi bi-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Icon</label>
                                    <input type="text" name="icon" id="icon" class="form-control"
                                        value="{{ old('icon', $type->icon) }}">
                                    @error('icon')
                                        <span class="text-danger"><i class="bi bi-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Order No <span class="text-danger">*</span></label>
                                    <input type="number" name="order_no" id="order_no" class="form-control"
                                        value="{{ old('order_no', $type->order_no) }}">
                                    @error('order_no')
                                        <span class="text-danger"><i class="bi bi-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active" {{ $type->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $type->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger"><i class="bi bi-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
