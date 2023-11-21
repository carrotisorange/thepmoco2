@extends('layouts.export')
@section('title', 'Statements of Account')
@section('content')
<p>
    Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
</p>
<p>
    Total Count: {{ $bills->count() }}
</p>
<p>
    Total Amount: {{ number_format($bills->sum('bill'), 2) }}
</p>
<p>
<table class="">
    <tr>
        <x-th>#</x-th>
        <x-th>Bill #</x-th>
        <x-th>Bill to</x-th>
        <x-th>Unit</x-th>
        <x-th>Particular</x-th>
        <x-th>Period Covered</x-th>
        <x-th>Amount Due</x-th>
    </tr>
    @foreach($bills as $index=> $item)
    <tr>
        <x-td>{{ $index+1 }}</x-td>
        <x-td>{{ $item->bill_no}}</x-td>
        <x-td>{{ Str::limit($item->tenant->tenant, 20) }}</x-td>
        <x-td>{{ Str::limit($item->unit->unit, 20) }}</x-td>
        <x-td>
            {{ Str::limit($item->particular->particular, 20) }}
        </x-td>
        <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d, Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </x-td>
        <x-td>
            {{ number_format((($item->bill) -App\Models\Collection::where('bill_id', $item->id)->posted()->sum('collection') ),2) }}
        </x-td>
    </tr>
    @endforeach
</table>
</p>
@endsection
