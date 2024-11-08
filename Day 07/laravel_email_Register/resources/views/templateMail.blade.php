<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Registering</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f3f3; margin: 0; padding: 0; color: #333; }
        .container { max-width: 600px; margin: 40px auto; background-color: #ffffff; padding: 30px; border-radius: 8px; text-align: left; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        .header { text-align: center; padding-bottom: 20px; border-bottom: 1px solid #ddd; }
        .header h1 { color: #4CAF50; margin: 0; font-size: 26px; }
        .content { padding: 20px 0; line-height: 1.6; }
        .content p { font-size: 16px; color: #555; margin: 10px 0; }
        .footer { text-align: center; padding-top: 20px; border-top: 1px solid #ddd; color: #888; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Registering!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $firstName }} {{ $lastName}},</p>
            <p>Thank you for joining us! Your registration was successful, and we’re excited to have you on board.</p>
            <p>If you have any questions or need assistance, please feel free to reach out to us anytime.</p>
            <p>Best regards,<br>{{ $companyName }}</p>
        </div>
        <div class="footer">
            &copy; 2024 {{ $companyName }}. All rights reserved.
        </div>
    </div>
</body>
</html>
