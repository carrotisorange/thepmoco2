@component('mail::message')
# Hi, {{ $data['tenant'] }}!

AR #: {{ $data['ar_no'] }}

Mode of Payment: {{ $data['form'] }}

Date: {{ Carbon\Carbon::now()->format('M d, Y') }}

Payment Made: {{ Carbon\Carbon::parse($data['payment_made'])->format('M d, Y') }}

Total Amount Paid: {{ number_format($data['collections']->sum('collection'), 2) }}

Total Unpaid Bills: {{ number_format($data['balance']->sum('bill') -$data['balance']->sum('initial_payment'),2)}}

Payments Breakdown

@component('mail::table')
| Bill # | Date Posted | Unit | Particular | Period Covered | Amount Paid |
| ------------- |------------- |------------- |------------- |------------- |------------- |
@foreach ($data['collections'] as $item)
| {{ $item->bill->bill_no }} | {{ Carbon\Carbon::parse($item->bill->created_at)->format('M d, Y') }} | {{ $item->unit->unit }} | {{$item->bill->particular->particular }} | {{ Carbon\Carbon::parse($item->bill->start)->format('M d, Y').'-'.Carbon\Carbon::parse($item->bill->end)->format('M d, Y') }} | {{ number_format(($item->collection),2) }} |
@endforeach

@endcomponent

<br>

Regards,<br>
{{ auth()->user()->name }}
<br><br>
For inquiries reach us at: {{ App\Models\Property::find(Session::get('property'))->email }} /
{{ App\Models\Property::find(Session::get('property'))->mobile }}
<br><br>


@endcomponent