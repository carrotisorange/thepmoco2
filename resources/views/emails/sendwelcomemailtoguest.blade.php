@component('mail::message')
# Dear Mr / Mrs {{ $details['guest'] }},

<br>
Thank you for choosing {{ $details['property_name'] }}. It is our pleasure to confirm 
the following reservation. Please be advise us if any changes need to be made to this reservation ny calling us at {{ $details['property_mobile'] }}.
<br><br>
@component('mail::table')
| Reservation Details |             | Policies     |           |          |       
| --------------------|-------------|--------------|-----------|----------|
| Confirmation Number |{{ $details['uuid'] }} | Check-In Time    |  2pm   |
|                     |                       | Check-Out Time   |  12NN  |
| Guest Name          | Lead Guest: {{ $details['guest'] }} | Additional Charge of PHP 200.00 per hour will be applied for extra hours beyond our check out time. | 
|                     |                                     | Note: All Deposits are non-refundable but we do offer unlimited rebookings as long as the new date is available. |
|                     |                                     | Cancellation must be made at least 3 days prior to arrival. |
| Address             |                                     | Not recommended |
@endcomponent

<p class="text-center">
    Address: {{  $details['property_address'] }}
    <br>
    Telephone: {{ $details['property_telephone'] }}
    <br>
    Mobile: {{ $details['property_mobile'] }}
    <br>
    Facebook Page: {{ $details['property_facebook_page'] }}
    <br>
    Email: {{ $details['property_email'] }}
</p>
Sincerely,
<br>
{{ auth()->user()->name }}
<br>

@endcomponent