<div>
    @include('layouts.notifications')
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Bills</h1>
            </div>
            @if($propertyBillsCount)
          
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @if($search || $status || $particular || $posted_dates || $bill_type)
                <x-button wire:click="clearFilters()" wire.loading.remove
                   
                    type="button">Clear Filters
                </x-button>
                @endif
                
                <div class="group inline-block">
                    <x-button wire.loading.remove >
                        <span class="pr-1 font-semibold flex-1"> New
                            bill</span>
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

                <x-button wire:click="viewDelinquents" wire.loading.remove
                  
                    type="button">
                    @if($filter_bill_to === 'delinquent')
                    View All
                    @else
                    View Delinquents
                    @endif
                </x-button>

                @if($view === 'listView')
                <x-button wire:click="changeView('agingSummaryView')" wire.loading.remove
                    type="button"> View Aging Summary
                </x-button>
                @else
                <x-button wire:click="changeView('listView')" wire.loading.remove

                    type="button"> View List
                </x-button>
                @endif

            </div>
            @endif
           

        </div>
        @if($propertyBillsCount)
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="sm:col-span-3">
                <x-select name="bill_type" wire:model="bill_type">
                    <option value="">Filter bill to</option>
                    <option value="guest_uuid">Guest</option>
                    <option value="owner_uuid">Owner</option>
                    <option value="tenant_uuid">Tenant</option>
                </x-select>

            </div>

            <div class="sm:col-span-3">
                <x-select name="status" wire:model="status">
                    <option value="">Filter bill status</option>
                    @foreach ($statuses as $item)
                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                    @endforeach

                </x-select>

            </div>
            <div class="sm:col-span-3">
                <x-select name="particular" wire:model="particular">
                    <option value="">Filter bill particulars</option>
                    @foreach ($particulars as $item)
                    <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                    @endforeach

                </x-select>

            </div>
            <div class="sm:col-span-3">
                <x-select name="posted_dates" wire:model="posted_dates">
                    <option value="">Filter bill dates</option>
                    <option value="monthly">1-30 days</option>
                    <option value="quaterly">1-90 days</option>
                    <option value="alltime">90 days and over</option>

                </x-select>

            </div>

        </div>
        @endif

        <div class="mt-3">
          {{ $bills->links() }}
        </div>

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
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
                                    <x-button
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        <span class="pr-1 font-semibold flex-1"><i class="fa-solid fa-plus"></i>
                                            &nbsp
                                            New bill</span>
                                        <span>
                                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                            transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </x-button>

                                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                                              transition duration-150 ease-in-out origin-top min-w-32">



                                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                            <x-button type="button" data-modal-toggle="instructions-create-bill-modal">
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