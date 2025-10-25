<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
        }
        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $subject }}</h2>

        <p>Dear Student,</p>

        <p>We are pleased to inform you that your room allotment has been successfully completed.</p>

        <ul>
            <li><strong>Student Name:</strong> {{ $name }}</li>
            <li><strong>Enrollment Number:</strong> {{ $enroll_number }}</li>
            <li><strong>Room Number:</strong> {{ $room_number }}</li>
            <li><strong>Allotment Date:</strong> {{ $allotment_date }}</li>
        </ul>

        <p>Please make sure to report to the hostel warden with a copy of this email and your ID proof to complete the formalities.</p>

        <p>We hope you have a comfortable and productive stay in the hostel.</p>

        <p>Best regards,<br>
        Hostel Administration</p>

        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>