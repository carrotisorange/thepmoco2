<p>
<h3> Hi, {{ $details['owner'] }}! </h3>
{{ $details['body'] }}
<hr>
Contract signed: {{ Carbon\Carbon::now()->format('M d, Y') }}
<br>
Tenant: {{ $details['owner'] }}
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
{{ Session::get('property') }}
<br><br>
For inquiries reach us at: {{ Session::get('property_email') }} / {{ Session::get('property_mobile') }}
<br><br>
</p>