<div>
    <style>
        /* since nested groupes are not supported we have to use 
                                 regular css for the nested dropdowns 
                              */
        li>ul {
            transform: translatex(100%) scale(0)
        }

        li:hover>ul {
            transform: translatex(50%) scale(1)
        }

        li>button svg {
            transform: rotate(-90deg)
        }

        li:hover>button svg {
            transform: rotate(-270deg)
        }

        .group:hover .group-hover\:scale-100 {
            transform: scale(1)
        }

        .group:hover .group-hover\:-rotate-180 {
            transform: rotate(180deg)
        }

        .scale-0 {
            transform: scale(0)
        }

        .min-w-32 {
            min-width: 8rem
        }
    </style>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Bills</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @if($search || $status || $particular_id || $posted_dates)
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

                        {{-- <a href="#/" data-modal-toggle="create-particular-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Particular
                        </a> --}}

                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="#/"
                                data-modal-toggle="create-particular-modal">Particular</a>
                        </li>

                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                            <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                <span class="pr-1 flex-1">Bills</span>
                                <span class="mr-auto">
                                    <svg class="fill-current h-4 w-4
                                        transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </button>

                            <ul
                                class="bg-white border rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left min-w-32">

                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                        <span class="pr-1 flex-1">Tenant</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                            transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>

                                    <ul
                                        class="bg-white border rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left min-w-32">
                                        {{-- <a href="#/" data-modal-toggle="create-express-bill"
                                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Express Bill
                                        </a> --}}
                                        {{--
                                        <li class="rounded-sm px-2 py-1 hover:bg-gray-100"><button type="button"
                                                data-modal-toggle="create-express-bill-modal">
                                                Express Bill
                                            </button></li> --}}

                                        {{-- <a href="#/" data-modal-toggle="create-customized-bill"
                                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Customized Bill
                                        </a> --}}

                                        <li class="rounded-sm px-2 py-1 hover:bg-gray-100"><button type="button"
                                                data-modal-toggle="create-customized-bill-modal">
                                                Customized Bill
                                            </button></li>

                                    </ul>
                                </li>

                                {{-- <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                        <span class="pr-1 flex-1">Owner</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                                                        transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul class="bg-white border rounded-sm absolute top-0 right-0 
                                                              transition duration-150 ease-in-out origin-top-left
                                                              min-w-32
                                                              ">
                                        <li class="px-3 py-1 hover:bg-gray-100">Express Bills</li>
                                        <li class="px-3 py-1 hover:bg-gray-100">Customized Bills</li>
                                    </ul>
                                </li> --}}

                            </ul>
                        </li>
                    </ul>

                </div>

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
                    <div class="sm:col-span-6">

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

                    </div>

                    <div class="sm:col-span-2">
                        <select id="status" wire:model="status"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Filter bill status</option>
                            @foreach ($statuses as $item)
                            <option value="{{ $item->status }}">{{ $item->status }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="sm:col-span-2">
                        <select id="particular_id" wire:model="particular_id"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Filter bill particulars</option>
                            @foreach ($particulars as $item)
                            <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="sm:col-span-2">
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
                            
                            <button type="button" wire:loading.remove wire:click="removeBills"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Remove
                                bills ({{ count($selectedBills) }})
                            </button>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    {{ $bills->links() }}
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

                                        {{-- <a href="#/" data-modal-toggle="create-particular-modal"
                                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Particular
                                        </a> --}}

                                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="#/"
                                                data-modal-toggle="create-particular-modal">Particular</a>
                                        </li>

                                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                            <button
                                                class="w-full text-left flex items-center outline-none focus:outline-none">
                                                <span class="pr-1 flex-1">Bills</span>
                                                <span class="mr-auto">
                                                    <svg class="fill-current h-4 w-4
                                                        transition duration-150 ease-in-out"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </span>
                                            </button>

                                            <ul
                                                class="bg-white border rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left min-w-32">

                                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                                    <button
                                                        class="w-full text-left flex items-center outline-none focus:outline-none">
                                                        <span class="pr-1 flex-1">Tenant</span>
                                                        <span class="mr-auto">
                                                            <svg class="fill-current h-4 w-4
                                                            transition duration-150 ease-in-out"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                            </svg>
                                                        </span>
                                                    </button>

                                                    <ul
                                                        class="bg-white border rounded-sm absolute top-0 right-0 transition duration-150 ease-in-out origin-top-left min-w-32">
                                                        {{-- <a href="#/" data-modal-toggle="create-express-bill"
                                                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                            Express Bill
                                                        </a> --}}
                                                        {{--
                                                        <li class="rounded-sm px-2 py-1 hover:bg-gray-100"><button
                                                                type="button"
                                                                data-modal-toggle="create-express-bill-modal">
                                                                Express Bill
                                                            </button></li> --}}

                                                        {{-- <a href="#/" data-modal-toggle="create-customized-bill"
                                                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                            Customized Bill
                                                        </a> --}}

                                                        <li class="rounded-sm px-2 py-1 hover:bg-gray-100"><button
                                                                type="button"
                                                                data-modal-toggle="create-customized-bill-modal">
                                                                Customized Bill
                                                            </button></li>

                                                    </ul>
                                                </li>

                                                {{-- <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                                    <button
                                                        class="w-full text-left flex items-center outline-none focus:outline-none">
                                                        <span class="pr-1 flex-1">Owner</span>
                                                        <span class="mr-auto">
                                                            <svg class="fill-current h-4 w-4
                                                                                        transition duration-150 ease-in-out"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <ul class="bg-white border rounded-sm absolute top-0 right-0 
                                                                              transition duration-150 ease-in-out origin-top-left
                                                                              min-w-32
                                                                              ">
                                                        <li class="px-3 py-1 hover:bg-gray-100">Express Bills</li>
                                                        <li class="px-3 py-1 hover:bg-gray-100">Customized Bills</li>
                                                    </ul>
                                                </li> --}}

                                            </ul>
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
    </div>
    @include('modals.popup-error')
    @include('layouts.notifications')
</div>