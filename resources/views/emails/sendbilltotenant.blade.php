@component('mail::message')
# Hi, {{ $data['tenant'] }}!

Reference #: {{ $data['reference_no'] }}

Date: {{ Carbon\Carbon::now()->format('M d, Y') }}

Due Date: {{ Carbon\Carbon::parse($data['due_date'])->format('M d, Y') }}

Bills to be Paid: {{ number_format($data['bills']->sum('bill'), 2) }}

Bills to be Paid After Due Date: {{ number_format(($data['bills']->sum('bill')+$data['penalty']), 2) }}

Bills Breakdown

@component('mail::table')
| Bill # | Date Posted | Unit | Particular | Period Covered | Amount |
| ------------- |------------- |------------- |------------- |------------- |------------- |
@foreach ($data['bills'] as $item)
@if ($item->bill-$item->initial_payment > 0)
| {{ $item->bill_no }} | {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }} | {{ $item->unit->unit }} | {{ $item->particular->particular }} | {{ Carbon\Carbon::parse($item->start)->format('M d, Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} | {{ number_format(($item->bill-$item->initial_payment),2) }} |
@endif
@endforeach

@endcomponent

@if($data['note_to_bill'])
    {{ $data['note_to_bill'] }}
@endif
<br>

Regards,<br>
{{ auth()->user()->name }}
<br><br>
For inquiries reach us at: {{ App\Models\Property::find(Session::get('property'))->email }} /
{{ App\Models\Property::find(Session::get('property'))->mobile }}
<br><br>

@endcomponent