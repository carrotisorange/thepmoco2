@component('mail::message')

# Hi Landley!

{{ $details['message'] }}

Regards,<br>
{{ $details['name'] }}
<br>
{{ $details['email'] }}
@endcomponent