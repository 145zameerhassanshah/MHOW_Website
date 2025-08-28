@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Event Schedule')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Event Schedule') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.event_schedule.update', $event_schedule->id) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $event_schedule->title }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="order_no">{{ __('Order No') }}</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no"
                                        value="{{ $event_schedule->order_no }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active" {{ $event_schedule->status == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $event_schedule->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $event_schedule->date }}" required>
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="start_time">{{ __('Start Time') }} <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" id="start_time" name="start_time"
                                        value="{{ $event_schedule->start_time }}" required>
                                    @error('start_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="end_time">{{ __('End Time') }}</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time"
                                        value="{{ $event_schedule->end_time }}">
                                    @error('end_time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">{{ __('Description') }}</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ $event_schedule->description }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
