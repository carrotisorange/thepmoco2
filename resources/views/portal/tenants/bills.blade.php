<x-tenant-portal-component>
    @section('title', 'Bills')

    <div class="flex flex-col p-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="mb-5">
                {{ $bills->links() }}
              </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                   
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bill #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date posted
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Unit
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Period Covered
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Particular
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount Due
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount Paid
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Balance
                                </th>

                              
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($bills as $index => $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">    
                                    {{ $item->bill_no }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                 {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
                                </td>

                               
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->unit->unit }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $item->unit->building->building }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ Carbon\Carbon::parse($item->start)->format('M
                                        d, Y').' - '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                                    </div>
                                    <div class="text-sm text-gray-500">{{
                                        Carbon\Carbon::parse($item->end)->diffInMonths($item->start) }} months</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->particular->particular}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ number_format($item->bill, 2) }}
                                    @if($item->status === 'paid')
                                    <span title="paid" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                       <i class="fa-solid fa-circle-check"></i>
                                    </span>
                                    @elseif($item->status === 'partially_paid')
                                    <span title="partially paid" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                       <i class="fa-solid fa-clock"></i>
                                    </span>
                                    @else
                                    <span title="unpaid" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                       <i class="fa-solid fa-circle-xmark"></i>
                                    </span>
                                    @endif

                                    @if($item->description === 'movein charges' && $item->status==='unpaid')
                                    <span title="urgent" class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                        <i class="fa-solid fa-bolt"></i>
                                    </span>
                                    @endif
                                
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    {{ number_format($item->initial_payment, 2) }}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                
                                   {{ number_format(($item->bill-$item->initial_payment), 2) }}
                                
                                </td>
                                

                                {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"></a>
                                </td> --}}

                            </tr>

                            @endforeach
                            <tr>
                                <x-td>Total</x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td>{{number_format($bills->sum('bill'),2) }}</x-td>
                                <x-td>{{number_format($bills->sum('initial_payment'),2) }}</x-td>
                                <x-td>{{number_format($bills->sum('bill') - $bills->sum('initial_payment') ,2)
                                    }}</x-td>
                            </tr>

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-tenant-portal-component>