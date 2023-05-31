@extends('layouts.export')
@section('title', 'Bills')
@section('content')
    <p>
        Reference #: {{ $reference_no }}
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
            <x-th>Bill #</x-th>
            <x-th>Date Posted</x-th>
            <x-th>Unit</x-th>
            <x-th>Particular</x-th>
            <x-th>Period Covered</x-th>
            <x-th>Amount Due</x-th>
        </tr>
    
        @foreach($bills as $item)
    
        <tr>
            @if ($item->bill-$item->initial_payment > 0)
            <x-td>{{ $item->bill_no }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $item->unit->unit }}</x-td>
            <x-td>{{ $item->particular->particular }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </x-td>
            <x-td>{{ number_format(($item->bill-$item->initial_payment),2) }}</x-td>
            @endif
        </tr>
        @endforeach
    </table>
    </p>
@endsection
