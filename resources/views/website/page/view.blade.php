@php use Carbon\Carbon; @endphp
@extends('website.page.lending-layout')

@section('head')
    @php
        $tour = ucwords($event->title);
    @endphp
    <title>{{ $tour }}</title>
    <meta name="description"
        content="{{ $tour }} Tour 2024 | Free Workshops,  Transforming Lives for a better future.">
    <meta name="keywords" content="mhow, {{ $tour }}, Tour, {{ $tour }} Tour">
    <meta property="og:title" content="{{ $tour }} Tour">
    <meta property="og:site_name" content="{{ $tour }} Tour">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="{{ $tour }} Tour 2024 | Free Workshops,  Transforming Lives for a better future.">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $tour }} Tour">
    <meta name="twitter:description"
        content="{{ $tour }} Tour 2024 | Free Workshops,  Transforming Lives for a better future.">
@endsection

@section('content')
    <div class="l-contents__in">
        <div style="text-align: center; padding-top:10px; padding-bottom:10px">
            <a onclick="$([document.documentElement, document.body]).animate({scrollTop: $('#registration-form').offset().top}, 500);"
                style="color: white; font-size: 18px; font-weight: 900; cursor: pointer">
                @if ($event->page_top_text)
                    {{ $event->page_top_text }}
                @else
                    Register Now
                @endif
            </a>
        </div>

        <div class="c-section">
            <div class="c-section__content"
                style="display: flex; justify-content: center; flex-wrap: wrap; align-items: center; width: 100vw;padding: 0;">
                <img style="width: 100%;" src="{{ asset($event->banner_image) }}">
            </div>
        </div>

        <div class="c-section join-us-section" id="registration-form">
            <div class="c-section__content" style="max-width: 900px;text-align: center;">
                @if (request()->is('hijrah'))
                    <div style="display: flex; justify-content: center; padding-bottom:30px">
                        <a href="{{ route('front.donate.now') }}" class="btn-grad">
                            Donate Now
                        </a>
                    </div>
                @endif

                @if ($event->id == 0)
                    <h1 class="c-section__head title-2" style="font-size: 2.1rem;font-weight: bold;"> DONATE NOW:</h1>
                @else
                    <h1 class="c-section__head title-2" style="font-size: 2.1rem;font-weight: bold;">Sign Up for
                        Free:</h1>
                @endif
                <div>
                    @if ($event->page_form_detail)
                        {!! nl2br(e($event->page_form_detail)) !!}
                    @else
                        Ready to embark on this transformative adventure? Secure your spot by filling out the form next
                        to
                        this text. Don’t miss this opportunity to invest in yourself and cultivate lasting change.
                    @endif
                </div>

                @if ($event->id == 0)
                    <div style="min-height: 50vh">
                        <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
                        <stripe-pricing-table pricing-table-id="prctbl_1QSkh5LPKb8DimQY8QbXgknP"
                            publishable-key="pk_live_51IdcSqLPKb8DimQYujCZWtpkH48EJqj8EGS0T7VHZfSOdE3AurU37UQyPZGcOnv3ztoERxH2awgGtPX1wrJVuwCS006wblUReE">
                        </stripe-pricing-table>
                        <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
                        <stripe-pricing-table pricing-table-id="prctbl_1QZcGbLPKb8DimQY8tydNEv1"
                            publishable-key="pk_live_51IdcSqLPKb8DimQYujCZWtpkH48EJqj8EGS0T7VHZfSOdE3AurU37UQyPZGcOnv3ztoERxH2awgGtPX1wrJVuwCS006wblUReE">
                        </stripe-pricing-table>
                    </div>
                @else
                    <div>

                        <div id="newContent"
                            style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px;margin: 20px auto;">
                            <form id="dynamic-landing-submit" method="POST" action="{{ route('event.free.book') }}">
                                @csrf
                                <input type="hidden" value="{{ $event->id }}" name="event_id">
                                <div class="step_two">
                                    <h4>Registration Form</h4>

                                    @if (session()->has('success'))
                                        <div class="alert alert-success text-center"
                                            style="display: block; font-weight: bold;">
                                            <p>
                                                Thank You for registering to our {{ $event->title }} {{ now()->year }}.
                                                We will be in
                                                touch as soon as possible.
                                            </p>
                                        </div>
                                    @else
                                        <div class="p-detail">
                                            <div class="form-group required">
                                                <input required minlength="2" type="text" placeholder="Name"
                                                    class="form-control" value="{{ old('name') }}" name="name">

                                                @error('name')
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group required">
                                                <input required minlength="2" type="email" placeholder="Email Address"
                                                    class="form-control" value="{{ old('email') }}" name="email">

                                                @error('email')
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="form-group required">
                                                <input required minlength="2" type="text" placeholder="Phone Number"
                                                    class="form-control" value="{{ old('phone_no') }}" name="phone_no">

                                                @error('phone_no')
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group required">
                                                <select name="source" class="form-control" required>
                                                    <option disabled selected>Where did you hear about us?</option>
                                                    <option {{ old('source') === 'facebook' ? 'selected' : '' }}
                                                        value="facebook">
                                                        Facebook
                                                    </option>
                                                    <option {{ old('source') === 'instagram' ? 'selected' : '' }}
                                                        value="instagram">
                                                        Instagram
                                                    </option>
                                                    <option {{ old('source') === 'tiktok' ? 'selected' : '' }}
                                                        value="tiktok">
                                                        TikTok
                                                    </option>
                                                    <option {{ old('source') === 'youtube' ? 'selected' : '' }}
                                                        value="youtube">
                                                        YouTube
                                                    </option>
                                                    <option {{ old('source') === 'whatsapp' ? 'selected' : '' }}
                                                        value="whatsapp">
                                                        WhatsApp
                                                    </option>
                                                    <option {{ old('source') === 'email' ? 'selected' : '' }}
                                                        value="email">
                                                        Email
                                                    </option>
                                                </select>

                                                @error('source')
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group required">
                                                <select name="gender" class="form-control" required>
                                                    <option disabled selected>Select Gender</option>
                                                    <option {{ old('gender') === 'male' ? 'selected' : '' }}
                                                        value="male">
                                                        Male
                                                    </option>
                                                    <option {{ old('gender') === 'female' ? 'selected' : '' }}
                                                        value="female">
                                                        Female
                                                    </option>
                                                </select>
                                            </div>


                                            @if (!$event->eventTickets->isEmpty())
                                                <div class="form-group required">
                                                    <select name="ticket_id" class="form-control amount-select" required>
                                                        <option selected disabled>Select Ticket</option>
                                                        @foreach ($event->eventTickets as $ticket)
                                                            <option {{ $loop->first ? 'selected' : '' }}
                                                                value="{{ $ticket->id }}">
                                                                {{ ucwords($ticket->title) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                            @if (!$event->eventSchedules->where('status', 'active')->isEmpty())
                                                <div class="form-group required">
                                                    <select name="event_schedule_id" class="form-control amount-select"
                                                        required>
                                                        <option selected disabled>Select Event</option>
                                                        @foreach ($event->eventSchedules->where('status', 'active') as $schedule)
                                                            <option {{ $loop->first ? 'selected' : '' }}
                                                                value="{{ $schedule->id }}">
                                                                {{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }}
                                                                |
                                                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                                                                | {{ $schedule->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif


                                            @if (!empty($fields) && $fields->count())
                                                @foreach ($fields as $field)
                                                    <div class="form-group {{ $field->is_required ? 'required' : '' }}">
                                                        {{-- <label
                                                            for="extra_{{ $field->field_name }}">{{ $field->field_label }}</label> --}}
                                                        @if ($field->field_type === 'text')
                                                            <input type="text" id="extra_{{ $field->field_name }}"
                                                                name="extra[{{ $field->field_name }}]"
                                                                placeholder="{{ $field->placeholder }}"
                                                                class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                value="{{ old('extra.' . $field->field_name) }}"
                                                                {{ $field->is_required ? 'required' : '' }}>
                                                        @elseif ($field->field_type === 'number')
                                                            <input type="number" id="extra_{{ $field->field_name }}"
                                                                name="extra[{{ $field->field_name }}]"
                                                                placeholder="{{ $field->placeholder }}"
                                                                class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                value="{{ old('extra.' . $field->field_name) }}"
                                                                {{ $field->is_required ? 'required' : '' }}>
                                                        @elseif($field->field_type === 'textarea')
                                                            <textarea id="extra_{{ $field->field_name }}" name="extra[{{ $field->field_name }}]"
                                                                placeholder="{{ $field->placeholder }}"
                                                                class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                {{ $field->is_required ? 'required' : '' }}>{{ old('extra.' . $field->field_name) }}</textarea>
                                                        @elseif($field->field_type === 'select')
                                                            <select id="extra_{{ $field->field_name }}"
                                                                name="extra[{{ $field->field_name }}]"
                                                                class="form-control @error('extra.' . $field->field_name) is-invalid @enderror"
                                                                {{ $field->is_required ? 'required' : '' }}>
                                                                <option disabled selected>{{ $field->field_label }}
                                                                </option>
                                                                @foreach (explode(',', $field->field_options) as $option)
                                                                    <option value="{{ trim($option) }}"
                                                                        {{ old('extra.' . $field->field_name) == trim($option) ? 'selected' : '' }}>
                                                                        {{ ucwords(trim($option)) }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @endif

                                                        @error('extra.' . $field->field_name)
                                                            <p style="color: red;">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                @endforeach
                                            @endif


                                            @if ($event->show_countries == 'yes')
                                                @php
                                                    $countries = Illuminate\Support\Facades\DB::table(
                                                        'event_countries',
                                                    )->get();
                                                @endphp
                                                <div class="form-group required">
                                                    <select name="country" class="form-control amount-select" required>
                                                        <option selected disabled>Select Country</option>
                                                        @foreach ($countries as $country)
                                                            <option
                                                                {{ old('country') == $country->name ? 'selected' : '' }}
                                                                value="{{ $country->name }}">
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="btn_wrap">
                                            <button class="btn button-primary" id="stepTwoNext" type="submit"
                                                data-intent-url="#" style="border: none;">
                                                Submit <span aria-hidden="true" class="fas fa-angle-right"></span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>


                    </div>
                @endif
            </div>
        </div>
        @if (request()->is('eastafrica'))
            <div style="display: flex; flex-wrap: wrap;">
                <div style="flex: 1 1 25%;">
                    <img style="width: 100%;" src="{{ asset('website/assets/images/events') }}/eastafrica-event-1.webp">
                </div>
                <div style="flex: 1 1 25%;">
                    <img style="width: 100%;" src="{{ asset('website/assets/images/events') }}/eastafrica-event-2.webp">
                </div>
                <div style="flex: 1 1 25%;">
                    <img style="width: 100%;" src="{{ asset('website/assets/images/events') }}/eastafrica-event-3.webp">
                </div>
                <div style="flex: 1 1 25%;">
                    <img style="width: 100%;" src="{{ asset('website/assets/images/events') }}/eastafrica-event-4.jpeg">
                </div>
            </div>
        @endif

    </div>

    <div class="l-gf" style="padding-bottom: 0;padding-top: 0;">
        <div class="c-section__content">
            <div class="p-footer-copy">
                <div><small><strong>{{ $event->footer_text_1 }}</strong></small></div>
                <div><small>{{ $event->footer_text_2 }}</small></div>
            </div>
        </div>
    </div>
@endsection

@section('page-bottom')
    @if (session()->has('success') || $errors->isNotEmpty())
        <script>
            $([document.documentElement, document.body]).animate({
                scrollTop: $('#newContent').offset().top
            }, 2000);
        </script>
    @endif
@endsection
