@component('mail::message')
# Hi, {{ $data['tenant'] }}!
{{-- 
Reference #: {{ $data['reference_no'] }} --}}

Date: {{ Carbon\Carbon::now()->format('M d, Y') }}

Due Date: {{ Carbon\Carbon::parse($data['due_date'])->format('M d, Y') }}

Bills to be Paid: {{ number_format($data['balance'], 2) }}

Bills to be Paid After Due Date: {{ number_format($data['balance_after_due_date'], 2) }}

Bills Breakdown

@component('mail::table')
| Bill # | Date Posted | Unit | Particular | Period Covered | Amount |
| ------------- |------------- |------------- |------------- |------------- |------------- |
@foreach ($data['bills'] as $item)
<?php 
$marketing_fee = App\Models\Bill::where('bill_id',$item->id)->pluck('bill')->first();
$management_fee = App\Models\Bill::where('bill_id',$item->id)->pluck('bill')->first();
                                            
    $other_fees = $marketing_fee + $management_fee 
?>
@if($item->particular_id != 71 && $item->particular_id != 72)
@if ($item->bill-App\Models\Collection::where('bill_id', $item->id)->sum('collection') > 0)
| {{ $item->bill_no }} | {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }} | {{ $item->unit->unit }} | {{ $item->particular->particular }} | {{ Carbon\Carbon::parse($item->start)->format('M d, Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} |  {{ number_format((($item->bill + $other_fees)-App\Models\Collection::where('bill_id', $item->id)->sum('collection')),2) }}  |
@endif
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
For inquiries reach us at: {{ auth()->user()->email }} /
{{ auth()->user()->mobile }}
<br><br>

@endcomponent