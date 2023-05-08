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
            <th>Bill #</th>
            <th>Date Posted</th>
            <th>Unit</th>
            <th>Particular</th>
            <th>Period Covered</th>
            <th>Amount Due</th>
        </tr>
    
        @foreach($bills as $item)
    
        <tr>
            @if ($item->bill-$item->initial_payment > 0)
            <td>{{ $item->bill_no }}</td>
            <td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
            <td>{{ $item->unit->unit }}</td>
            <td>{{ $item->particular->particular }}</td>
            <td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </td>
            <td>{{ number_format(($item->bill-$item->initial_payment),2) }}</td>
            @endif
        </tr>
        @endforeach
    </table>
    </p>
@endsection
