@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Event Image')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Edit Event Image') }}</h3>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.event_image.update', ['id' => $event_image->id, 'slug' => $slug]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event_image->title) }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="order_no">{{ __('Order No') }}</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="{{ old('order_no', $event_image->order_no) }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if($event_image->image)
                                        <img src="{{ asset($event_image->image) }}" alt="Current Image" class="mt-2" style="max-width: 200px;">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" {{ old('status', $event_image->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $event_image->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection