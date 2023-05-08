@extends('layouts.export')
@section('title', 'Financial Reports')
@section('content')
    <p>
        Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
    </p>
    
    <p>
    <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                    Description</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Value</th>
    
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    Potential Gross Rent (total rent amount of rent per unit)
                </td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                    number_format($potential_gross_rent, 2) }}</td>
    
            </tr>
    
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    Less Vacancy (total rent amount of vacant units)
                </td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                    number_format($less_vacancy, 2)
                    }}</td>
    
            </tr>
    
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    Effective Gross Rent (total rent amount of occupied units)
                </td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                    number_format($effective_gross_rent, 2) }}</td>
    
            </tr>
    
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    Billed Rent (all posted rent)
                </td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                    number_format($billed_rent,
                    2) }}</td>
    
            </tr>
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    Collected Rent (all paid rent)
                </td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                    number_format($collected_rent,
                    2) }}</td>
    
            </tr>
    
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                    Actual Revenue Collected (all payments collected)
                </td>
                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                    number_format($actual_revenue_collected,
                    2) }}</td>
    
            </tr>
        </tbody>
    </table>
    
    </p>

@endsection