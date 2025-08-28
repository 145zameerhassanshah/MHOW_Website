<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Event Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: black;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .content {
            margin: 20px 0;
        }

        .content h4 {
            color: #333333;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #555555;
        }

        .report-details {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 5px solid black;
            margin-top: 10px;
        }

        .report-details p {
            margin: 6px 0;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #999999;
        }

        .footer a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h2>&nbsp; New Event Booking Received</h2>
        </div>
        <div class="content">
            <h4>Hello,</h4>
            <p>A new booking has been made by: <strong>{{ $user_email }}</strong> for the following event:</p>

            <div class="report-details">
                <p><strong>Event:</strong> {{ $event_title }}</p>
                <p><strong>Booking Time:</strong> {{ now()->format('F d, Y, g:i A') }}</p>
                <p><strong>Status:</strong> Confirmed</p>
            </div>

            {{-- <p>Please log in to the admin panel to view full booking details and take any necessary actions.</p> --}}
        </div>
        <div class="footer">
            {{-- <p>Thank you for using the MHOW platform.</p> --}}
            <p>&copy; 2025 <a href="{{ config('app.url') }}">MHOW (Muhammadiya House of Wisdom)</a>. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
