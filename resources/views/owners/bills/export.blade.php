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
    Owner: {{ $owner }}
</p>
<p>
    Bills to be Paid: {{ number_format($balance, 2) }}
</p>
<p>
    <b class="text-red">Bills to be Paid After Due Date: {{
        number_format($balance_after_due_date, 2) }}</b>
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

    @foreach($bills as $index => $item)

    <tr>
        @if ($item->bill-App\Models\Collection::where('bill_id', $item->id)->sum('collection') > 0)
        <x-td>{{ $index+1 }}</x-td>
        <x-td>{{ $item->bill_no }}</x-td>
        <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
        <x-td>{{ $item->unit->unit }}</x-td>
        <x-td>{{ Str::limit($item->particular->particular, 15) }}</x-td>
        <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
            Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </x-td>
        <x-td>{{ number_format(($item->bill-App\Models\Collection::where('bill_id', $item->id)->sum('collection')),2) }}
        </x-td>
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