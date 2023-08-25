
@extends('layouts.export')
@section('title', 'Financial Reports')
@section('content')
    <p>
        Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
    </p>
    
    <p>
    <table class="">
    
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>DATE</x-th>
                <x-th>DESCRIPTION</x-th>
                <x-th>CASHIN</x-th>
                <x-th>CASHOUT</x-th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($accountpayables->union($collections) as $index => $cashflow)
            <tr>
                <x-td>{{ $index+1 }}</x-td>
                <x-td>{{ $cashflow->date }}</x-td>
                <x-td>{{ $cashflow->label }}</x-td>
                <x-td>
                    @if($cashflow->label == 'INCOME')
                    {{ number_format($cashflow->amount, 2) }}
                    @endif
                </x-td>
                <x-td>
                    @if($cashflow->label == 'EXPENSE')
                    {{ number_format($cashflow->amount, 2) }}
                    @endif
                </x-td>
            </tr>
            @endforeach
            <tr>
                <x-td>Total</x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td>{{ number_format($cashflows->where('label', 'INCOME')->sum('amount'), 2) }}</x-td>
                <x-td>{{ number_format($cashflows->where('label', 'EXPENSE')->sum('amount'), 2) }}</x-td>
            </tr>
        </tbody>
    </table>
    
    </p>
@endsection
