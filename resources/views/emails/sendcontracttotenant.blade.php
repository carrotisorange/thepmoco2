@component('mail::message')
# Hi {{ $details['tenant'] }}!

We're thrilled you've selected <b>{{ Session::get('property') }}</b> as your new home.
<br><br>
We've attached some useful information to help get you ready for your move-in on {{ $details['start'] }}.
<br>
<br>
The details of your contract are summarized below:
<br>
@component('mail::panel')
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
@endcomponent
<br><br>
I hope this information helps you settle in and feel right at home.
<br>
Regards,<br>
{{ auth()->user()->name }}
<br><br>
For inquiries reach us at: {{ App\Models\Property::find(Session::get('property_uuid'))->email }} /
{{ App\Models\Property::find(Session::get('property_uuid'))->mobile }}
<br><br>

@endcomponent