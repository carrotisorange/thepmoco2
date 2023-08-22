@component('mail::message')
# Hi {{ $details['name'] }}!

Please press the  button below to continue with the move-in process and use the credentails found below:
<br>
<br>
Email: {{ $details['email'] }}
<br>
Username: {{ $details['username'] }}
<br>
Password: Your mobile number (e.g., 09786543112).
<br>

@component('mail::button', ['url' => $url])
Continue
@endcomponent

Regards,<br>
{{ Session::get('property') }}
<br><br>
For inquiries reach us at: {{ Session::get('property_email') }} / {{ Session::get('property_mobile') }}
<br><br>


@endcomponent