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
            <x-th>Bill #</x-th>
            <x-th>Date Posted</x-th>
            <x-th>Unit</x-th>
            <x-th>Particular</x-th>
            <x-th>Period Covered</x-th>
            <x-th>Amount</x-th>
        </tr>
    
        @forelse($bills as $item)
        <tr>
            <x-td>{{ $item->bill_no }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $item->unit->unit }}</x-td>
            <x-td>{{ $item->particular->particular }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </x-td>
            <x-td>{{ number_format($item->bill,2) }}</x-td>
            @empty
            <x-td>No data found.</x-td>
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
            <x-th>Name</x-th>
            <x-th>Relationship</x-th>
            <x-th>Email</x-th>
            <x-th>Mobile</x-th>
        </tr>
        @forelse($guardians as $item)
        <tr>
            <x-td>{{ $item->guardian }}</x-td>
            <x-td>{{ $item->relationship->relationship }}</x-td>
            <x-td>{{ $item->email }}</x-td>
            <x-td>{{ $item->mobile_number }}</x-td>
            @empty
            <x-td>No data found.</x-td>
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
            <x-th>Name</x-th>
            <x-th>Relationship</x-th>
            <x-th>Email</x-th>
            <x-th>Mobile</x-th>
        </tr>
        @forelse($references as $item)
        <tr>
            <x-td>{{ $item->reference }}</x-td>
            <x-td>{{ $item->relationship->relationship }}</x-td>
            <x-td>{{ $item->email }}</x-td>
            <x-td>{{ $item->mobile_number }}</x-td>
            @empty
            <x-td>No data found.</x-td>
        </tr>
    
        @endforelse
    </table>
    </p>
@endsection

