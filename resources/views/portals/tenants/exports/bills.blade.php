@extends('layouts.export')
@section('title', 'Bills')
@section('content')
<p>
    {{-- Reference #: {{ $reference_no }} --}}
</p>

<p>
    Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
</p>
<p>
    {{-- <b>Due Date: {{ Carbon\Carbon::parse($due_date)->format('M d, Y') }}</b> --}}
</p>
<p>
    Tenant: {{ $tenant }}
</p>
<p>
    Bills to be Paid: {{ number_format($bills->sum('bill'), 2) }}
</p>
<p>
    {{-- <b>Bills to be Paid After Due Date: {{ number_format(($bills->sum('bill') +$penalty), 2) }}</b> --}}
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
        <x-th>Date Posted</x-th>
        <x-th>Unit</x-th>
        <x-th>Particular</x-th>
        <x-th>Period Covered</x-th>
        <x-th>Amount Due</x-th>
    </tr>

    @foreach($bills as $index => $item)

    <tr>
        @if ($item->bill-App\Models\Collection::where('bill_id', $item->id)->posted()->sum('collection') > 0)
        <x-td>{{ $index+1 }}</x-td>
        <x-td>{{ $item->bill_no }}</x-td>
        <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
        <x-td>{{ $item->unit->unit }}</x-td>
        <x-td>{{ $item->particular->particular }}</x-td>
        <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
            Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </x-td>
        <x-td>{{ number_format(($item->bill-App\Models\Collection::where('bill_id',
            $item->id)->posted()->sum('collection')),2) }}
        </x-td>
        @endif
    </tr>
    @endforeach
</table>
</p>
@endsection