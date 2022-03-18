<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contract</title>
</head>

<body>
    <h1>Hi {{ $details['tenant'] }}! </h1>
    <p>{{ $details['body'] }}</p>
    <br>
    <p>Contract signed: {{ Carbon\Carbon::now()->format('M d, Y') }}</p>
    <p>Tenant: {{ $details['tenant'] }}</p>
    <p>Unit: {{ $details['unit'] }}</p>
    <p>Duration: {{ $details['start'].' - '.$details['end']}}</p>
    <p>Rent/month: Php {{ number_format($details['rent'], 2) }}</p>
    <br>
    <p>Regards, <br><b>{{ auth()->user()->name }}</b>, Admin</p>
</body>

</html>