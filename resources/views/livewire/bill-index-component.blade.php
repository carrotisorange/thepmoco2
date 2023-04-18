<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Bills</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @if($search || $status || $particular || $posted_dates || $bill_type)
                <button wire:click="clearFilters()"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button"><i class="fa-solid fa-delete-left"></i> &nbsp; Clear Filters
                </button>
                @endif
                &nbsp;
                <div class="group inline-block">
                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                        <span class="pr-1 font-semibold flex-1"><i class="fa-solid fa-plus"></i> &nbsp New
                            bill</span>
                        <span>
                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                            transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </button>

                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                              transition duration-150 ease-in-out origin-top min-w-32">
                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                            <button type="button" data-modal-toggle="instructions-create-bill-modal">
                                Tenant
                            </button>
                        </li>
                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                            <button type="button" data-modal-toggle="instructions-create-bill-modal">
                                Owner
                            </button>
                        </li>
                    </ul>

                </div>

                <button wire:click="viewDelinquents"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    @if($filter_bill_to === 'delinquent')
                    View All
                    @else
                    View Delinquents
                    @endif
                </button>

                @if($view === 'listView')
                <button wire:click="changeView('agingSummaryView')"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button"><i class="fa-solid fa-image"></i> &nbsp; View Aging Summary
                </button>
                @else
                <button wire:click="changeView('listView')"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button"><i class="fa-solid fa-list"></i> &nbsp; View List
                </button>
                @endif

                {{-- <button wire:click="exportBills" wire:loading.remove
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button">Export
                </button>

                <button wire:target="exportBills" wire:loading disabled
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button">Loading...
                </button> --}}

            </div>

        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    {{-- <div class="sm:col-span-6">

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
                            <input type="search" id="default-search" wire:model="search"
                                class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search for reference no" required>

                        </div>

                    </div> --}}

                    <div class="sm:col-span-1">
                        <select id="bill_type" wire:model="bill_type"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Filter bill type</option>
                            <option value="guest_uuid">Guest</option>
                            <option value="owner_uuid">Owner</option>
                            <option value="tenant_uuid">Tenant</option>
                        </select>

                    </div>

                    <div class="sm:col-span-1">
                        <select id="status" wire:model="status"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Filter bill status</option>
                            @foreach ($statuses as $item)
                            <option value="{{ $item->status }}">{{ $item->status }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="sm:col-span-1">
                        <select id="particular" wire:model="particular"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Filter bill particulars</option>
                            @foreach ($particulars as $item)
                            <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="sm:col-span-1">
                        <select id="posted_dates" wire:model="posted_dates"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Filter bill dates</option>
                            <option value="monthly">1-30 days</option>
                            <option value="quaterly">1-90 days</option>
                            <option value="alltime">90 days and over</option>

                        </select>

                    </div>

                </div>

                <div class="mt-5">
                    <div class="flex flex-row">
                        <div class="basis-3/4">
                        </div>
                        <div class="basis-1/4 ml-12 text-right">
                            {{-- <button type="button" wire:loading disabled
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Loading...
                            </button> --}}
                            @if($selectedBills)
                            @can('is_account_receivable_delete_allowed')
                            <button type="button" wire:loading.remove wire:click="removeBills"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Remove
                                bills ({{ count($selectedBills) }})
                            </button>
                            @endif
                            @endif

                        </div>
                    </div>
                </div>
                {{-- <div class="mt-3">
                    {{ $bills->links() }}
                </div> --}}

                <div class="mt-3">
                    <p class="text-center">
                        <span class="text-blue-300 text-xs">Showing {{ $bills->count() }} bills...</span>
                    </p>
                </div>
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">


                    @if($bills->count())

                    @include('tables.bills')
                    @else
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new bill</p>
                            <div class="mt-6">
                                <div class="group inline-block">
                                    <button
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        <span class="pr-1 font-semibold flex-1"><i class="fa-solid fa-plus"></i> &nbsp
                                            New bill</span>
                                        <span>
                                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                            transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>

                                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                                              transition duration-150 ease-in-out origin-top min-w-32">



                                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                            <button type="button" data-modal-toggle="instructions-create-bill-modal">
                                                Tenant
                                            </button>


                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
        @include('layouts.notifications')
        @include('modals.instructions.create-bill-modal')
        @include('modals.instructions.create-particular-modal')
    </div>
</div>