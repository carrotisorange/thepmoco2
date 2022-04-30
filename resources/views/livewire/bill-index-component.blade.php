<x-app-layout>
    @section('title', '| Bills')
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
                                <li class="text-gray-500">Bills</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenants'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbsp Back
                    </x-button>


                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <x-search placeholder="search for tenants"></x-search>
            </div>
            <div class="mt-5">
                {{ $bills->links() }}
            </div>
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">

                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <x-th>Bill no</x-th>
                                                    <x-th>Reference No</x-th>
                                                    {{-- <x-th>Payee</x-th> --}}

                                                    <x-th>Particular</x-th>
                                                    <x-th>Amount</x-th>
                                                    <x-th>Status</x-th>
                                                </tr>
                                            </thead>
                                            @forelse ($bills as $item)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <x-td>{{ $item->bill_no}}</x-td>
                                                    <x-td>{{ $item->reference_no}}</x-td>
                                                    {{-- <x-td>{{ $item->tenant->uuid }}</x-td> --}}

                                                    <x-td>{{ $item->particular->particular}}</x-td>
                                                    <x-td>{{ number_format($item->bill, 2) }}</x-td>
                                                    <x-td>@if($item->status === 'paid')
                                                        <span
                                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            <i class="fa-solid fa-circle-check"></i> {{
                                                            $item->status }}
                                                            @else
                                                            <span
                                                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                                <i class="fa-solid fa-clock"></i> {{
                                                                $item->status }}
                                                            </span>
                                                            @endif
                                                    </x-td>
                                                    @empty
                                                    <x-td>No data found!</x-td>
                                                    @endforelse
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>