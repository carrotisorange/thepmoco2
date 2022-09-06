<x-tenant-portal-layout>
    @section('title', 'Bills')

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Bills</h1>

            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                <button type="button"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"><a
                        href="tenantbills_detail">Pay Bills</a></button>
                <button type="button"
                    onclick="window.location.href='/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/bills/export'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export
                    Bills</button>
            </div>
        </div>



        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative w-full mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search..." required>

                    </div>
            </div>

            </form>

            <div class="sm:col-span-2">
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300 ">Filters</label>
                    <div class="relative w-full mb-5">
                        <div class="flex absolute justify-end inset-y-0 left-0 items-center pl-3 pointer-events-none">

                        </div>
                        <button type="button"
                            class="px-2 py-3 h-9 rounded-lg border border-gray-300 dark:border-gray-600 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                            aria-controls="filter-section-0" aria-expanded="false">
                            <span class="text-sm font-medium text-gray-900"> Filter by: Default</span>
                            <span class="ml-6 flex items-center">
                                <!--
                        Expand/collapse icon, toggle classes based on question open state.
    
                        Heroicon name: solid/chevron-down
    
                        Open: "-rotate-180", Closed: "rotate-0"
                      -->
                                <svg class="rotate-0 h-5 w-5 transform" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        </h3>

                        <div class="hidden mt-5 grid grid-cols-1 gap-y-6  sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <div class=" pl-2 bg-white" id="filter-section-0">
                                    <div class="">


                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-0" name="category[]" value="tees"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-0"
                                                class="ml-3 text-sm text-gray-500">Oldest</label>

                                        </div>


                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-1" name="category[]" value="crewnecks"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-1"
                                                class="ml-3 text-sm text-gray-500">Latest</label>

                                        </div>


                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-2"
                                                class="ml-3 text-sm text-gray-500">Paid Bills</label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-2"
                                                class="ml-3 text-sm text-gray-500">Unpaid Bills</label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-2"
                                                class="ml-3 text-sm text-gray-500">Partially paid
                                                Bills</label>
                                        </div>





                                    </div>

                                </div>

                            </div>

                            <div class="sm:col-span-3">
                                <div class=" pl-2 bg-white" id="filter-section-0">
                                    <div class="">







                                    </div>

                                </div>
                                <div class="sm:col-span-3">
                                    <div class=" pl-2 bg-white" id="filter-section-0">
                                        <div class="">


                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                    type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-0"
                                                    class="ml-3 text-sm text-gray-500">Cash</label>
                                                <input type="text" name="building" id="building" autocomplete="building"
                                                    class="ml-2 focus:ring-indigo-500 focus:border-indigo-500 block w-10 h-3 shadow-sm sm:text-sm border border-gray-700 ">
                                            </div>

                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                    type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-0"
                                                    class="ml-3 text-sm text-gray-500">Bank</label>
                                                <input type="text" name="building" id="building" autocomplete="building"
                                                    class="ml-2 focus:ring-indigo-500 focus:border-indigo-500 block w-10 h-3 shadow-sm sm:text-sm border border-gray-700 ">
                                            </div>

                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                    type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-0"
                                                    class="ml-3 text-sm text-gray-500">E-wallet</label>
                                                <input type="text" name="building" id="building" autocomplete="building"
                                                    class="ml-2 focus:ring-indigo-500 focus:border-indigo-500 block w-10 h-3 shadow-sm sm:text-sm border border-gray-700 ">
                                            </div>

                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                    type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-0"
                                                    class="ml-3 text-sm text-gray-500">Cheque</label>
                                                <input type="text" name="building" id="building" autocomplete="building"
                                                    class="ml-2 focus:ring-indigo-500 focus:border-indigo-500 block w-10 h-3 shadow-sm sm:text-sm border border-gray-700 ">
                                            </div>

                                            <div class="mt-4 flex justify-end">
                                                <button type="submit"
                                                    class="ml-3 inline-flex justify-center  px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Apply
                                                    Filters</button>
                                            </div>





                                        </div>
                                    </div>
                                </div>


                            </div>



                        </div>
                    </div>


            </div>



            </form>






        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    <table class="min-w-full table-fixed">

                        <thead class="">
                            <tr>
                                <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">

                                </th>
                                <th scope="col"
                                    class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                    BILL #</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    DATE POSTED</th>


                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    UNIT</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    PERIOD COVERED</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    PARTICULAR</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    AMOUNT DUE</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    AMOUNT PAID</th>

                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    BALANCE</th>

                                </th>
                            </tr>
                        </thead>

                        @forelse ($bills as $index => $item)
                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium"> <a
                                        href="tenantbills_detail" class="text-purple-900">{{ $item->bill_no}}</a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    Carbon\Carbon::parse($item->created_at)->format('M d, y') }}</td>


                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if(auth()->user()->role_id == '8')
                                    {{ $item->unit->unit }}
                                    @else
                                    <div class="text-sm text-gray-900">
                                        <a class="text-blue-800 font-bold"
                                            href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">
                                            {{ $item->unit->unit }}
                                        </a>
                                    </div>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ Carbon\Carbon::parse($item->start)->format('M d,
                                    y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $item->particular->particular}}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ number_format($item->bill, 2) }}
                                    @if($item->status === 'paid')
                                    <span title="paid"
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </span>
                                    @elseif($item->status === 'partially_paid')
                                    <span title="partially_paid"
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                        <i class="fa-solid fa-clock"></i>
                                    </span>
                                    @else
                                    <span title="unpaid"
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </span>
                                    @endif
                                    @if($item->description === 'movein charges' && $item->status==='unpaid')
                                    <span title="urgent"
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                        <i class="fa-solid fa-bolt"></i>
                                    </span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">
                                    {{ number_format($item->initial_payment, 2) }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">
                                    {{ number_format(($item->bill-$item->initial_payment), 2) }}
                                </td>


                            </tr>
                        </tbody>
                        @empty
                        <tr>
                            <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">No bills
                                found.</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>

                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>


                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                number_format($bills->sum('bill'), 2) }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                number_format($bills->sum('initial_payment'), 2) }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }}</td>
                        </tr>

                    </table>

                </div>
                {{-- <button type="button"
                    class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                    All</button> --}}
            </div>
        </div>
    </div>

    {{-- <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $bills->links() }}
    </div> --}}
    </div>
</x-tenant-portal-layout>