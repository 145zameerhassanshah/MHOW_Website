@php use Carbon\Carbon; @endphp
@extends('website.page.lending-layout')

@section('head')
    @php
        $tour = ucwords($event->title);
    @endphp
    <title>{{ $tour }}</title>
    <meta property="og:image" content="{{ $event->meta_image }}">
    <meta name="description" content="{{ $event->sub_title }} Project">
    <meta name="keywords" content="mhow, {{ $event->title }}, {{ $event->title }}">
    <meta property="og:title" content="{{ $event->title }} Project">
    <meta property="og:site_name" content="{{ $event->title }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $event->sub_title }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $event->title }}">
    <meta name="twitter:description" content="{{ $event->sub_title }}">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        .p-contents-header-mobile {
            display: none;
        }

        .c-section {
            margin-bottom: 0 !important;
        }

        .join-us-section {
            margin-bottom: 20px !important;
            margin-top: 20px !important;
        }

        #vimeo-player-first,
        #vimeo-player-second {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .video-title {
            padding-bottom: 20px;
            font-size: 2.1rem;
            font-weight: bold;
            text-align: center;
        }

        .video-title span {
            display: inline-block;
        }

        .donation-btn-wrapper {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            gap: 3%;
            font-size: 30px;
        }

        .donation-btn {
            max-width: 250px;
            max-height: 250px;
            aspect-ratio: 1;
            flex: 1 0 20%;
            color: black;
            font-weight: bold;
            border: none;
            background-color: #f9f6f7;
            border-radius: 30%;
            box-shadow: 5px 0px 29px black;
        }

        .donation-btn.active,
        .donation-btn:hover {
            background-color: yellow;
            color: darkred;
        }

        /* Stripe Elements */
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #fa755a;
            margin: 10px 0;
        }

        /* Loading Overlay */
        #loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 500px) {
            .donation-btn-wrapper {
                width: 98%;
                left: 1%;
                font-size: 17px;
            }
        }

        @media (max-width: 950px) {

            #vimeo-player-first,
            #vimeo-player-first iframe,
            #vimeo-player-second,
            #vimeo-player-second iframe {
                width: 100%;
                height: 100%;
            }

            .second-section {
                margin-top: 0;
            }

            .p-contents-header {
                display: none;
            }

            .p-contents-header-mobile {
                display: block;
            }
        }

        @media (max-width: 767px) {
            .c-section__content {
                padding: 0;
            }

            .join-us-section {
                padding: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="l-contents__in">
        <div style="text-align: center; padding-top:10px; padding-bottom:10px">
            <a class="ticket-btn js-scroll-item js-hover" href="#newContent"
                style="color: white; font-size: 18px; font-weight: 900; cursor: pointer; text-decoration: none">
                @if ($event->page_top_text)
                    {{ $event->page_top_text }}
                @else
                    Book Now
                @endif
            </a>
        </div>
    </div>

    <div class="c-section">
        <div class="c-section__content"
            style="display: flex; justify-content: center; flex-wrap: wrap; align-items: center; width: 100vw;padding: 0;">
            <img style="width: 100%;" src="{{ asset($event->banner_image) }}">
        </div>
    </div>

    @if (session()->has('payment-success'))
        <style>
            #newContent,
            .join-us-section .c-section__content {
                max-width: 100% !important;
            }
        </style>
    @endif

    <div class="c-section join-us-section">
        <div class="c-section__content" style="max-width: 900px;text-align: center;">
            @php
                $leastAmount = $tickets->first()->amount;
            @endphp

            @if (!session()->has('payment-success'))
                <h1 class="c-section__head title-2" style="font-size: 2.1rem;font-weight: bold; color: white">Book Now
                    <span class="donation-amount">£{{ $leastAmount }}</span>
                </h1>
                <div style="color: white">
                    {!! nl2br(e($event->page_form_detail)) !!}
                </div>
            @endif

            <div id="newContent" style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px;margin: 20px auto;">
                <form id="payment-form" action="{{ route('event.paid.book') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $event->id }}" name="event_id">

                    <div class="step_two">
                        @if (!session()->has('payment-success'))
                            <h4>Booking Form</h4>
                        @endif
                        <div class="alert alert-success"
                            style="text-align: left; display: {{ session()->has('payment-success') ? 'block' : 'none' }}">
                            <div>
                                Thank you for your booking, we appreciate your reservation, and we hope your
                                contribution towards this <strong>{{ $event->link_heading }} Project</strong> is a means
                                for
                                your salvation.
                            </div>

                            <div style="margin-top: 10px;">
                                <div>Kind Regards</div>
                                <div>House of Wisdom Team</div>
                            </div>
                        </div>

                        @if (session()->has('payment-success') && !empty($paymentData))
                            <div>
                                <script src="https://givematch.com/widget.js"></script>
                                <gm-share charity="muhammadiyah-house-of-wisdom-uk" currency="gbp"
                                    amount="{{ $paymentData['amount'] }}" firstName="{{ $paymentData['firstName'] }}"
                                    email="{{ $paymentData['email'] }}" mode="production"></gm-share>
                            </div>
                        @endif

                        <div class="p-detail" style="display: {{ session()->has('payment-success') ? 'none' : 'block' }};">

                            <div class="form-group required">
                                <input required minlength="2" type="text" placeholder="Name" class="form-control"
                                    value="{{ old('name') }}" name="name" id="cardholder-name">
                            </div>

                            <div class="form-group required">
                                <input required minlength="2" type="email" placeholder="Email" class="form-control"
                                    name="email" id="cardholder-email">
                            </div>

                            <div class="form-group required">
                                <input required minlength="2" type="text" placeholder="Phone Number"
                                    class="form-control" value="{{ old('phone_no') }}" name="phone_no">
                            </div>

                            <div class="form-group required">
                                <select name="gender" class="form-control" required>
                                    <option disabled selected>Select Gender</option>
                                    <option {{ old('gender') === 'male' ? 'selected' : '' }} value="male">
                                        Male
                                    </option>
                                    <option {{ old('gender') === 'female' ? 'selected' : '' }} value="female">
                                        Female
                                    </option>
                                </select>
                            </div>

                            <div class="form-group required">
                                <select name="source" class="form-control" required>
                                    <option disabled selected>Where did you hear about us?</option>
                                    <option {{ old('source') === 'facebook' ? 'selected' : '' }} value="facebook">
                                        Facebook
                                    </option>
                                    <option {{ old('source') === 'instagram' ? 'selected' : '' }} value="instagram">
                                        Instagram
                                    </option>
                                    <option {{ old('source') === 'tiktok' ? 'selected' : '' }} value="tiktok">
                                        TikTok
                                    </option>
                                    <option {{ old('source') === 'youtube' ? 'selected' : '' }} value="youtube">
                                        YouTube
                                    </option>
                                    <option {{ old('source') === 'whatsapp' ? 'selected' : '' }} value="whatsapp">
                                        WhatsApp
                                    </option>
                                    <option {{ old('source') === 'email' ? 'selected' : '' }} value="email">
                                        Email
                                    </option>
                                </select>

                                @error('source')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            @if (!$event->eventSchedules->where('status', 'active')->isEmpty())
                                <div class="form-group required">
                                    <select name="event_schedule_id" class="form-control amount-select" required>
                                        <option selected disabled>Select Event</option>
                                        @foreach ($event->eventSchedules->where('status', 'active') as $schedule)
                                            <option {{ $loop->first ? 'selected' : '' }} value="{{ $schedule->id }}">
                                                {{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }}
                                                |
                                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                                                | {{ $schedule->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif


                            <div class="form-group required">
                                <select name="ticket_id" class="form-control amount-select" required>
                                    <option disabled selected>Select Amount</option>
                                    @foreach ($tickets as $ticket)
                                        <option {{ $loop->first ? 'selected' : '' }} value="{{ $ticket->id }}">
                                            {{ ucwords($ticket->title) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if (!empty($fields) && $fields->count())
                                @foreach ($fields as $field)
                                    <div class="form-group {{ $field->is_required ? 'required' : '' }}">

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
                                                <option disabled selected>Select {{ $field->field_label }}
                                                </option>
                                                @foreach (explode(',', $field->field_options) as $option)
                                                    <option value="{{ trim($option) }}"
                                                        {{ old('extra.' . $field->field_name) == trim($option) ? 'selected' : '' }}>
                                                        {{ trim($option) }}
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
                                    $countries = Illuminate\Support\Facades\DB::table('event_countries')->get();
                                @endphp
                                <div class="form-group required">
                                    <select name="country" class="form-control amount-select" required>
                                        <option selected disabled>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option {{ old('country') == $country->name ? 'selected' : '' }}
                                                value="{{ $country->name }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group">
                                <div id="card-element" class="form-control">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>

                        <div class="btn_wrap"
                            style="display: {{ session()->has('payment-success') ? 'none' : 'block' }}">
                            <button class="btn button-primary" id="submit-button" type="submit" style="border: none;">
                                Book Now <span aria-hidden="true" class="fas fa-angle-right"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="l-gf" style="padding-bottom: 5px;padding-top: 5px; background-color: black">
        <div class="c-section__content">
            <div class="p-footer-copy">
                <div><small><strong>{{ $event->footer_text_1 }}</strong></small></div>
                <div><small>{{ $event->footer_text_2 }}</small></div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loading-overlay">
        <div class="spinner"></div>
    </div>
@endsection

@section('page-bottom')
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Create a Stripe client
        var stripe = Stripe('{{ config('services.stripe.key') }}');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {
            style: style
        });

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        var submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Show loading overlay
            document.getElementById('loading-overlay').style.display = 'flex';
            submitButton.disabled = true;

            // Get the cardholder name
            var cardholderName = document.getElementById('cardholder-name').value;

            stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    name: cardholderName,
                },
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer
                    Swal.fire({
                        icon: 'error',
                        title: 'Payment Error',
                        text: result.error.message,
                        confirmButtonColor: '#3085d6',
                    });
                    document.getElementById('loading-overlay').style.display = 'none';
                    submitButton.disabled = false;
                    return;
                }

                // Add the payment method ID to the form
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method_id');
                hiddenInput.setAttribute('value', result.paymentMethod.id);
                form.appendChild(hiddenInput);

                // Submit the form
                fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        if (data.error) {
                            throw new Error(data.message);
                        }

                        if (data.requires_action) {
                            // Handle 3D Secure authentication
                            return stripe.confirmCardPayment(data.payment_intent_client_secret);
                        }

                        if (data.success) {
                            // window.location.href = data.redirect_url;
                            $("#payment-form")[0].reset(); // Corrected syntax
                            card.clear();

                            Swal.fire({
                                icon: 'success',
                                title: 'Booking Done',
                                text: 'Successfully Booked. Check Your Email for Confirmation',
                                confirmButtonColor: '#3085d6',
                            })
                        }
                    })
                    .then(function(result) {
                        if (result && result.error) {
                            throw new Error(result.error.message);
                        }

                        if (result && result.paymentIntent.status === 'succeeded') {
                            // window.location.href = data.redirect_url;

                        }
                    })
                    .catch(function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Booking Failed',
                            text: error.message ||
                                'Failed to complete your booking. Please try again.',
                            confirmButtonColor: '#3085d6',
                        });
                    })
                    .finally(function() {
                        document.getElementById('loading-overlay').style.display = 'none';
                        submitButton.disabled = false;
                    });
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Booking Error',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#3085d6',
                });
            @endif

            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Error',
                    text: decodeURIComponent(urlParams.get('error')),
                    confirmButtonColor: '#3085d6',
                });
                // Clean the URL
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        });
    </script>
@endsection
