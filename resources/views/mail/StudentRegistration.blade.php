<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><title>Welcome to Homeify</title></title>

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

        <p>Dear {{ $name }},</p>

        <p>Welcome to the Homeify. Your registration has been completed successfully.</p>

        <ul>
            <li><strong>Student Name:</strong> {{ $name }}</li>
            <li><strong>Enrollment Number:</strong> {{ $enroll_number }}</li>
            <li><strong>Gmail Id:</strong> {{ $email }}</li>
            <li><strong>Password:</strong> {{ $password }}</li>
        </ul>

        <p>Regards,<br>
        Hostel Administration</p>

        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>