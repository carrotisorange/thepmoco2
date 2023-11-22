@extends('layouts.export')
@section('title', 'Remittances')
@section('content')
<p>
    Date: {{ Carbon\Carbon::parse($date)->format('M, Y') }}
</p>
<p>
    Total Count: {{ $remittances->count() }}
</p>
<p>
    Total Amount: {{ number_format($remittances->sum('remittance'), 2) }}
</p>
<p>
<table class="">
    <tr>
        <x-th>#</x-th>
        <x-th>Owner</x-th>
        <x-th>Unit #</x-th>
        <x-th>AR #</x-th>
        <x-th>Rent</x-th>
        <x-th>Net Rent</x-th>
        <x-th>Mgmt Fee</x-th>
        <x-th>Marketing Fee</x-th>
        <x-th>Other Deductions</x-th>
        <x-th>Remittance</x-th>
    </tr>
    @foreach($remittances as $index=> $item)
    <tr>
        <x-td>{{ $index+1 }}</x-td>
        <x-td>{{ Str::limit($item->owner->owner,15) }}</x-td>
        <x-td>{{ Str::limit($item->unit->unit, 15) }}</x-td>
        <x-td>{{ $item->ar_no }}</x-td>
        <x-td>{{ number_format($item->monthly_rent, 2) }}</x-td>
        <x-td>{{ number_format($item->net_rent, 2) }}</x-td>
        <x-td>{{ number_format($item->management_fee, 2) }}</x-td>
        <x-td>{{ number_format($item->marketing_fee, 2) }}</x-td>
       <x-td>{{ number_format($item->total_deductions, 2) }}</x-td>
      <x-td>{{ number_format($item->remittance, 2) }}</x-td>
    </tr>
    @endforeach
</table>
</p>
@endsection
