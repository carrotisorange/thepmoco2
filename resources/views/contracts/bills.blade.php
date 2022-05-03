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
                    <x-button wire:submit.prevent="submitForm" onclick="window.location.href='/tenant/{{ $contract->tenant_uuid }}/contracts'">
                        <i class="fa-solid fa-circle-left"></i>&nbspBack</x-button>
                    <x-button data-modal-toggle="create-particular-modal">
                        <i class="fa-solid fa-circle-plus"></i>&nbspParticular
                    </x-button>
                    @if ($bills->count())
                    <x-button onclick="window.location.href='/contract/{{ $contract->uuid }}/moveout'"><i class="fa-solid fa-circle-check"></i>&nbspSave</x-button>
                    @else
                    <x-button onclick="window.location.href='/contract/{{ $contract->uuid }}/moveout'"><i class="fa-solid fa-forward"></i>&nbspSkip</x-button>
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
                  
                    <span>Total: {{ number_format($bills->sum('bill'), 2) }}</span>


                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reference No</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Bill No</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Period Covered</th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Particular</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <?php $ctr = 1; ?>
                            @foreach ($bills as $bill)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><b>{{
                                            $ctr++ }}</b></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $bill->reference_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $bill->bill_no }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        number_format($bill->bill,2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> {{
                                        Carbon\Carbon::parse($bill->start)->format('M d,
                                        Y') }}- {{ Carbon\Carbon::parse($bill->end)->format('M d,
                                        Y') }}</td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $bill->particular->particular }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/bill/{{ $bill->id }}/delete">
                                            @csrf
                                            @method('delete')
                                            <button class="text-red-600 hover:text-red-900"><i class="fa-2x fa-solid fa-trash-can"></i></button>
                                        </form>

                                    </td>
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