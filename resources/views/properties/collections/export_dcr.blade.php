@extends('layouts.export')
@section('title', 'Daily Collection Report')
@section('content')
<p>
            Date: {{ Carbon\Carbon::parse($date)->format('M d, Y') }} ({{ $collections->count() }} collections )
        </p>
        <table class="">
            <tr>
                <th>#</th>
                <th>AR #</th>
                <th>Bill #</th>
                <th>Unit</th>
                {{-- <th>Date</th> --}}
                <th>Bill To</th>
                <th>Particulars</th>
                <th>Period Covered</th>
                <th>Amount</th>
            </tr>
            @foreach($collections as $index => $item)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $item->ar_no }}</td>
                <td>{{ $item->bill->bill_no }}</td>
                {{-- <td>{{ Carbon\Carbon::parse($item->bill->created_at)->format('M d, Y') }}</td> --}}
                <td>{{ $item->unit->unit }}</td>
                <td>
                    @if($item->tenant_uuid)
                    {{ $item->tenant->tenant}} (T)
                    @elseif($item->owner_uuid)
                    {{ $item->owner->owner}} (O)
                    @elseif($item->guest_uuid)
                    {{ $item->guest->guest}} (G)
                    @else
                    NA
                    @endif
                </td>
                <td>{{ $item->bill->particular->particular }}</td>
                <td>{{ Carbon\Carbon::parse($item->bill->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($item->bill->end)->format('M d, Y') }} </td>
                <td>{{ number_format($item->collection,2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td><b>Total</b> </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>{{ number_format($collections->sum('collection'), 2) }}</b> </td>
            </tr>
        </table>

@endsection