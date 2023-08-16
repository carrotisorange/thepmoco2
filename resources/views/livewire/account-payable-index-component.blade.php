<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Request for Purchases</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                @if($created_at || $status || $request_for || $limitDisplayTo)
                <button type="button" wire:click="clearFilters"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    Clear Filters
                </button>
                @endif
                <a href="/property/{{$property->uuid}}/accountpayable/export/{{ $status }}/{{ $created_at }}/{{ $request_for }}/{{ $limitDisplayTo }}"
                    target="_blank"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    Export All
                </a>
                <a href="/property/{{ Session::get('property_uuid') }}/accountpayable/{{ 'purchase' }}/{{ Str::random(3) }}/store"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    New Request
                </a>



            </div>

        </div>

        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-6">
                {{-- <input id="search" wire:model="search" placeholder="Search for batch no..."
                    class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                --}}
            </div>
            <div class="sm:col-span-3">
                {{-- <select id="status" wire:model="status"
                    class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="">Filter status</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                    @endforeach
                </select> --}}
            </div>

            <div class="sm:col-span-3">
                {{-- <select id="limitDisplayTo" wire:model="limitDisplayTo"
                    class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="" selected>Limit display to</option>
                    @for ($i = 1; $i <= $totalAccountPayableCount; $i++) @if($i%10===0 || $i==$totalAccountPayableCount)
                        <option value="{{ $i }}">{{ $i }} </option>
                        @endif
                        @endfor
                </select> --}}
            </div>

        </div>

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    @if($accountpayables->count())
                    @include('tables.accountpayables')
                    @else
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No pending requests found</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new request</p>
                            <div class="mt-6">
                                <div class="group inline-block">
                                    <button
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        <span class="pr-1 font-semibold flex-1">
                                            New Request</span>
                                        <span>
                                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                                            transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>
                                    or
                                    <button wire:click="clearFilters"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        <span class="pr-1 font-semibold flex-1"> &nbsp
                                            Show All Requests</span>

                                        </span>
                                    </button>

                                    <ul
                                        class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                                                                                      transition duration-150 ease-in-out origin-top min-w-32">

                                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a
                                                href="/property/{{ Session::get('property_uuid') }}/accountpayable/{{ 'payment' }}/{{ Str::random(3) }}/store"
                                                data-modal-toggle="create-particular-modal">payment</a>
                                        </li>
                                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a
                                                href="/property/{{ Session::get('property_uuid') }}/accountpayable/{{ 'payment' }}/{{ Str::random(3) }}/store"
                                                data-modal-toggle="create-particular-modal"> purchase</a>
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
</div>