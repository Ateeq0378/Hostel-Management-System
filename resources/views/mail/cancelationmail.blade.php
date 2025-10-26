<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 40px auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .email-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .email-body {
            padding: 30px;
        }
        .email-body h2 {
            color: #007bff;
        }
        .info {
            margin: 20px 0;
            line-height: 1.6;
        }
        .info strong {
            color: #333;
        }
        .password-box {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .footer {
            background-color: #f9f9f9;
            text-align: center;
            color: #888;
            font-size: 12px;
            padding: 15px;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            <h1>{{ $subject }}</h1>
        </div>
        <div class="email-body">
            <h2>Hello, {{ $name }}</h2>
            <p>
                We regret to inform you that your previously allotted hostel room has been canceled.
            </p>

            <div class="info">
                <p><strong>Student Name:</strong> {{ $name }}</p>
                <p><strong>Enrollment Number:</strong> {{ $enroll_number }}</p>
                <p><strong>Room Number:</strong> {{ $room_number }}</p>
                <p><strong>Allotment Date:</strong> {{ $allotment_date }}</p>
                <p><strong>Cancellation Date:</strong> {{ $cancelation_date }}</p>
            </div>

            <p>Best Regards,<br>Hostel Administration</p>
        </div>
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>

</body>
</html>
