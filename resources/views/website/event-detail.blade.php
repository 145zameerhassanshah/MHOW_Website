@extends('website.layouts.master')
@section('title', $event->title)

@section('content')

    <!-- main-slider-end -->
    <section class="page-header">
        <div class="page-header__bg">
            <img src="{{ asset($event->banner_image) }}" alt="" width="1920px" height="500px">
        </div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-left">{{ $event->title }}</h2>
            <ul class="careox-breadcrumb list-unstyled">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><span>Event Detail</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->









    <section class="event-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="event-details__content">
                        <div class="event-details__image">
                            <img src="{{ asset($event->image) }}" alt="careox">
                        </div>
                        <h3 class="event-details__title">{{ $event->sub_title }}</h3>
                        <p class="event-details__text">
                            {{ $event->description }}
                        </p>
                        <p class="event-details__text">
                            {{ $event->event_detail }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="event-details__info">
                        <ul class="event-details__info__list">
                            <li>Start Date: <span>{{ \Carbon\Carbon::parse($event->start_date)->format('d M, Y') }}</span>
                            </li>
                            <li>End Date: <span>{{ \Carbon\Carbon::parse($event->end_date)->format('d M, Y') }}</span></li>
                            <li>Contact No: <span>{{ $event->contact_no }}</span></li>
                            <li>Email: <span>{{ $event->email }}</span></li>
                            <li>Venue: <span>{{ $event->venue }}</span></li>
                            <li>Location: <span>{{ $event->location }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="testimonials-one">
        <div class="testimonials-one__bg" style="background-image: url(assets/images/shapes/testimonial-bg-1.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sec-title text-left">
                        <h6 class="sec-title__tagline bw-split-in-right">
                            <span class="sec-title__tagline__border"></span>
                            Event Schedules
                        </h6>
                        <h3 class="sec-title__title bw-split-in-left">
                            What’s Happening <br> During This Event?
                        </h3>
                    </div>
                    <p class="testimonials-one__text">
                        Explore the schedule of exciting sessions, keynotes, and interactive activities planned<br>
                        for this event.
                    </p>
                    <ul class="testimonials-one__image careox-slick__carousel"
                        data-slick-options='{
                                "slidesToShow": 3,
                                "slidesToScroll": 1,
                                "autoplay": true,
                                "centerMode": true,
                                "asNavFor": ".testimonials-one__carousel",
                                "focusOnSelect": true,
                                "dots": false,
                                "centerPadding": 0,
                                "arrows": true,
                                "nextArrow": "<button class=\"next\"><i class=\"icon-right-arrow-two1\"></i></button>",
                                "prevArrow": "<button class=\"prev\"><i class=\"icon-right-arrow-two\"></i></button>"
                            }'>
                        @foreach ($event->eventSchedules as $index => $schedule)
                            <li role="presentation">
                                <div class="testimonials-one__image__item"
                                    style="--accent-color: #{{ ['ffa415', 'fc5528', '8139e7', '44c895'][$index % 4] }};">
                                    <img src="{{ asset('assets/images/resources/event-icon.png') }}">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-6">
                    <div class="testimonials-one__wrapper"
                        style="background-image: url(assets/images/resources/testimonail-1-bg.jpg);">
                        <div class="testimonials-one__carousel careox-slick__carousel"
                            data-slick-options='{
                                    "slidesToShow": 2,
                                    "slidesToScroll": 1,
                                    "vertical": true,
                                    "asNavFor": ".testimonials-one__image",
                                    "autoplay": true,
                                    "dots": false,
                                    "centerPadding": 0,
                                    "arrows": false,
                                    "responsive": [
                                        {
                                            "breakpoint": 992,
                                            "settings": {
                                                "slidesToShow": 1,
                                                "vertical": false,
                                                "slidesToScroll": 1
                                            }
                                        }
                                    ]
                                 }'>
                            @foreach ($event->eventSchedules as $index => $schedule)
                                <div class="item">
                                    <div class="testimonials-card"
                                        style="--accent-color: #{{ ['ffa415', 'fc5528', '8139e7', '44c895'][$index % 4] }};">
                                        <div class="testimonials-card__image">
                                            <img src="{{ asset('assets/images/resources/event-icon.png') }}">
                                        </div>
                                        <div class="testimonials-card__rating">
                                            <i class="icofont-calendar"></i>
                                            {{ \Carbon\Carbon::parse($schedule->date)->format('M d, Y') }}
                                        </div>
                                        <div class="testimonials-card__content">
                                            <strong>{{ $schedule->title }}</strong><br>
                                            {{ $schedule->description }}
                                        </div>
                                        <h3 class="testimonials-card__name">
                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                                            -
                                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                        </h3>
                                        <p class="testimonials-card__designation">Session Time</p>
                                        <div class="testimonials-card__quote">
                                            <i class="icofont-clock-time"></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- /.testimonials-one__carousel -->
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="gallery-one">
        <div class="container-fluid">
            <div class="col-12">
                <div class="sec-title text-center">
                    <h3 class="sec-title__title bw-split-in-left">
                        Event Images
                    </h3>
                </div>
            </div>
            <div class="row masonry-layout">
                @foreach ($event->eventImages as $image)
                    <div class="col-md-6 col-lg-3">
                        <div class="gallery-one__card">
                            <img src="{{ asset($image->image) }}" alt="">
                            <div class="gallery-one__card__hover">
                                <a href="{{ asset($image->image) }}" class="img-popup">
                                    <span class="gallery-one__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-one__card__hover -->
                        </div><!-- /.gallery-one__card -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <div class="container my-3">
        <div class="row">
            <form action="{{ route('front.donate') }}" class="donate-page__form">
                @foreach ($donation_forms as $form)
                    <div class="col-12 mb-2">
                        
                        <div class="donate-page__form__amount">
                            <span class="donate-page__form__amount__sign">$</span>
                            <input type="text" value="300" name="donate_amount" id="donate_amount"
                                placeholder="Amount" class="donate-page__form__amount__input">
                                <input type="hidden" value="{{$event->id}}" name="event_id" id="donate_amount"
                                placeholder="Amount" class="donate-page__form__amount__input">
                        </div><!-- /.donate-page__form__amount__box -->
                        <div class="donate-page__form__buttons justify-space-between mb-4">
                            @foreach ($form->amounts as $amount)
                                <button type="button" class="donate-page__form__buttons__item">$<span
                                        class="donate-page__form__buttons__amount">{{ $amount->amount }}</span></button>
                            @endforeach
                            <button type="button" class="donate-page__form__buttons__item active">Custom Amount</button>
                        </div><!-- /.donate-page__form__amount__buttons -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="careox-btn"><span>Donate Now</span></button>
                        </div>

                    </div>
                @endforeach
            </form>
        </div>
    </div>

    <section class="contact-one contact-one--page">
        <div class="contact-one__shape" style="background-image: url(assets/images/shapes/contact-1-shape-2.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <form id="eventForm" class="contact-one__form form-one" action="{{ route('front.event.book') }}"
                        method="POST">
                        @csrf

                        <h1>{{ $event->event_type == 'paid' ? 'Reserve Your Ticket' : 'Book Now for Free!' }}</h1>
                        <p class="contact-one__text">
                            Please fill the form below to complete your reservation.
                        </p>

                        <div class="form-one__group">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="event_type" value="{{ $event->event_type }}">

                            <!-- Name -->
                            <div
                                class="form-one__control {{ $event->event_type == 'free' ? 'form-one__control--full' : '' }}">
                                <input type="text" name="name" placeholder="Your Name" required>
                                <div class="error-label" data-field="name"></div>
                            </div>

                            <!-- Email -->
                            <div class="form-one__control">
                                <input type="email" name="email" placeholder="Email Address" required>
                                <div class="error-label" data-field="email"></div>
                            </div>

                            <!-- Phone No -->
                            <div class="form-one__control">
                                <input type="tel" name="phone_no" placeholder="Phone No" required>
                                <div class="error-label" data-field="phone_no"></div>
                            </div>

                            <!-- Gender -->
                            <div class="form-one__control">
                                <div class="form-one__control__select">
                                    <select name="gender" required class="selectpicker">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="error-label" data-field="gender"></div>
                                </div>
                            </div>

                            @if ($event->event_type == 'paid')
                                <!-- Ticket Selection -->
                                <div class="form-one__control">
                                    <div class="form-one__control__select">
                                        <select name="ticket_id" class="selectpicker" required>
                                            <option value="">Select Ticket</option>
                                            @foreach ($tickets as $ticket)
                                                <option value="{{ $ticket->id }}" data-amount="{{ $ticket->amount }}">
                                                    {{ $ticket->title }} - ${{ $ticket->amount }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="error-label" data-field="ticket_id"></div>
                                    </div>
                                </div>

                                <!-- Payment Section -->
                                <div class="form-one__control form-one__control--full">
                                    <label>Payment Details</label>
                                    <div id="card-element" class="stripe-card-element">
                                        <!-- Stripe Card Element will be inserted here -->
                                    </div>
                                    <div id="card-errors" class="error-label" role="alert"></div>
                                </div>
                            @endif

                            {{-- <!-- Campaign -->
                            <div class="form-one__control">
                                <div class="form-one__control__select">
                                    <select name="campaign_id" class="selectpicker" required>
                                        <option value="">Select Campaign</option>
                                        @foreach ($campaigns as $campaign)
                                        <option value="{{ $campaign->id }}">{{ $campaign->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-label" data-field="campaign_id"></div>
                                </div>
                            </div> --}}

                            <!-- Submit Button -->
                            <div class="form-one__control form-one__control--full">
                                <button type="submit" id="submitBtn" class="careox-btn">
                                    <span>{{ $event->event_type == 'paid' ? 'Pay Now' : 'Book Now' }}</span>
                                    <span id="spinner" class="d-none"><i class="fas fa-spinner fa-spin"></i>
                                        Processing...</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function() {

            @if ($event->event_type == 'paid')
                const stripe = Stripe('{{ env('STRIPE_KEY') }}');
                const elements = stripe.elements();
                const cardElement = elements.create('card', {
                    style: {
                        base: {
                            fontSize: '16px',
                            color: '#32325d',
                        }
                    }
                });

                cardElement.mount('#card-element');

                // Handle real-time validation errors
                cardElement.addEventListener('change', function(event) {
                    const displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                        displayError.style.display = 'block';
                    } else {
                        displayError.textContent = '';
                        displayError.style.display = 'none';
                    }
                });
            @endif

            $('#eventForm').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                const submitBtn = $('#submitBtn');
                const spinner = $('#spinner');

                // Reset errors
                $('.error-label').text('').css('display', 'none');

                // Show loading state
                submitBtn.prop('disabled', true);
                spinner.removeClass('d-none');
                @if ($event->event_type == 'free')
                    submitForm();
                    return;
                @endif

                stripe.createToken(cardElement).then(function(result) {
                    if (result.error) {
                        // Show errors
                        $('#card-errors').text(result.error.message).css('display', 'block');
                        submitBtn.prop('disabled', false);
                        spinner.addClass('d-none');
                    } else {
                        // Add the token to the form
                        $('<input>')
                            .attr({
                                type: 'hidden',
                                name: 'stripeToken',
                                value: result.token.id
                            })
                            .appendTo(form);

                        // Submit the form
                        submitForm();
                    }
                });
            });

            function submitForm() {
                const formData = new FormData($('#eventForm')[0]);

                $.ajax({
                    url: $('#eventForm').attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#spinner').addClass('d-none');
                            toastr.success(response.message, 'Success');
                            $('#eventForm')[0].reset();
                            card.clear();
                        }
                    },
                    error: function(xhr) {
                        $('#submitBtn').prop('disabled', false);
                        $('#spinner').addClass('d-none');

                        if (xhr.status === 422) {
                            // Validation errors
                            let errors = xhr.responseJSON.errors;
                            for (let field in errors) {
                                $(`.error-label[data-field="${field}"]`)
                                    .text(errors[field][0])
                                    .css('display', 'block');
                            }
                        } else {
                            alert('Something went wrong. Please try again.');
                        }
                    }
                });
            }
        });
    </script>
@endsection
