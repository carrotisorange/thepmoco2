<p>
<h3> Hi, {{ $details['tenant'] }}! </h3>
{{ $details['body'] }}
<hr>
Contract signed: {{ Carbon\Carbon::now()->format('M d, Y') }}
<br>
Tenant: {{ $details['tenant'] }}
<br>
Unit: {{ $details['unit'] }}
<br>
Duration: {{ $details['start'].' - '.$details['end']}}
<br>
Rent/month: Php {{ number_format($details['rent'], 2) }}
<br>
Status: pending
<hr>

Please be advised to pay the movein charges within the day upon receiving this email.
<br><br>

Regards,<br>
{{ auth()->user()->name }}, admin
<br><br>

</p>