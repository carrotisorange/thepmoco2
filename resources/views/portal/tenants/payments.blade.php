<x-tenant-portal-component>
    @section('title', 'Payments')

    <div class="flex flex-col p-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                AR #
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date of Payment
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mode of Payment
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount Paid
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                            </th>


                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($payments as $index => $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->ar_no }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->mode_of_payment }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $item->bank.' '.$item->cheque_no }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">

                                {{ number_format($item->amount,2) }}

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">

                                    <x-button
                                        onclick="window.location.href='/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view'">
                                        View
                                    </x-button>
                                    <x-button
                                        onclick="window.location.href='/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export'">
                                        Export
                                    </x-button>
                                </td>

                            </tr>

                            @endforeach
                            <x-td>Total</x-td>
                            <x-td></x-td>
                            
                            <x-td></x-td>
                            <?php
                                $payments_count = App\Models\Collection::where('tenant_uuid', $item->tenant->uuid)->count();
                            ?>
                            <x-td>{{ number_format($payments->sum('amount'), 2) }} ({{ $payments_count }})</x-td>
                            <x-td></x-td>

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-tenant-portal-component>