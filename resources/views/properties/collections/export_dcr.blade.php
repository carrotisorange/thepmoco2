@extends('layouts.export')
@section('title', 'Daily Collection Report')
@section('content')
<p>
            Date: {{ Carbon\Carbon::parse($start_date)->format('M d, Y').'-'.Carbon\Carbon::parse($end_date)->format('M d, Y') }} ({{ $collections->count() }} collections )
        </p>
        <table class="">
            <tr>
                <x-th>#</x-th>
                <x-th>AR #</x-th>
                <x-th>OR #</x-th>
                <x-th>Bill #</x-th>
                <x-th>Unit</x-th>
                <x-th>Bill To</x-th>
                <x-th>Owner</x-th>
                <x-th>Particular</x-th>
                <x-th>Period Covered</x-th>
                <x-th>Amount</x-th>
            </tr>
            @foreach($collections as $index => $item)
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $index+1 }}</x-td>
                <x-td>{{ $item->ar_no }}</x-td>
                <x-td>{{ $item->or_no }}</x-td>
                <x-td>{{ $item->bill->bill_no }}</x-td>
                {{-- <x-td>{{ Carbon\Carbon::parse($item->bill->created_at)->format('M d, Y') }}</x-td> --}}
                <x-td>{{ $item->unit->unit }}</x-td>
                <x-td>
                    @if($item->tenant_uuid)
                    {{ $item->tenant->tenant}} (T)
                    @elseif($item->owner_uuid)
                    {{ $item->owner->owner}} (O)
                    @elseif($item->guest_uuid)
                    {{ $item->guest->guest}} (G)
                    @else
                    NA
                    @endif
                </x-td>
                <x-td>
                    @if($item->unit->deed_of_sales->count())
                    @foreach ($item->unit->deed_of_sales->where('status','!=','inactive')->take(1) as $owner)
                    {{ $owner->owner->owner }}
                    @endforeach
                    @else
                    NA
                    @endif
                </x-td>
                <x-td>{{ $item->bill->particular->particular }}</x-td>
                <x-td>{{ Carbon\Carbon::parse($item->bill->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($item->bill->end)->format('M d, Y') }} </x-td>
                <x-td>{{ number_format($item->collection,2) }}</x-td>
            </tr>
            @endforeach
            <tr>
                <x-td><b>Total</b> </x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td><b>{{ number_format($collections->sum('collection'), 2) }}</b> </x-td>
            </tr>
            </tbody>
        </table>

@endsection
