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
                    <x-button data-modal-toggle="create-bulk-bill-modal"> Bulk bill </x-button>
                </div>
                <div class="group inline-block">
                    <x-button data-modal-toggle="particular-create-component"> Create Particular </x-button>
                </div>


                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/bill/delinquents'">
                    View Delinquents
                </x-button>

                <div class="group inline-block">
                    <x-button>Export &nbsp; <i class="fa-solid fa-caret-down"></i></x-button>
                    <ul
                        class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute  transition duration-150 ease-in-out origin-top min-w-32">
                        {{-- <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="/property/{{ Session::get('property_uuid') }}/bill/export/{{ 'excel' }}"
                                target="_blank">as Excel</a>
                        </li> --}}
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="/property/{{ Session::get('property_uuid') }}/bill/export/{{ 'pdf' }}"
                                target="_blank">as PDF</a>
                        </li>
                    </ul>
                </div>

                @if($view === 'listView')
                <x-button wire:click="changeView('agingSummaryView')"> View Aging
                    Summary
                </x-button>
                @else
                <x-button wire:click="changeView('listView')"> View List
                </x-button>
                @endif
            </div>
            @endif
        </div>
        @if($propertyBillsCount)
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <x-form-select name="bill_type" wire:model="bill_type">
                    <option value="">Bill To</option>
                    <option value="guest_uuid">Guest</option>
                    <option value="owner_uuid">Owner</option>
                    <option value="tenant_uuid">Tenant</option>
                </x-form-select>
            </div>
            <div class="sm:col-span-3">
                <x-form-select name="status" wire:model="status">
                    <option value="">Status</option>
                    @foreach ($statuses as $item)
                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                    @endforeach
                </x-form-select>
            </div>
            <div class="sm:col-span-3">
                <x-form-select name="particular_id" wire:model="particular_id">
                    <option value="">Particulars</option>
                    @foreach ($particulars as $item)
                    <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                    @endforeach
                </x-form-select>
            </div>
          <div class="sm:col-span-3">
                <x-form-select name="created_at" wire:model="created_at">

                    <option value="">Date started</option>
                   @foreach ($dates_posted as $item)
                  <option value="{{ $item->start }}">{{ Carbon\Carbon::parse($item->start)->format('M, Y')}}</option>
                    @endforeach
                </x-form-select>
            </div>
            {{-- <div class="sm:col-span-3">
                <x-form-select name="posted_dates" wire:model="posted_dates">
                    <option value="">Filter bill dates</option>
                    <option value="monthly">1-30 days</option>
                    <option value="quaterly">1-90 days</option>
                    <option value="alltime">90 days and over</option>
                </x-form-select>
            </div> --}}
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
                               <x-button data-modal-toggle="create-bulk-bill-modal"> Bulk bill </x-button>

                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @livewire('create-bulk-bill-component')
        @livewire('particular-create-component')
    </div>
</div>
