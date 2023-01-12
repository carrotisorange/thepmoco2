<div>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Cashflow from operations</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


            </div>

        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                {{-- <div class="mt-3">
                    {{ $accountpayables->links() }}
                </div> --}}
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    {{-- <div class="sm:col-span-4">

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

                    <div class="sm:col-span-2">
                        <select id="small" wire:model="filter"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

                            <option value="daily">Daily</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>

                    </div>

                </div>
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">


                    @if($accountpayables->count() || $collections->count())

                    @include('tables.cashflows')
                    @else
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <<div class="mx-auto max-w-lg">
                            <h2 class="text-md font-medium text-gray-900">Cashflow from operations will be generated
                                automatically when you do the following:</h2>
                            {{-- <p class="mt-1 text-sm text-gray-500">Get started by selecting a template or start from
                                an
                                empty project.</p> --}}
                            <ul role="list" class="mt-6 divide-y divide-gray-200 border-t border-b border-gray-200">
                                <li>
                                    <div class="group relative flex items-start space-x-3 py-4">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-pink-500">
                                                <!-- Heroicon name: outline/megaphone -->
                                                <i class="fa-solid fa-receipt"></i>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/property/{{ Session::get('property') }}/bill">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Bills
                                                </a>
                                            </div>
                                            <p class="text-sm text-gray-500">Add bills to tenants and owners.
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0 self-center">
                                            <!-- Heroicon name: mini/chevron-right -->
                                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="group relative flex items-start space-x-3 py-4">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-purple-500">
                                                <!-- Heroicon name: outline/command-line -->
                                                <i class="fa-solid fa-coins"></i>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/property/{{ Session::get('property') }}/collection">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Collections
                                                </a>
                                            </div>
                                            <p class="text-sm text-gray-500">Add the payments to the respective tenants
                                                and owners.</p>
                                        </div>
                                        <div class="flex-shrink-0 self-center">
                                            <!-- Heroicon name: mini/chevron-right -->
                                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="group relative flex items-start space-x-3 py-4">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-yellow-500">
                                                <!-- Heroicon name: outline/calendar -->
                                                <i class="fa-solid fa-file-invoice"></i>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/property/{{ Session::get('property') }}/accountpayable">
                                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                                    Account Payables
                                                </a>
                                            </div>
                                            <p class="text-sm text-gray-500">Make a request for purchase, payment, and
                                                refund.</p>
                                        </div>
                                        <div class="flex-shrink-0 self-center">
                                            <!-- Heroicon name: mini/chevron-right -->
                                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="mt-6 flex">
                                <a href="/property/{{ Str::random(8) }}/create"
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                    Or start from an empty property
                                    <span aria-hidden="true"> &rarr;</span>
                                </a>
                            </div>
                    </div>
                </div>
                @endif

            </div>

        </div>
    </div>
</div>
</div>