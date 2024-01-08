@extends('layouts.export')
@section('title', 'Remittances')
@section('content')
<table class="text-left">
    <tr>
        <x-th>Owner</x-th>
        <x-td>{{ $remittance->owner->owner }}</x-td>
    </tr>
    <tr>
        <x-th>Tenant</x-th>
        <x-td>{{ $remittance->tenant->tenant }}</x-td>
    </tr>
    <tr>
        <x-th>Guest</x-th>
        <x-td>{{ $remittance->guest->guest }}</x-td>
    </tr>
    <tr>
        <x-th>Date</x-th>
        <x-td>{{ Carbon\Carbon::parse($remittance->created_at)->format('M, Y') }}</x-td>
    </tr>
    <tr>
        <x-th>Unit</x-th>
        <x-td>{{ $remittance->unit->unit }}</x-td>
    </tr>
    <tr>
        <x-th>Rent</x-th>
        <x-td>{{ number_format($remittance->monthly_rent, 2) }}</x-td>
    </tr>
    <tr>
        <x-th>Deductions</x-th>
        <x-td>{{ number_format($remittance->total_deductions, 2)}}</x-td>
    </tr>
    <tr>
        <x-th>Remittance</x-th>
        <x-td>{{ number_format($remittance->remittance, 2) }}</x-td>
    </tr>

</table>
</p>
@endsection
