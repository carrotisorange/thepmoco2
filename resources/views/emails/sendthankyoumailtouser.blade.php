@component('mail::message')
# Hi, {{ auth()->user()->name }}!

Thanks for Signing Up
<br><br>
The Property Manager Online will help you to simplify your rental property operations.

Note: {{ $data['message'] }}

@component('mail::button', ['url' => '/property/{{ Str::random(8) }}/create'])
    Start Now
@endcomponent

Cheers,<br>
The Property Manager Online,
<br><br>

@endcomponent