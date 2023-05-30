@extends('layouts.export')
@section('title', 'Contract')
@section('content')
    <p>
        Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
    </p>
    
    <p>
        Tenant: {{ $tenant }}
    </p>
    
    <p>
        Unit: {{ $unit }}
    </p>
    <p>
        Duration: {{ Carbon\Carbon::parse($start)->format('M d, Y').'-'.Carbon\Carbon::parse($end)->format('M d, Y')
        }}
    </p>
    <p>
        Rent/mo: {{ number_format($rent, 2) }}
    </p>
    <p>
        Status: {{ $status }}
    </p>
    <p>
        Source of awareness: {{ $interaction->interaction }}
    </p>
    <p>
        Assisted by: {{ $user }}
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
            <th>Amount</th>
        </tr>
    
        @forelse($bills as $item)
        <tr>
            <td>{{ $item->bill_no }}</td>
            <td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
            <td>{{ $item->unit->unit }}</td>
            <td>{{ $item->particular->particular }}</td>
            <td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </td>
            <td>{{ number_format($item->bill,2) }}</td>
            @empty
            <td>No data found.</td>
        </tr>
        @endforelse
    </table>
    </p>
    
    <p>
        <b>Guardians</b>
    </p>
    <p>
    <table class="">
        <tr>
            <th>Name</th>
            <th>Relationship</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
        @forelse($guardians as $item)
        <tr>
            <td>{{ $item->guardian }}</td>
            <td>{{ $item->relationship->relationship }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->mobile_number }}</td>
            @empty
            <td>No data found.</td>
        </tr>
        @endforelse
    </table>
    </p>
    
    <p>
        <b>References</b>
    </p>
    <p>
    <table class="">
    
        <tr>
            <th>Name</th>
            <th>Relationship</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
        @forelse($references as $item)
        <tr>
            <td>{{ $item->reference }}</td>
            <td>{{ $item->relationship->relationship }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->mobile_number }}</td>
            @empty
            <td>No data found.</td>
        </tr>
    
        @endforelse
    </table>
    </p>
@endsection

