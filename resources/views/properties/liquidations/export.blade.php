@extends('layouts.export')
@section('title', 'Liquidation')
@section('content')
<p>
    Batch No: {{ $accountpayable->batch_no }}
</p>

<p>
    Created on: {{
    Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}
</p>

<p>
    Prepared by: 

    @if($accountpayable->prepared_by)
    {{App\Models\User::find($accountpayable->prepared_by)->name }}
    @else
    NA
    @endif
</p>

<p>
    Name: {{ $accountpayable->name }}
</p>

<p>
    Department/Section:{{  $accountpayable->department }}
</p>

<p>
    Unit: 
    @if($accountpayable->unit_uuid)
    {{ App\Models\Unit::find($accountpayable->unit_uuid)->unit }}
    @else
    NA
    @endif
</p>

<p>
    Approved By: @if($accountpayable->approved_by)
    {{ App\Models\User::find($accountpayable->approved_by)->name }}
    @else
    NA
    @endif
</p>
<p>
    Particulars
</p>
<p>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Unit #</x-th>
            <x-th>Vendor</x-th>
            <x-th>OR #</x-th>
            <x-th>Item</x-th>
            <x-th>Quantity</x-th>
            {{-- <x-th>REQUEST FOR</x-th> --}}
            <x-th>Amount</x-th>
            <x-th>Total</x-th>
  
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
@foreach($particulars as $index => $particular)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                @if($particular->unit_uuid)
                {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                @if($particular->vendor_id)
                            {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                            @else
                            NA
                            @endif
            </x-td>
            <x-td>
                {{ $particular->or_number }}
            </x-td>
            <x-td>
                {{ $particular->item }}
            </x-td>
            <x-td>
                {{ $particular->quantity }}
            </x-td>
            <x-td>
                {{ number_format($particular->price, 2) }}
            </x-td>
            <x-td>
                {{ number_format($particular->total, 2) }}
            </x-td>
        </tr>
        @endforeach
        <tr>
            <x-td><b>Total</b></x-td>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
      
            <x-td></x-td>
            <x-td><b>{{
            number_format($particulars->sum('total'),2) }}</b></x-td>
        
        </tr>
    </tbody>
</table>

</p>

@endsection