@extends('layouts.export')
@section('title', 'Bills')
@section('content')
<p>
    Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
</p>
<p>
    <b>Due Date: {{ Carbon\Carbon::parse($due_date)->format('M d, Y') }}</b>
</p>
<p>
    Tenant: {{ $tenant }}
</p>
<p>
    Bills to be Paid: {{ number_format($balance, 2) }}
</p>
<p>
    <b>Bills to be Paid After Due Date: {{ number_format($balance_after_due_date, 2) }}</b>
</p>
<br>
<p>
    <b>Bills Breakdown</b>
</p>
<p>
<table class="">

    <tr>
        <x-th>#</x-th>
        <x-th>Bill #</x-th>
        <x-th>Bill Posted</x-th>
        <x-th>Unit</x-th>
        <x-th>Particular</x-th>
        <x-th>Period Covered</x-th>
        <x-th>Amount Due</x-th>
    </tr>

    @foreach($bills as $index=> $item)

    <tr>
        @if($item->particular_id != 71 && $item->particular_id != 72)
            @if ($item->bill-App\Models\Collection::where('bill_id', $item->id)->sum('collection') > 0)
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $item->unit->unit.'-'.$item->bill_no}}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $item->unit->unit }}</x-td>
            <x-td>{{ Str::limit($item->particular->particular, 15) }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d, Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </x-td>
                <?php 
                    $marketing_fee = App\Models\Unit::find($item->unit_uuid)->marketing_fee;
                    $management_fee = App\Models\Unit::find($item->unit_uuid)->management_fee;
                                            
                    $other_fees = $marketing_fee + $management_fee 
                ?>
            <x-td>
                @if(Carbon\Carbon::parse($item->created_at) > '2023-07-01 00:00:00')
                {{ number_format(($item->bill-App\Models\Collection::where('bill_id', $item->id)->sum('collection')),2) }}
                @else
                {{ number_format(($item->bill-App\Models\Collection::where('bill_id', $item->id)->sum('collection') + $other_fees),2) }}
                @endif

            </x-td>
            @endif
        @endif
    </tr>
    @endforeach
</table>
</p>
@if($note_to_bill)
<p class="text-center">
    <b>"{{ $note_to_bill }}"</b>
</p>
@endif
@endsection