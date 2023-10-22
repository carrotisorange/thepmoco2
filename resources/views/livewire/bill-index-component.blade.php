<div>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            @if($propertyBillsCount)

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


                <div class="group inline-block">
                    <x-button wire.loading.remove>
                        New bill
                        &nbsp; <i class="fa-solid fa-caret-down"></i>
                    </x-button>

                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                              transition duration-150 ease-in-out origin-top min-w-32">
                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                            <button type="button" data-modal-toggle="instructions-create-bill-modal">
                                Tenant
                            </button>
                        </li>

                    </ul>

                </div>

                <x-button wire:click="viewDelinquents" wire.loading.remove type="button">
                    @if($filter_bill_to === 'delinquent')
                    View All
                    @else
                    View Delinquents
                    @endif
                </x-button>

                @if($view === 'listView')
                <x-button wire:click="changeView('agingSummaryView')" wire.loading.remove type="button"> View Aging
                    Summary
                </x-button>
                @else
                <x-button wire:click="changeView('listView')" wire.loading.remove type="button"> View List
                </x-button>
                @endif

            </div>
            @endif


        </div>
        @if($propertyBillsCount)
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="sm:col-span-3">
                <x-form-select name="bill_type" wire:model="bill_type">
                    <option value="">Filter bill to</option>
                    <option value="guest_uuid">Guest</option>
                    <option value="owner_uuid">Owner</option>
                    <option value="tenant_uuid">Tenant</option>
                </x-form-select>

            </div>

            <div class="sm:col-span-3">
                <x-form-select name="status" wire:model="status">
                    <option value="">Filter bill status</option>
                    @foreach ($statuses as $item)
                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                    @endforeach

                </x-form-select>

            </div>
            <div class="sm:col-span-3">
                <x-form-select name="particular" wire:model="particular">
                    <option value="">Filter bill particulars</option>
                    @foreach ($particulars as $item)
                    <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                    @endforeach

                </x-form-select>

            </div>
            <div class="sm:col-span-3">
                <x-form-select name="posted_dates" wire:model="posted_dates">
                    <option value="">Filter bill dates</option>
                    <option value="monthly">1-30 days</option>
                    <option value="quaterly">1-90 days</option>
                    <option value="alltime">90 days and over</option>

                </x-form-select>

            </div>

        </div>
        @endif

        <div class="mt-3">
            {{ $bills->links() }}
        </div>

        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                    @if($bills->count())

                    @include('tables.bills')
                    @else
                    <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
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
                                    <x-button id="dropdownButton" data-dropdown-toggle="unitCreateDropdown">Add
                                        &nbsp; <i class="fa-solid fa-caret-down"></i>
                                    </x-button>

                                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                                              transition duration-150 ease-in-out origin-top min-w-32">



                                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                            <x-button data-modal-toggle="instructions-create-bill-modal">
                                                Tenant
                                            </x-button>


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
        @include('modals.instructions.create-bill-modal')
        @include('modals.instructions.create-particular-modal')
    </div>
</div>