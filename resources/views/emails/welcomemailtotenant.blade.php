@component('mail::message')
# Hi, {{ $details['name'] }}!

Please press the continue button below to continue with the move-in process and use the credentails found below:
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
{{ auth()->user()->name }}

<b>This email is automatically generated by the system, please do not reply.</b>
@endcomponent