@extends('admin.layouts.master')
@section('title', 'Add Volunteer Type')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="card border-top border-5 border-primary">
                        <div class="card-header d-flex justify-content-between">
                            <h5>Add Volunteer Type</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.volunteer-type.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" requierd>
                                    @error('title')
                                        <span class="text-danger"><i class="bi bi-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Icon</label>
                                    <input type="text" name="icon" id="icon" class="form-control"
                                        value="{{ old('icon') }}">
                                    @error('icon')
                                        <span class="text-danger"><i class="bi bi-exclamation-circle"></i>
                                            {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Order No <span class="text-danger">*</span></label>
                                    <input type="number" name="order_no" id="order_no" class="form-control"
                                        value="{{ old('order_no', 1) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
