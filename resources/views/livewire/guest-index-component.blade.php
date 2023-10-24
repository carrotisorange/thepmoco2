<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/calendar'">
                    View Guests in Calendar
                </x-button>
            </div>
        </div>
        @if($propertyBookingsCount)
        <div class="mt-3">
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
                        <input type="search" id="uuid" wire:model="uuid"
                            class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for confirmation no..." required>

                    </div>

                </div>

                <div class="sm:col-span-6">
                    <x-form-select name="status" wire:model="status">
                        <option value="">Filter status</option>
                        <option value="checked-in">Checked-in</option>
                        <option value="checked-out">Checked-out</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="reserved">Reserved</option>

                    </x-form-select>

                </div>

            </div>

            {{-- {{ $bookings->links() }} --}}
        </div>
        @endif
        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    @if(!$propertyBookingsCount)
                    <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No guests</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new guest</p>
                            <div class="mt-6">
                                <x-button
                                    onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/calendar'">
                                    New Guest
                                </x-button>
                            </div>
                        </div>
                    </div>
                    @else
                    @include('tables.bookings')
                    @endif
                </div>
            </div>
        </div>
        @include('modals.instructions.create-guest-modal')
    </div>
</div>
