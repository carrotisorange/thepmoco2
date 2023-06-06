@extends('layouts.export')
@section('title', 'Acknowledgement Receipt')
@section('content')
<p>
    Guest: {{ $guest }}
</p>
    <p>
        {{-- Reference #: {{ $reference_no }} --}}
    </p>
    <p>
        AR #: {{ $ar_no }}
    </p>
    <p>
        Payment Made: {{ Carbon\Carbon::parse($created_at)->format('M d, Y') }}
    </p>
    <p>
        Amount Paid: {{ number_format($amount, 2) }}
    </p>
    
    
    <p>
        Mode of Payment: {{ $mode_of_payment }}
    </p>
    
    
    
    @if($mode_of_payment === 'cheque')
    <p>
        Cheque #: {{ $cheque_no }}
    </p>
    @endif
    
    @if($mode_of_payment === 'bank')
    <p>
        Bank #: {{ $bank }}
    </p>
    
    <p>
        Date Deposited: {{ Carbon\Carbon::parse($date_deposited)->format('M d, Y') }}
    </p>
    @endif
    
    
    <p>
        Unpaid Bills: {{ number_format($balance,2)}}
    </p>
    <br>
    <p>
        <b>Payments Breakdown</b>
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
            <x-th>Amount</x-th>
        </tr>
    
        @foreach($collections as $index => $item)
    
        <tr>
            <x-th>{{ $index+1 }}</x-th>
            <x-td>{{ $item->bill->bill_no }}</x-td>
    
            <x-td>{{ Carbon\Carbon::parse($item->bill->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $item->unit->unit }}</x-td>
            <x-td>{{ $item->bill->particular->particular }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->bill->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->bill->end)->format('M d, Y') }} </x-td>
            <x-td>{{ number_format($item->collection,2) }}</x-td>
    
    
        </tr>
    
        @endforeach
    </table>
    </p>
@endsection
