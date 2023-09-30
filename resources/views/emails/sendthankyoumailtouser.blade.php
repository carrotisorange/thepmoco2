@component('mail::message')
# Hi, {{ auth()->user()->name }}!

I am one of the co-founders of {{ env('APP_NAME') }},
and I am excited you have decided to sign up.

{{ env('APP_NAME') }} Team and I have poured
our heart and soul into making systematized processes reduces which reduces operating expenses
by 35%.

My top priority is to make sure that you are able
to automate the tedious and reptitive processes of managing a property, so if you have any
questions about our product, the website, feel free to reply directly
to this email.
I hope we can help you to simplify your rental property operations!

<br>

{{-- @component('mail::button', ['url' => '/property/{{ Str::random(8) }}/create'])
    Start Now
@endcomponent --}}

Stay in touch!<br>

-Pam, Co-Founder
<br>
Thanks for Signing Up

@endcomponent
