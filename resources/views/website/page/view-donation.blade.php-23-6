@php use Carbon\Carbon; @endphp
@extends('website.page.landing-layout')

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
            <img style="width: 100%;" src="{{ asset($event->image) }}">
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
                <form action="{{ route('event.paid.book') }}" method="post">
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
                                    value="{{ old('name') }}" name="name">
                            </div>

                            <div class="form-group required">
                                <input required minlength="2" type="email" placeholder="Email" class="form-control"
                                    name="email">
                            </div>

                            <div class="form-group required">
                                <input required minlength="2" type="text" placeholder="Phone Number"
                                    class="form-control" value="{{ old('phone_no') }}" name="phone_no">
                            </div>

                            {{-- <div class="form-group required">
                                <select name="referral_source" class="form-control" required>
                                    <option disabled selected>Where did you hear about us?</option>
                                    <option {{ old('referral_source') === 'facebook' ? 'selected' : '' }} value="facebook">
                                        Facebook
                                    </option>
                                    <option {{ old('referral_source') === 'instagram' ? 'selected' : '' }}
                                        value="instagram">
                                        Instagram
                                    </option>
                                    <option {{ old('referral_source') === 'tiktok' ? 'selected' : '' }} value="tiktok">
                                        TikTok
                                    </option>
                                    <option {{ old('referral_source') === 'youtube' ? 'selected' : '' }} value="youtube">
                                        YouTube
                                    </option>
                                    <option {{ old('referral_source') === 'whatsapp' ? 'selected' : '' }} value="whatsapp">
                                        WhatsApp
                                    </option>
                                    <option {{ old('referral_source') === 'email' ? 'selected' : '' }} value="email">
                                        Email
                                    </option>
                                </select>
                            </div> --}}

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
                                <select name="ticket_id" class="form-control amount-select" required>
                                    <option disabled selected>Select Amount</option>
                                    @foreach ($tickets as $ticket)
                                        <option {{ $loop->first ? 'selected' : '' }} value="{{ $ticket->id }}">
                                            {{ ucwords($ticket->title) }} | £{{ $ticket->amount }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div id="card-element" style="height: auto;" class="form-control">
                                </div>
                            </div>

                            <div class="alert alert-danger text-center error" style="display: none;"></div>

                            <div class='form-row row'>
                                <div class='col-md-12 hide form-group'>
                                    <div class='alert-danger alert text-center'>Fix the errors before you begin.</div>
                                </div>
                            </div>
                        </div>

                        <div class="btn_wrap"
                            style="display: {{ session()->has('payment-success') ? 'none' : 'block' }}">
                            <button class="btn button-primary" id="stepTwoNext" type="submit" style="border: none;">
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
@endsection

@section('page-bottom')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const form = document.getElementById('payment-form');
    const submitButton = document.getElementById('submit-button');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        submitButton.disabled = true;

        // Create payment method
        const { paymentMethod, error } = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
            billing_details: {
                name: form.querySelector('input[name="name"]').value,
                email: form.querySelector('input[name="email"]').value,
            },
        });

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            submitButton.disabled = false;
            return;
        }

        // Add payment method to form
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method_id');
        hiddenInput.setAttribute('value', paymentMethod.id);
        form.appendChild(hiddenInput);

        // Submit form
        const response = await fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const result = await response.json();

        if (result.requires_action) {
            // Handle 3D Secure
            const { error: confirmError } = await stripe.confirmCardPayment(
                result.payment_intent_client_secret
            );

            if (confirmError) {
                document.getElementById('card-errors').textContent = confirmError.message;
                submitButton.disabled = false;
                return;
            }

            // If we get here, payment succeeded after 3D Secure
            window.location.href = form.action;
        } else if (response.ok) {
            // Redirect happens from server
            window.location.href = response.url;
        } else {
            // Handle errors
            const errorData = await response.json();
            document.getElementById('card-errors').textContent = errorData.message || 'Payment failed';
            submitButton.disabled = false;
        }
    });
</script>
@endsection