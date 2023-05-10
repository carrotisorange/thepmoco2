@extends('layouts.export')
@section('title', 'Acknowledgement Receipt')
@section('content')
<p>
    Reference #: {{ $reference_no }}
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
    Tenant: {{ $tenant }}
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
    Unpaid Bills: {{ number_format(($balance->sum('bill') - $balance->sum('initial_payment')),2)}}
</p>
<br>
<p>
    <b>Payments Breakdown</b>
</p>

<p>
<table class="">
    <tr>
        <th>Bill #</th>
        <th>Date Posted</th>
        <th>Unit</th>
        <th>Particular</th>
        <th>Period Covered</th>
        <th>Amount</th>
    </tr>

    @foreach($collections as $item)

    <tr>
        <td>{{ $item->bill->bill_no }}</td>

        <td>{{ Carbon\Carbon::parse($item->bill->created_at)->format('M d, Y') }}</td>
        <td>{{ $item->unit->unit }}</td>
        <td>{{ $item->bill->particular->particular }}</td>
        <td>{{ Carbon\Carbon::parse($item->bill->start)->format('M d,
            Y').'-'.Carbon\Carbon::parse($item->bill->end)->format('M d, Y') }} </td>
        <td>{{ number_format($item->collection,2) }}</td>


    </tr>

    @endforeach
</table>
</p>
@endsection
