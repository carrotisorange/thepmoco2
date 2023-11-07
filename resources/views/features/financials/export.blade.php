@extends('layouts.export')
@section('title', 'Financials')
@section('content')
<p>
            Date: {{ Carbon\Carbon::parse($startDate)->format('M d, Y').'-'.Carbon\Carbon::parse($endDate)->format('M d, Y') }} 
        </p>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="">
                <tr>
                    <x-td><b>Collections</b></x-td>
                    <x-td></x-td>
                </tr>
            </thead>

            <thead class="">
                @foreach ($revenues as $index => $revenue)
                <tr>
                    <x-td>{{ $revenue->particular }}</x-td>
                    <x-td>{{ number_format($revenue->amount, 2) }}</x-td>
                </tr>
                @endforeach
            </thead>
            <thead class="">
                <tr>
                    <x-td><b>Gross Collections</b></x-td>
                    <x-td><b>{{ number_format($revenues->sum('amount'), 2) }}</b></x-td>
                </tr>
            </thead>
            <thead class="">
                <tr>
                    <x-td><b>Less Expenses</b></x-td>
                    <x-td></x-td>
                </tr>
            </thead>
            <thead class="">
                @foreach ($expenses as $index => $expense)
                <tr>
                    <x-td>{{ $expense->particular }}</x-td>
                    <x-td>{{ number_format($expense->expense, 2) }}</x-td>
                </tr>
                @endforeach
            </thead>
            <thead class="">
                <tr>
                    <x-td><b>Total Expenses</b></x-td>

                    <x-td><b>{{ number_format($expenses->sum('expense'), 2) }}</b></x-td>
                </tr>
            </thead>
            <thead class="">
                <tr>
                    <x-td><b>Net Collection</b></x-td>

                    <x-td><b>{{ number_format($revenues->sum('amount') - $expenses->sum('expense'), 2) }}</b></x-td>
                </tr>
            </thead>

        </table>

@endsection
