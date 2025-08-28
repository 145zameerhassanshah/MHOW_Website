<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $event->title }} Mail</title>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px; color: #000000; background-color: #ffffff;">

    <h2>{{ $event->title }} Registration Mail</h2>

    <p><strong>Event:</strong> {{ $eventSchedule->title }}</p>

    <p><strong>User Name:</strong> {{ $booking->name }}</p>

    <p><strong>Email:</strong> <a href="mailto:{{ $booking->email }}" style="color: #1a73e8;">{{ $booking->email }}</a>
    </p>

    <p><strong>Phone:</strong> {{ $booking->phone_no }}</p>

    <p><strong>Gender:</strong> {{ ucfirst($booking->gender) }}</p>

    <p><strong>Referral Source:</strong> {{ ucfirst($booking->source) }}</p>

    <p><strong>Request Date:</strong> {{ $booking->created_at }}</p>

</body>

</html>
