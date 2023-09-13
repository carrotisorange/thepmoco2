@component('mail::message')

<img src="{{ asset('/storage/'.Session::get('property_thumbnail')) }}">


# Dear Mr / Mrs {{ $details['guest'] }},

<br>
Thank you for choosing {{ $details['property_name'] }}. It is our pleasure to confirm 
the following reservation. 

{{-- Please be advise us if any changes need to be made to this reservation ny calling us at {{ $details['property_mobile'] }}. --}}
<br><br>

@component('mail::table')
| Reservation Details |             | Policies     |           |          |       
| --------------------|-------------|--------------|-----------|----------|
| Confirmation Number | {{ Str::limit($details['uuid'], 8) }}                            | Room                | {{ $details['unit'] }}     
| Check-in date       | {{ Carbon\Carbon::parse($details['checkin_date'])->format('M d, Y') }}  | Check-In Time  | 2pm |
| Check-out date      | {{ Carbon\Carbon::parse($details['checkout_date'])->format('M d, Y') }} | Check-Out Time | 12NN |
| Guest Name          | Lead Guest: {{ $details['guest'] }}               |  {{ $details['note_to_transient'] }}
| Amount              | {{ number_format($details['price'],2) }}          | 
@endcomponent

<p class="text-center">
    Address: {{  $details['property_address'] }}
    <br>
    {{-- Telephone: {{ $details['property_telephone'] }}
    <br> --}}
    Mobile: {{ $details['property_mobile'] }}
    <br>
    Facebook Page: {{ $details['property_facebook_page'] }}
    <br>
    Email: {{ $details['property_email'] }}
</p>
<br>
<br>Cancellation Policy: Deposits are non-refundable but can be rebooked with surcharge.
Sincerely,
<br>
{{ auth()->user()->name }}
<br>

@endcomponent