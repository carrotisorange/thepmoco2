@extends('layouts.export')
@section('title', 'Account Payables')
@section('content')
    <div class="mx-10">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Accounts Payable Details</h1>
    
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
    
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Batch
                                        No
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayable->batch_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Request For
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayable->request_for }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Requested Amount
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ number_format($accountpayable->amount, 2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Requested on
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Due
                                        Date on
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ Carbon\Carbon::parse($accountpayable->due_date)->format('M d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Delivery Date on
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ Carbon\Carbon::parse($accountpayable->delivery_at)->format('M d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Requested by
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayable->requester->name }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Status
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayable->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Approver 1 (Manager)
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($accountpayable->approver_id)
                                        {{ App\Models\User::find($accountpayable->approver_id)->name }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Approver 2 (Account Payable)
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($accountpayable->approver2_id)
                                        {{ App\Models\User::find($accountpayable->approver2_id)->name }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                </tr> --}}
    
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
    
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Bank Details</h1>
    
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
    
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Bank
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayable->bank }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Bank Name
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayable->bank_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Bank Account Number
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayable->bank_account }}
                                    </td>
                                </tr>
    
                            </thead>
    
                        </table>
                    </div>
                </div>
            </div>
    
    
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Particulars</h1>
    
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>UNIT</x-th>
                                    <x-th>VENDOR</x-th>
                                    <x-th>ITEM </x-th>
                                    <x-th>QUANTITY</x-th>
                                    <x-th>Price</x-th>
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
                                        {{ $particular->item }}
                                    </x-td>
                                    <x-td>
                                        {{ $particular->quantity }}
                                    </x-td>
                                    {{-- @if($accountpayable->request_for === 'payment') --}}
                                    <x-td>
                                        {{ number_format($particular->price, 2) }}
                                    </x-td>
                                    <x-td>
                                        {{ number_format($particular->price * $particular->quantity, 2) }}
                                    </x-td>
                                    {{-- @endif --}}
    
                                </tr>
    
                                @endforeach
                                <tr>
                                    <x-td><b>Total</b></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td><b>{{ number_format($particulars->sum('total'),2) }}</b></x-td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
@endsection
