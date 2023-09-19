@component('mail::message')

{{ Session::get('property') }}
<br>
{{-- # Dear Mr / Mrs {{ $details['guest'] }}, --}}
{{ Carbon\Carbon::now()->format('M d, Y') }}
<br>
<h1 style="text-align: center">Voucher</h1>
<br>
Thank you for choosing {{ Session::get('property') }}. It is our pleasure to confirm 
the following reservation. 

{{-- Please be advise us if any changes need to be made to this reservation ny calling us at {{ $details['property_mobile'] }}. --}}
<br><br>

@component('mail::table')
| Reservation Details |             | Policies     |           |          |       
| --------------------|-------------|--------------|-----------|----------|
| Confirmation Number | {{ Str::limit($details['uuid'], 8) }}                            | Room                | {{ $details['unit'] }}     
| Check-in date       | {{ Carbon\Carbon::parse($details['checkin_date'])->format('M d, Y') }}  | Check-In Time  | 2pm |
| Check-out date      | {{ Carbon\Carbon::parse($details['checkout_date'])->format('M d, Y') }} | Check-Out Time | 12NN |
| Guest Name          | Lead Guest: {{ $details['guest'] }}               | 
| Amount              | {{ number_format($details['price'],2) }}          | 
| Total Number of guests | {{ $details['no_of_guests'] }} |
| No of children | {{ $details['no_of_guests'] }} |
| Total Number of guests | {{ $details['no_of_guests'] }} |
| Number of senior citizens | {{ $details['no_of_senior_citizens'] }} |
| Number of children | {{ $details['no_of_children'] }} |
| Number of pwd | {{ $details['no_of_pwd'] }} |
@endcomponent

Address: {{ Session::get('property_address') }}
<br>
Mobile: {{ Session::get('property_mobile') }}
<br>
Facebook Page: {{ Session::get('property_facebook_page') }}
<br>
Email: {{ Session::get('property_email') }}
<br>
Remarks: {{ $details['remarks'] }}
<br>
{{-- Notes: {{ $details['notes_to_transient'] }} --}}
<br>
Sincerely,
<br>
{{ auth()->user()->name }}
<br>

@endcomponent