@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Event Schedule')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Event Schedule') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.event_schedule.store', ['slug' => $slug]) }}"
                            method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="order_no">{{ __('Order No') }}</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="1">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="start_time">{{ __('Start Time') }} <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                                    @error('start_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="end_time">{{ __('End Time') }}</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time') }}">
                                    @error('end_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
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
        </div>
    </section>

@endsection
