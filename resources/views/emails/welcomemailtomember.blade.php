@component('mail::message')
# Welcome aboard!

You've got an invitation to access <b>{{ Session::get('property') }}</b>.
<br>

Please press the accept invitation button below and use the following credentials:
{{-- <br>
Email: {{ $details['email'] }} --}}
<br>
Username: {{ $details['username'] }}
<br>
Password: {{ $details['password'] }}
<br>

@component('mail::button', ['url' => $url])
Accept Invitation
@endcomponent

Regards,<br>
{{ Session::get('property') }}
<br><br>
For inquiries reach us at: {{ Session::get('property_email') }} / {{ Session::get('property_mobile') }}
<br><br>


@endcomponent