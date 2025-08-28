@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Event Schedule')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')

        <div class="row">
            <div class="col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <form action="{{ route('admin.event.template.update', $email_template->id) }}" method="POST">
                            @csrf

                            {{-- Title --}}
                            <div class="form-group">
                                <label for="title">{{ __( 'Title') }} <span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title', $email_template->title) }}" required>
                            </div>

                            {{-- Subject --}}
                            <div class="form-group">
                                <label for="subject">{{ __('Email Subject') }} <span class="text-danger">*</span></label>
                                <input type="text" id="subject" name="subject" class="form-control"
                                    value="{{ old('subject', $email_template->subject) }}" required>
                            </div>

                            {{-- Body --}}
                            <div class="form-group">
                                <label for="body">{{ __('Email Body') }} <span class="text-danger">*</span></label>
                                <textarea id="body" name="body" rows="6" class="form-control summernote"
                                    placeholder="Use placeholders like @{{ name }}, @{{ amount }}, etc.">{{ old('body', $email_template->body) }}</textarea>
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="draft"
                                        {{ old('status', $email_template->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="active"
                                        {{ old('status', $email_template->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                </select>
                            </div>

                            {{-- Send Timing --}}
                            <div class="form-group">
                                <label for="send_timing">{{ __('Send Timing') }} <span class="text-danger">*</span></label>
                                <select name="send_timing" id="send_timing" class="form-control">
                                    <option value="after-registration"
                                        {{ old('send_timing', $email_template->send_timing) == 'after_registration' ? 'selected' : '' }}>After Registration</option>
                                    <option value="7-days-before"
                                        {{ old('send_timing', $email_template->send_timing) == '7_days_before' ? 'selected' : '' }}>7 Days Before</option>
                                    <option value="3-days-before"
                                        {{ old('send_timing', $email_template->send_timing) == '3_days_before' ? 'selected' : '' }}>3 Days Before</option>
                                    <option value="before-24-hours"
                                        {{ old('send_timing', $email_template->send_timing) == 'before_24_hours' ? 'selected' : '' }}>Before 24 Hours</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><b>{{ __('Notes') }}</b></h3>
                    </div>
                    @verbatim
                        <div class="card-body">
                            <p>You can use the following placeholders in the body of your email email_template:</p>
                            <ul>
                                <li><code>{{ name }}</code> – User Name</li>
                                <li><code>{{ title }}</code> – Event Title</li>
                                <li><code>{{ schedule }}</code> – Event Schedule</li>
                                <li><code>{{ start_date }}</code> – Start Date</li>
                                <li><code>{{ end_date }}</code> – End Date</li>
                                <li><code>{{ start_time }}</code> – Start Time</li>
                                <li><code>{{ venue }}</code> – Event Venue</li>
                                <li><code>{{ location }}</code> – Event Location</li>
                            </ul>
                            <p>These will be automatically replaced with actual donor information when the email is sent.</p>
                        </div>
                    @endverbatim

                </div>
            </div>
        </div>
    </section>

@endsection
