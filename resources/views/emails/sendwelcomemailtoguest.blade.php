@component('mail::message')
# Dear Mr / Mrs {{ $details['guest'] }}

<br>
A very warm welcome to {{ Session::get('property_name') }}. It is indeed a pleasure to have you staying with us.
<br><br>
The Management and staff are pleased to be your hosts. I look forward to demonstrating services and skills distinctive
and special to {{ Session::get('property_name') }}, which is fully equipped with fine dining and business facilities to cater to
our guests.
<br><br>
Our well-trained staffs eagerly await to serve and provide you with a truly memorable stay at our hotel.
<br><br>
May I take this opportunity to thank you for having chosen {{ Session::get('property_name') }} for your current stay.
<br><br>
Your room is <b>{{ $details['unit'] }}</b> and your stay starts on <b>{{ Carbon\Carbon::parse($details['start'])->format('M d, Y') }}</b> and ends on <b>{{ Carbon\Carbon::parse($details['end'])->format('M d, Y') }}</b> amounting 
to (Please inquire at the lobby).
<br>
<br>
Sincerely,
<br>
{{ auth()->user()->name }}
<br>
{{ auth()->user()->role->role }} 

@endcomponent