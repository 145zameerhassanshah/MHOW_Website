<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Monthly Donation</title>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    .donation-option { transition: all 0.3s ease; }
    .donation-option:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
    .donation-option.selected { border-color: #3b82f6; background: #eff6ff; }
    #card-element { border: 1px solid #d1d5db; border-radius: 8px; padding: 12px; background: white; }
    .spinner { animation: spin 1s linear infinite; }
    @keyframes spin { to { transform: rotate(360deg); } }
  </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
  <div id="app" class="w-full max-w-2xl">
    @if(session('error'))
      <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
        {{ session('error') }}
      </div>
    @endif

    <!-- Step 1: Amount selection -->
    <div id="amount-selection" class="bg-white shadow rounded-xl p-8">
      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold">Support Our Mission</h1>
        <p class="text-lg text-gray-600 mt-2">Choose your monthly donation</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        @foreach([20 => 'Basic supporter', 50 => 'Premium supporter', 100 => 'Champion supporter'] as $amount => $label)
          <div class="donation-option p-6 border-2 border-gray-200 rounded-lg cursor-pointer text-center" data-amount="{{ $amount }}">
            <div class="text-2xl font-bold">£{{ $amount }}</div>
            <p class="mt-2 text-gray-600">per month</p>
            <div class="mt-4 text-sm text-gray-500">
              <i class="fas fa-check-circle text-blue-500 mr-1"></i> {{ $label }}
            </div>
          </div>
        @endforeach
      </div>
      <button id="continue-btn" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg disabled:opacity-50 disabled:cursor-not-allowed" disabled>
        Continue to Payment <i class="fas fa-arrow-right ml-2"></i>
      </button>
    </div>

    <!-- Step 2: Payment form -->
    <div id="payment-section" class="hidden bg-white shadow rounded-xl p-8">
      <div class="mb-8 text-center relative">
        <button id="back-btn" class="absolute left-0 top-0 text-blue-600 hover:text-blue-800">
          <i class="fas fa-arrow-left mr-1"></i> Back
        </button>
        <h2 class="text-2xl font-bold">Complete Your Donation</h2>
        <p class="mt-2 text-blue-600">£<span id="selected-amount">20</span> per month</p>
      </div>
      <form id="payment-form">
        @csrf
        <input type="hidden" id="donation-amount" name="amount" value="20">

        <div class="mb-6">
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
          <input type="email" id="email" name="email" required class="w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-6">
          <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full name</label>
          <input type="text" id="name" name="name" required class="w-full px-3 py-2 border rounded-md focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div class="mb-6">
          <label class="block text-sm font-medium text-gray-700 mb-1">Card details</label>
          <div id="card-element"></div>
          <div id="card-errors" class="mt-2 text-sm text-red-500"></div>
        </div>

        <button type="submit" id="submit-btn" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg flex justify-center">
          <span id="button-text">Subscribe Now</span>
          <span id="button-spinner" class="hidden ml-2"><i class="fas fa-circle-notch spinner"></i></span>
        </button>

        <p class="mt-4 text-center text-sm text-gray-500">
          You'll be charged £<span id="confirm-amount">20</span> every month until you cancel.
          <br/>You can cancel anytime.
        </p>
      </form>
    </div>
  </div>

  <script>
    const stripe = Stripe('{{ config("services.stripe.key") }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    let selectedAmount = 20;
    const options = document.querySelectorAll('.donation-option');

    options.forEach(opt => {
      opt.addEventListener('click', () => {
        options.forEach(o => o.classList.remove('selected', 'border-blue-500', 'bg-blue-50'));
        opt.classList.add('selected', 'border-blue-500', 'bg-blue-50');
        selectedAmount = opt.dataset.amount;
        document.getElementById('continue-btn').disabled = false;
      });
    });

    document.getElementById('continue-btn').addEventListener('click', () => {
      document.getElementById('amount-selection').classList.add('hidden');
      document.getElementById('payment-section').classList.remove('hidden');
      document.querySelectorAll('#selected-amount, #confirm-amount, #donation-amount').forEach(el => {
        el.textContent = selectedAmount;
        if (el.tagName === 'INPUT') el.value = selectedAmount;
      });
    });

    document.getElementById('back-btn').addEventListener('click', () => {
      document.getElementById('payment-section').classList.add('hidden');
      document.getElementById('amount-selection').classList.remove('hidden');
    });

    document.getElementById('payment-form').addEventListener('submit', async e => {
      e.preventDefault();
      const submitBtn = document.getElementById('submit-btn');
      submitBtn.disabled = true;
      document.getElementById('button-text').textContent = 'Processing...';
      document.getElementById('button-spinner').classList.remove('hidden');
      document.getElementById('card-errors').textContent = '';

      try {
        const { paymentMethod, error } = await stripe.createPaymentMethod({
          type: 'card',
          card: cardElement,
          billing_details: {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value
          }
        });
        if (error) throw error;

        const formData = new FormData();
        formData.append('amount', selectedAmount);
        formData.append('name', document.getElementById('name').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('payment_method_id', paymentMethod.id);
        formData.append('_token', document.querySelector('input[name="_token"]').value);

        const response = await fetch('/process-subscription', {
          method: 'POST',
          body: formData,
          headers: { 'Accept': 'application/json' }
        });
        const result = await response.json();
        if (!response.ok) throw new Error(result.error || 'Payment failed');

        if (result.requires_action) {
          const { error: confirmError } = await stripe.confirmCardPayment(
            result.client_secret,
            { return_url: result.return_url }
          );
          if (confirmError) throw confirmError;
        }
        window.location.href = '/donation/success';
      } catch (err) {
        document.getElementById('card-errors').textContent = err.message || 'Please try again.';
      } finally {
        submitBtn.disabled = false;
        document.getElementById('button-text').textContent = 'Subscribe Now';
        document.getElementById('button-spinner').classList.add('hidden');
      }
    });
  </script>
</body>
</html>
