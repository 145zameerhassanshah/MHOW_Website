@extends('admin.layouts.master')
@section('title', 'Edit Event')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Edit Event</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.event.update', $event->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $event->title }}" required>
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sub Title -->
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title"
                                    value="{{ $event->sub_title }}">
                                @error('sub_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sub Title -->
                            <div class="form-group">
                                <label for="page_top_text">Page Top Text</label>
                                <input type="text" class="form-control" id="page_top_text" name="page_top_text"
                                    value="{{ $event->page_top_text }}">
                                @error('page_top_text')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sub Title -->
                            <div class="form-group">
                                <label for="footer_text_1">Footer Text 1</label>
                                <input type="text" class="form-control" id="footer_text_1" name="footer_text_1"
                                    value="{{ $event->footer_text_1 }}">
                                @error('footer_text_1')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Sub Title -->
                            <div class="form-group">
                                <label for="footer_text_2">Footer Text 2</label>
                                <input type="text" class="form-control" id="footer_text_2" name="footer_text_2"
                                    value="{{ $event->footer_text_2 }}">
                                @error('footer_text_2')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Event Type -->
                            <div class="form-group">
                                <label for="event_type">Event Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="event_type" name="event_type" required>
                                    <option value="free" {{ $event->event_type == 'free' ? 'selected' : '' }}>Free
                                    </option>
                                    <option value="paid" {{ $event->event_type == 'paid' ? 'selected' : '' }}>Paid
                                    </option>
                                    <option value="paid" {{ $event->event_type == 'subscription' ? 'selected' : '' }}>
                                        Subscription
                                    </option>
                                </select>
                                @error('event_type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- page type -->
                            <div class="form-group">
                                <label for="page_type">Page Type <span class="text-danger">*</span></label>
                                <select id="page_type" name="page_type" class="form-control" required>
                                    <option value="lending" {{ $event->page_type == 'lending' ? 'selected' : '' }}>Landing
                                    </option>
                                    <option value="charity" {{ $event->page_type == 'charity' ? 'selected' : '' }}>
                                        Charity</option>
                                </select>
                                @error('page_type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- page type -->
                            <div class="form-group">
                                <label for="show_countries">Show Countries <span class="text-danger">*</span></label>
                                <select id="show_countries" name="show_countries" class="form-control" required>
                                    <option value="yes" {{ $event->show_countries == 'yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="no" {{ $event->show_countries == 'no' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                                @error('show_countries')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Slug -->
                            <div class="form-group">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ $event->slug }}" required>
                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $event->description }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="page_form_detail">Page Form Detail</label>
                                <textarea class="form-control" id="page_form_detail" name="page_form_detail" rows="3">{{ $event->page_form_detail }}</textarea>
                                @error('page_form_detail')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Event Detail -->
                            <div class="form-group">
                                <label for="event_detail">Event Detail</label>
                                <textarea class="form-control" id="event_detail" name="event_detail" rows="4">{{ $event->event_detail }}</textarea>
                                @error('event_detail')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Order No -->
                            <div class="form-group">
                                <label for="order_no">Order Number</label>
                                <input type="number" class="form-control" id="order_no" name="order_no"
                                    value="{{ $event->order_no }}">
                                @error('order_no')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="active" {{ $event->status == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ $event->status == 'inactive' ? 'selected' : '' }}>
                                        InActive</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Dates -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="s_date">Start Date</label>
                                        <input type="date" class="form-control" id="s_date" name="start_date"
                                            value="{{ $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('Y-m-d') : '' }}">
                                        @error('start_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date"
                                            value="{{ $event->end_date ? \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') : '' }}">
                                        @error('end_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Venue -->
                            <div class="form-group">
                                <label for="venue">Venue</label>
                                <input type="text" class="form-control" id="venue" name="venue"
                                    value="{{ $event->venue }}">
                                @error('venue')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ $event->location }}">
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Contact No -->
                            <div class="form-group">
                                <label for="contact_no">Contact No</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no"
                                    value="{{ $event->contact_no }}">
                                @error('contact_no')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Admin Emails -->
                            <div class="form-group">
                                <label for="admin_emails">{{ __('Admin Emails') }} <span class="text-danger">
                                        *</span></label>
                                <input type="text" id="admin_emails" class="form-control" data-role="tagsinput"
                                    name="admin_emails" value="{{ $event->admin_emails ?? old('admin_emails') }}" required>
                                @if ($errors->has('admin_emails'))
                                    <p class="text-danger"> {{ $errors->first('admin_emails') }} </p>
                                @endif
                            </div>

                            <!-- Marketing Emails -->
                            <div class="form-group">
                                <label for="marketing_emails">{{ __('Marketing Emails') }}</label>
                                <input type="text" id="marketing_emails" class="form-control" data-role="tagsinput"
                                    name="marketing_emails" value="{{ $event->marketing_emails ?? old('marketing_emails') }}">
                                @if ($errors->has('marketing_emails'))
                                    <p class="text-danger"> {{ $errors->first('marketing_emails') }} </p>
                                @endif
                            </div>

                            <!-- Images -->
                            <div class="row">
                                <!-- Image -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image </label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($event->image)
                                            <img src="{{ asset($event->image) }}" class="img-fluid mt-2" width="120">
                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Banner Image -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="banner_image">Banner Image </label>
                                        <input type="file" class="form-control" id="banner_image"
                                            name="banner_image">
                                        @if ($event->banner_image)
                                            <img src="{{ asset($event->banner_image) }}" class="img-fluid mt-2"
                                                width="120">
                                        @endif
                                        @error('banner_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Sub Title -->
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title"
                                    value="{{ $event->meta_title }}">
                                @error('meta_title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="meta_keywords">{{ __('Meta Keywords') }}</label>
                                <div class="col">
                                    <input type="text" id="meta_keywords" class="form-control" data-role="tagsinput"
                                        name="meta_keywords" placeholder="{{ __('Meta Keywords') }}"
                                        value="{{ old('meta_keywords') ?? $event->meta_keywords }}">
                                    @if ($errors->has('meta_keywords'))
                                        <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Event Detail -->
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="4">{{ $event->meta_description }}</textarea>
                                @error('meta_description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="meta_image">Meta Image</label>
                                <input type="file" class="form-control" id="meta_image" name="meta_image">
                                @if ($event->meta_image)
                                    <img src="{{ asset($event->meta_image) }}" class="img-fluid mt-2" width="120">
                                @endif
                                @error('meta_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Submit -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Event</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
