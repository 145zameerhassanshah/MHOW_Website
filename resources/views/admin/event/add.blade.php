@extends('admin.layouts.master')
@section('title', 'Add New Event')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Add Event</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="form-group">
                                    <label for="sub_title">Subtitle</label>
                                    <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title') }}">
                                </div>

                                <!-- Subtitle -->
                                <div class="form-group">
                                    <label for="page_top_text">Page Top Text</label>
                                    <input type="text" class="form-control" id="page_top_text" name="page_top_text" value="{{ old('page_top_text') }}">
                                </div>

                                <!-- Subtitle -->
                                <div class="form-group">
                                    <label for="footer_text_1">Footer Text 1</label>
                                    <input type="text" class="form-control" id="footer_text_1" name="footer_text_1" value="{{ old('footer_text_1') }}">
                                </div>

                                <!-- Subtitle -->
                                <div class="form-group">
                                    <label for="footer_text_2">Footer Text 2</label>
                                    <input type="text" class="form-control" id="footer_text_2" name="footer_text_2" value="{{ old('footer_text_2') }}">
                                </div>

                                <!-- Event Type -->
                                <div class="form-group">
                                    <label for="event_type">Event Type <span class="text-danger">*</span></label>
                                    <select class="form-control" id="event_type" name="event_type" required>
                                        <option value="free">Free</option>
                                        <option value="paid">Paid</option>
                                        <option value="subscription">Subscription</option>
                                    </select>
                                    @error('event_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- page type -->
                                <div class="form-group">
                                    <label for="page_type">Page Type <span class="text-danger">*</span></label>
                                    <select class="form-control" id="page_type" name="page_type" required>
                                        <option value="lending">Landing</option>
                                        <option value="charity">Charity</option>
                                    </select>
                                    @error('page_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- page type -->
                                <div class="form-group">
                                    <label for="show_countries">Show Countries <span class="text-danger">*</span></label>
                                    <select id="show_countries" name="show_countries" class="form-control" required>
                                        <option value="yes">Yes
                                        </option>
                                        <option value="no">
                                            No</option>
                                    </select>
                                    @error('show_countries')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>



                                <!-- Slug -->
                                <div class="form-group">
                                    <label for="slug">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{!! old('description') !!}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Page Form Detail -->
                                <div class="form-group">
                                    <label for="description">Page Form Detail </label>
                                    <textarea class="form-control" id="page_form_detail" name="page_form_detail" rows="3">{!! old('page_form_detail') !!}</textarea>
                                    @error('page_form_detail')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Event Detail -->
                                <div class="form-group">
                                    <label for="event_detail">Event Detail <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="event_detail" name="event_detail" rows="5" required>{!! old('event_detail') !!}</textarea>
                                    @error('event_detail')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Order Number -->
                                <div class="form-group">
                                    <label for="order_no">Order Number</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="{{ old('title') ?? 1 }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Start Date -->
                                <div class="form-group">
                                    <label for="s_date">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="s_date" name="start_date"
                                        required value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="form-group">
                                    <label for="end_date">End Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Venue -->
                                <div class="form-group">
                                    <label for="venue">Venue</label>
                                    <input type="text" class="form-control" id="venue" name="venue" value="{{ old('venue') }}">
                                    @error('venue')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Contact No -->
                                <div class="form-group">
                                    <label for="contact_no">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{ old('contact_no') }}">
                                    @error('contact_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Admin Emails -->
                                <div class="form-group">
                                    <label for="admin_emails">{{ __('Admin Emails') }} <span class="text-danger">
                                        *</span></label>
                                    <input type="text" id="admin_emails" class="form-control" data-role="tagsinput"
                                        name="admin_emails" value="{{ old('admin_emails') }}" required>
                                    @if ($errors->has('admin_emails'))
                                        <p class="text-danger"> {{ $errors->first('admin_emails') }} </p>
                                    @endif
                                </div>

                                <!-- Marketing Emails -->
                                <div class="form-group">
                                    <label for="marketing_emails">{{ __('Marketing Emails') }}</label>
                                    <input type="text" id="marketing_emails" class="form-control" data-role="tagsinput"
                                        name="marketing_emails" value="{{ old('marketing_emails') }}">
                                    @if ($errors->has('marketing_emails'))
                                        <p class="text-danger"> {{ $errors->first('marketing_emails') }} </p>
                                    @endif
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="image">Event Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Banner Image -->
                                <div class="form-group">
                                    <label for="banner_image">Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="banner_image" name="banner_image" required>
                                    @error('banner_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                    @error('meta_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_tags">{{ __('Meta Keywords') }}</label>
                                    <input type="text" id="meta_tags" class="form-control" data-role="tagsinput"
                                        name="meta_keywords" value="{{ old('meta_keyword') }}">
                                    @if ($errors->has('meta_keyword'))
                                        <p class="text-danger"> {{ $errors->first('meta_keyword') }} </p>
                                    @endif
                                </div>

                                <!-- Event Detail -->
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="5">{!! old('meta_description') !!}</textarea>
                                    @error('meta_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="form-group">
                                    <label for="meta_image">Meta Image</label>
                                    <input type="file" class="form-control" id="meta_image" name="meta_image">
                                    @error('meta_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Event</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
