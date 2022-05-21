<x-app-layout>
    @section('title', $tenant->tenant)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                <li class="text-gray-500">Collections</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/tenant/{{ $tenant->uuid }}/edit'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbsp Back
                    </x-button>
                </h5>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            Total Collections: <b> {{ number_format($collections->sum('amount'),
                2)}}</b>
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <x-th>AR #</x-th>
                                                {{-- <x-th>Unit</x-th> --}}

                                                <x-th>Date collected</x-th>

                                                {{-- <x-th>Bill ID</x-th> --}}

                                                <x-th>Mode of payment</x-th>
                                                <x-th>Period Covered</x-th>
                                                <x-th>Amount</x-th>
                                                <x-th></x-th>
                                            </tr>
                                        </thead>
                                        @forelse ($collections as $item)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <x-td>{{ $item->ar_no }}</x-td>
                                                {{-- <x-td>

                                                    <div class="text-sm text-gray-900">{{
                                                        $item->unit->unit}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        $item->unit->building->building}}
                                                    </div>
                                                </x-td> --}}

                                                <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y')
                                                    }}</x-td>
                                                {{-- <x-td>{{ $item->bill_id }}</x-td> --}}

                                                <x-td>{{ $item->mode_of_payment }}</x-td>
                                                <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                                                    Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                                                </x-td>
                                                <x-td>{{ number_format($item->amount,2) }}</x-td>
                                                <x-td>
                                                    <x-button
                                                        onclick="window.location.href='/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export'">
                                                        <i class="fa-solid fa-download"></i>&nbspExport
                                                    </x-button>
                                                </x-td>
                                                @empty
                                                <x-td>No data found!</x-td>
                                            </tr>
                                        </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>