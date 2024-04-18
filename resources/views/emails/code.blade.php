<!DOCTYPE html>
<html>
<head>
    <title>Bit Mascot</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>To authenticate, please use the following One Time Password (OTP)</p>
    <p>{{ $details['code'] }}</p>
    <p>Don’t share this OTP with anyone. We hope to see you soon.</p>
    <br>
    <p><b>Regards,</b></p>
    <p>Bit Mascot</p>
</body>
</html>