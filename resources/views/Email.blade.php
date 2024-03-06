<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 20px;
        }
        a {
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <p>Hello {{ $user->name }},</p>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        
        <p>In order to reset your password, please click the following link:</p>
        <a href="{{ url('reset', $user->remember_token) }}">Reset Password</a>
        <br><br>
        <p>If you did not request a password reset, no further action is required.</p>
        
        <p>Regards,<br>
    </div>
</body>
</html>
