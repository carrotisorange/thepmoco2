<x-app-layout>
    @section('title', '| Moveout | Create')
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
                                <li class="text-gray-500">{{ $contract->unit->unit }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $contract->tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Moveout Charges</li>

                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button wire:submit.prevent="submitForm"
                        onclick="window.location.href='/tenant/{{ $contract->tenant_uuid }}/contracts'">
                        <i class="fa-solid fa-circle-left"></i>&nbspBack
                    </x-button>
                    <x-button data-modal-toggle="create-particular-modal">
                        <i class="fa-solid fa-circle-plus"></i>&nbspParticular
                    </x-button>
                    @if ($bills->count())
                    <x-button onclick="window.location.href='/contract/{{ $contract->uuid }}/moveout'"><i
                            class="fa-solid fa-circle-check"></i>&nbspSave</x-button>
                    @else
                    <x-button onclick="window.location.href='/contract/{{ $contract->uuid }}/moveout'"><i
                            class="fa-solid fa-forward"></i>&nbspSkip</x-button>
                    @endif
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    @livewire('moveout-bill-component', ['contract' => $contract, 'bills'
                    => $bills])
                    <br>
                    @if ($bills->count())
                    Reference #: <b> {{ $contract->tenant->bill_reference_no }} </b>
                    ,
                    Total bills: <b>{{ number_format($bills->sum('bill'), 2) }} </b>

                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Bill #</x-th>
                                    <x-th>Amount</x-th>
                                    <x-th>Period Covered</x-th>
                                    <x-th>Particular</x-th>
                                    <x-th></x-th>
                                    
                                </tr>
                            </thead>
                            <?php $ctr = 1; ?>
                            @foreach ($bills as $bill)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <x-td>{{ $ctr++ }}</x-td>
                                    <x-td>{{ $bill->bill_no }}</x-td>
                                    <x-td>{{ number_format($bill->bill,2) }}</x-td>
                                    <x-td>{{ Carbon\Carbon::parse($bill->start)->format('M d, Y') }}- {{ Carbon\Carbon::parse($bill->end)->format('M d, Y') }}</x-td>
                                    <x-td>{{ $bill->particular->particular }}</x-td>
                                    <x-td>
                                        <form method="POST" action="/bill/{{ $bill->id }}/delete">
                                            @csrf
                                            @method('delete')
                                            <x-button><i class="fa-solid fa-trash-can"></i></x-button>
                                        </form>
                                    </x-td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('utilities.create-particular-modal');
</x-app-layout>