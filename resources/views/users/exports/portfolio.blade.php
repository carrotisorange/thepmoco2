@extends('layouts.export')
@section('title', 'Portfolio')
@section('content')

<table class="">
    <tr>
        <x-th>
            Property
        </x-th>
        @foreach ($data as $property)
        <x-td>
           {{
        Str::limit($property->property->property,10) }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Type
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{
            Str::limit($property->property->type->type,10) }}
  
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Personnel</x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->property_users()->count() }}
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Units</x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->units()->count() }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Occupied Units</x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->units->where('status_id', 2)->count() }}
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Vacant Units </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->units->where('status_id', 1)->count() }}
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Reserved Units </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->units->where('status_id', 4)->count() }}
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Dirty Units
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->units->where('status_id', 3)->count() }}
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Under Maintenance Units
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->units->where('status_id', 5)->count() }}
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Occupancy Rate
        </x-th>
        @foreach ($data as $property)
        @if($property->property->units->count())
        <?php $occupancy_rate = $property->property->units->where('status_id', 2)->count()/$property->property->units->count() * 100; ?>
        @else
        <?php $occupancy_rate = 0;?>
        @endif
        <x-td>
            {{ number_format($occupancy_rate, 2) }} %
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Bills For Collection
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ number_format($property->property->bills->sum('bill'), 2) }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Collected Bills
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ number_format($property->property->collections->sum('collection'), 2) }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Uncollected Bills
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ number_format($property->property->bills->whereIn('status', ['unpaid',
            'partially_paid'])->sum('bill') -
            $property->property->bills->whereIn('status', ['unpaid',
            'partially_paid'])->sum('initial_payment'), 2) }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Collection Efficiency
        </x-th>
        @foreach ($data as $property)
        @if($property->property->bills->count())
        <?php $collection_efficiency = 
                                                            $property->property->collections->sum('collection') / $property->property->bills->sum('bill'); ?>
        @else
        <?php $collection_efficiency = 0;?>
        @endif
        <x-td>
            {{ number_format($collection_efficiency * 100, 2) }} %
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Past Due Accounts
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->bills->whereIn('status', ['unpaid',
            'partially_paid'])->count() -
            $property->property->bills->whereIn('status', ['unpaid',
            'partially_paid'])->count() }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Contracts
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->contracts->count() }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Active Contracts
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->contracts->where('status','active')->count() }}
        </x-td>
        @endforeach
    </tr>

    <tr>
        <x-th>
            Expiring Contracts
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->contracts->where('status','inactive')->count() }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Expired Contracts
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->contracts->where('status','inactive')->count() }} </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Received Concerns
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->concerns->count() }}
        </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Pending Concerns
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->concerns->where('status','pending')->count() }} </x-td>
        @endforeach
    </tr>
    <tr>
        <x-th>
            Closed Concerns
        </x-th>
        @foreach ($data as $property)
        <x-td>
            {{ $property->property->concerns->where('status','closed')->count() }} </x-td>
        @endforeach
    </tr>
</table>
@endsection
