<x-new-layout>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $contract_details->tenant->tenant }} /
                        Transfer Contract</h1>
                </div>

                <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Go back to tenant
                    </a></button>
            </div>
            @livewire('transfer-contract-component', ['contract_details' => $contract_details])
</x-new-layout>

{{-- <x-app-layout>
    @section('title', '| Transfer | Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property_uuid') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property') }}</a>
                                </li>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $contract_details->unit->unit }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $contract_details->tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Transfer Contract</li>

                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">

                    <x-button wire:submit.prevent="submitForm" onclick="window.location.href='{{ url()->previous() }}'">
                        Go Back</x-button>

                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    @livewire('transfer-contract-component', ['contract_details' => $contract_details])

                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
