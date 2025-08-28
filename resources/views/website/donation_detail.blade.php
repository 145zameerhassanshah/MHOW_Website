@extends('website.layouts.master')
@section('title', 'Donate')
@section('content')
    <section class="contact-one contact-one--page">
        <div class="contact-one__shape" style="background-image: url(assets/images/shapes/contact-1-shape-2.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @php
                        use Illuminate\Support\Facades\Route;
                    @endphp
                    <form id="donationForm" class="contact-one__form form-one">
                        @csrf

                        <div class="text-center mb-4">
                            @if (Route::currentRouteName() != 'front.donate.now')
                                <h4>Donation Amount: ${{ number_format(request('donate_amount'), 2) }}</h4>
                            @else
                                <h4>Donate Now</h4>
                            @endif
                            {{-- <input type="hidden" name="amount" value="{{ request('donate_amount') }}"> --}}
                        </div>

                        <div class="form-one__group">
                            <!-- Name -->
                            <div class="form-one__control">
                                <input type="text" name="name" placeholder="Full Name" required
                                    value="{{ old('name') }}">
                                <div class="error-label" data-field="name"></div>
                            </div>

                            <!-- Email -->
                            <div class="form-one__control">
                                <input type="email" name="email" placeholder="Email Address" required
                                    value="{{ old('email') }}">
                                <div class="error-label" data-field="email"></div>
                            </div>

                            <!-- Phone No -->
                            <div class="form-one__control">
                                <input type="tel" name="phone_no" placeholder="Phone Number" required
                                    value="{{ old('phone_no') }}">
                                <div class="error-label" data-field="phone_no"></div>
                            </div>

                            <!-- City -->
                            <div class="form-one__control">
                                <input type="text" name="city" placeholder="City" required
                                    value="{{ old('city') }}">
                                <div class="error-label" data-field="city"></div>
                            </div>

                            <!-- Country -->
                            <div class="form-one__control">
                                <input type="text" name="country" placeholder="Country" required
                                    value="{{ old('country') }}">
                                <div class="error-label" data-field="country"></div>
                            </div>
                            <!-- Amount -->
                            <div class="form-one__control">
                                <input type="text" name="amount" placeholder="Amount" required
                                    value="{{ Route::currentRouteName() == 'front.donate.now' ? '' : request('donate_amount') }}"
                                    {{ Route::currentRouteName() == 'front.donate.now' ? '' : 'readonly' }}>
                                <div class="error-label" data-field="amount"></div>
                            </div>

                            <!-- Card Element -->
                            <div class="form-one__control form-one__control--full">
                                <label for="card-element" class="mb-2">
                                    Credit or debit card
                                </label>
                                <div id="card-element" class="form-control card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-one__control form-one__control--full mt-4">
                                <button type="submit" id="submitBtn" class="careox-btn">
                                    <span id="button-text">Pay Now</span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script>
        // Toastr configuration
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000"
        };

        // Initialize Stripe with your publishable key
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();

        // Card element styling
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

        // Create and mount the card element
        var card = elements.create('card', {
            style: style
        });
        card.mount('.card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission
        var form = document.getElementById('donationForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Disable submit button to prevent multiple submissions
            var submitBtn = document.getElementById('submitBtn');
            var buttonText = document.getElementById('button-text');
            var spinner = document.getElementById('spinner');

            submitBtn.disabled = true;
            buttonText.classList.add('d-none');
            spinner.classList.remove('d-none');

            // Create payment token
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Show errors to customer
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;

                    // Re-enable form submission
                    submitBtn.disabled = false;
                    buttonText.classList.remove('d-none');
                    spinner.classList.add('d-none');

                    // Show error toast
                    toastr.error(result.error.message, 'Payment Error');
                } else {
                    // Get form data
                    var formData = new FormData(form);
                    formData.append('stripeToken', result.token.id);

                    // Send AJAX request
                    $.ajax({
                        url: '{{ route('front.donate.store') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Show success toast
                            toastr.success(response.message || 'Donation successful!',
                                'Thank You');

                            // Reset form
                            form.reset();
                            card.clear();

                            // Re-enable button
                            submitBtn.disabled = false;
                            buttonText.classList.remove('d-none');
                            spinner.classList.add('d-none');
                        },
                        error: function(xhr) {
                            // Show error toast
                            var errorMessage = xhr.responseJSON && xhr.responseJSON.message ?
                                xhr.responseJSON.message :
                                'There was an error processing your payment. Please try again.';

                            toastr.error(errorMessage, 'Payment Error');

                            // Re-enable button
                            submitBtn.disabled = false;
                            buttonText.classList.remove('d-none');
                            spinner.classList.add('d-none');
                        }
                    });
                }
            });
        });
    </script>
@endsection
