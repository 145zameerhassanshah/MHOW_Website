<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Donation Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .logo { max-width: 150px; margin-bottom: 20px; }
        .content { background-color: #f9f9f9; padding: 25px; border-radius: 5px; }
        .donation-details { margin: 20px 0; }
        .detail-row { display: flex; margin-bottom: 10px; }
        .detail-label { font-weight: bold; width: 150px; }
        .thank-you { font-size: 18px; margin: 25px 0; text-align: center; }
        .footer { margin-top: 30px; font-size: 12px; text-align: center; color: #777; }
        .button { 
            display: inline-block; 
            padding: 10px 20px; 
            background-color: #4CAF50; 
            color: white; 
            text-decoration: none; 
            border-radius: 4px; 
            margin: 20px 0;
        }
    </style>
</head>
<body>
    

    <div class="content">
        <p>Dear {{ $donor->name }},</p>
        
        <div class="thank-you">
            <h2>Thank you for your generous donation!</h2>
            <p>Your support helps us continue our important work.</p>
        </div>

        <div class="donation-details">
            <h3>Donation Details</h3>
            <div class="detail-row">
                <div class="detail-label">Amount:</div>
                <div>${{ number_format($donation->amount, 2) }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Receipt Number:</div>
                <div>{{ $donation->receipt_no }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Date:</div>
                <div>{{ $donation->donation_date->format('F j, Y') }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Payment Method:</div>
                <div>{{ $donation->paymentMethod->name }}</div>
            </div>
            @if($donation->campaign)
            <div class="detail-row">
                <div class="detail-label">Campaign:</div>
                <div>{{ $donation->campaign->name }}</div>
            </div>
            @endif
        </div>

        @if($donation->message)
            <div class="donor-message">
                <h4>Your Message:</h4>
                <p><em>"{{ $donation->message }}"</em></p>
            </div>
        @endif

        <div style="text-align: center;">
            <a href="{{ config('app.url') }}" class="button">Visit Our Website</a>
        </div>

        <p>This email serves as your official receipt. Please keep it for your records.</p>
    </div>

    <div class="footer">
        <p>If you have any questions about your donation, please reply to this email.</p>
    </div>
</body>
</html>