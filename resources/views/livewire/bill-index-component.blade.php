<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-700">Bills</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            @if($batch_no)
            <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/bill'">Show all bills
            </x-button>
            @endif
            @if($view === 'listView')
            <button wire:click="changeView('agingSummaryView')"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                type="button">View Aging Summary
            </button>
            @else
            <button wire:click="changeView('listView')"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                type="button">View List
            </button>
            @endif
            @can('billing')
            <button
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                id="dropdownButton" data-dropdown-toggle="unitCreateDropdown" type="button">Create <svg
                    class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg></button>
            @endcan
            <!-- Dropdown menu -->
            <div id="unitCreateDropdown"
                class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1" aria-labelledby="dropdownButton">
                    <li>
                        @if($active_contracts->count()>0)
                        <a href="#/" data-modal-toggle="create-express-bill-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Express Bill
                        </a>
                        @else
                        <a href="#/" data-modal-toggle="popup-error-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Express Bill
                        </a>
                        @endif
                    </li>
                    <li>
                        @if($active_contracts->count()>0)
                        <a href="#/" data-modal-toggle="create-customized-bill-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Customized Bill
                        </a>
                        @else
                        <a href="#/" data-modal-toggle="popup-error-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Customized Bill
                        </a>
                        @endif
                    </li>
                    <li>
                        <a href="#/" data-modal-toggle="create-particular-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Particular
                        </a>
                    </li>
                </ul>
            </div>
            {{-- <button type="button"
                onclick="window.location.href='/property/{{ Session::get('property') }}/user/{{ Str::random(8) }}/create'"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                Employee</button> --}}

        </div>
    </div>

    <div class="mt-6 grid grid-cols-3 gap-x-10 sm:grid-cols-6 sm:gap-x-10 lg:gap-x-10 sm:space-x-5 lg:pr-16">
        <div class="col-span-3">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative w-full mb-2">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search" wire:model="search"
                    class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter tenant reference no..." required>

            </div>

            <div>
                <p class="text-sm text-center text-gray-500">
                    Showing
                    <span class="font-medium">{{ $bills->count() }}</span>
                    results
                </p>
            </div>

        </div>

        <div class="sm:col-span-1">
            <select id="small" wire:model="status"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">Filter bill status</option>
                @foreach ($statuses as $item)
                <option value="{{ $item->status }}">{{ $item->status }}</option>
                @endforeach
            </select>

        </div>

        <div class="sm:col-span-1">
            <select id="small" wire:model="particular_id"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">Filter bill particulars</option>
                @foreach ($particulars as $item)
                <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                @endforeach
            </select>

        </div>


        <div class="sm:col-span-1">
            <select id="small" wire:model="posted_dates"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">Filter bill dates</option>
                <option value="monthly">1-30 days</option>
                <option value="quaterly">1-90 days</option>
                <option value="alltime">90 days and over</option>
            </select>

        </div>

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
                                class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">BILL #
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DATE
                                POSTED</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">UNIT</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PERIOD
                                COVERED</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PARTICULAR
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">AMOUNT DUE
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">AMOUNT
                                PAID</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">BALANCE

                        </tr>
                    </thead>

                    @if($view === 'listView')
                    @forelse ($bills as $item)
                    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                        <!-- Selected: "bg-gray-50" -->
                        <tr>
                            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                <!-- Selected row marker, only show when row is selected. -->
                                {{--
                                <input type="checkbox"
                                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                --}}
                            </td>
                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                {{ $item->bill_no}}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-purple-700">
                                <a class="text-blue-500 text-decoration-line: underline"
                                    href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}/bills">
                                    {{ $item->tenant->tenant}}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-purple-700">
                                <a class="text-blue-500 text-decoration-line: underline"
                                    href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}/bills">
                                    {{ $item->unit->unit}}
                                </a>
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
                        @empty
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">No bills found!</td>
                        </tr>

                        <!-- More people... -->
                    </tbody>
                    @endforelse

                    @endif
                    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                                number_format($bills->sum('bill'), 2) }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                                number_format($bills->sum('initial_payment'), 2) }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                                number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }}</td>
                        </tr>
                    </tbody>


                </table>
            </div>
            {{-- <button type="button"
                class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                All</button> --}}
        </div>
    </div>
    @include('modals.popup-error-modal')
</div>

{{-- <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    {{ $users->links() }}
</div> --}}