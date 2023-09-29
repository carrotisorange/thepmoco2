<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Collections</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <input type="date" wire:model="date"
                    class="nline-flex items-center justify-center rounded-md border border-transparentpx-4 py-2 text-sm font-mediumshadow-smfocus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                {{-- <a
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Export DCR
                </a> --}}
                <div class="group inline-block">
                    <x-button
                       >  <span class="pr-1 font-semibold flex-1"> Export
                            collection</span>
                        <span>
                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                            transition duration-150 ease-in-out"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </x-button>

                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                                                                      transition duration-150 ease-in-out origin-top min-w-32">

                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="/property/{{ Session::get('property_uuid') }}/dcr/{{ $date }}/excel" target="_blank"
                               >as Excel</a>
                        </li>
                       <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="/property/{{ Session::get('property_uuid') }}/dcr/{{ $date }}/pdf"
                                target="_blank">as PDF</a>
                        </li>

                    </ul>

                </div>

                <x-button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/collection/pending'"> Verify Payments
                </x-button>
                <div class="group inline-block">
                    <x-button
                      >  <span class="pr-1 font-semibold flex-1"> New
                            collection</span>
                        <span>
                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                            transition duration-150 ease-in-out"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                    </x-button>

                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                                                      transition duration-150 ease-in-out origin-top min-w-32">

                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a
                                href="/property/{{ Session::get('property_uuid') }}/tenant"
                                data-modal-toggle="create-particular-modal">from tenant</a>
                        </li>
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a href="/property/{{ Session::get("
                                property") }}/owner" data-modal-toggle="create-particular-modal">from owner</a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>
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
            <div class="sm:col-span-3">
                <x-select name="bill_type" wire:model="bill_type">
                    <option value="">Filter collection to</option>
                    <option value="guest_uuid">Guest</option>
                    <option value="owner_uuid">Owner</option>
                    <option value="tenant_uuid">Tenant</option>
                </x-select>

            </div>

            <div class="sm:col-span-3">
                <x-select name="form" wire:model="form">
                    <option value="">Filter mode of payments </option>
                    @foreach ($mode_of_payments as $item)
                    <option value="{{ $item->form }}">{{ $item->form }}</option>
                    @endforeach
                </x-select>

            </div>

        </div>
        <div class="mt-3">
                {{ $collections->links() }}
        </div>

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    @if($collections->count())
                    @include('tables.collections')
                    @else
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No collections</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new collection</p>
                            <div class="mt-6">
                                <div class="group inline-block">
                                    <x-button
                                      >  <span class="pr-1 font-semibold flex-1">
                                            New collection</span>
                                        <span>
                                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                                                        transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </x-button>

                                    <ul
                                        class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                                                                                                  transition duration-150 ease-in-out origin-top min-w-32">

                                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a
                                                href="/property/{{ Session::get('property_uuid') }}/tenant"
                                                data-modal-toggle="create-particular-modal">to tenant</a>
                                        </li>
                                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a
                                                href="/property/{{ Session::get(" property") }}/owner"
                                                data-modal-toggle="create-particular-modal">to owner</a>
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
