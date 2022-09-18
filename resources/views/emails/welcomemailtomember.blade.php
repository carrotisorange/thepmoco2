@component('mail::message')
# Welcome aboard!

You've got an invitation to access <b>{{ Session::get('property_name') }}</b> as a <b>{{ $details['role'] }}</b>.
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
{{ auth()->user()->name }}


@endcomponent
