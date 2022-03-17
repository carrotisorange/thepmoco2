<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invitation</title>
</head>
<body>
    <h1>Hi {{ $details['header'] }}! </h1>
    <p>{{ $details['title'] }}</p>
    <p><b>{{ $details['body'] }}</b></p>
    <p>Please click this <a href="thepropertymanager.online/login">link</a> to accept the invitation. To acces your account please you current email address and
        immediately reset your password.</p>
    <br>
    <p>Regards, <br><b>{{ auth()->user()->name }}</b>, Account Owner</p>
</body>
</html>