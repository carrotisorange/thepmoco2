<x-app-layout>
    @section('title', '| Collections')
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
                                <li class="text-gray-500">
                                    {{ Str::plural('Collection', $collections->count())}}
                                </li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    {{--
                    <x-button onclick="window.location.href='/employee/{{ Str::random(10) }}/create'">Collection
                    </x-button> --}}
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            Total Collections: <b> {{ number_format($collections->sum('collection'),
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
                                                <x-th>Ref #</x-th>
                                                <x-th>AR #</x-th>
                                                <x-th>Date collected</x-th>
                                       
                                                {{-- <x-th>Bill ID</x-th> --}}
                                              
                                                <x-th>Mode of Payment</x-th>
                                                <x-th>Period Covered</x-th>
                                                <x-th>Amount</x-th>
                                            </tr>
                                        </thead>
                                        @forelse ($collections as $item)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <x-td><a href="/tenant/{{ $item->tenant->uuid }}/collections"><b class="text-blue-600">{{
                                                            $item->tenant->bill_reference_no}}</b></a></x-td>
                                                <x-td>{{ $item->ar_no }}</x-td>
                                                <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
                                                {{-- <x-td>{{ $item->bill_id }}</x-td> --}}
                                             
                                                <x-td>{{ $item->form }}</x-td>
                                                <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d, Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}  </x-td>
                                                <x-td>{{ number_format($item->collection,2) }}</x-td>
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
