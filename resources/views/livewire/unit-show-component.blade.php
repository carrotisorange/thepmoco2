<?php
    $statusIcon = App\Models\Status::find($unit_details->status_id)->icon;
    $addAnchorClass = 'block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white';
?>

<div>
    @include('layouts.notifications')
    @include('modals.popup-error')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $unit_details->unit }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <x-button  id="dropdownButton" data-dropdown-toggle="unitCreateDropdown">Add
                        &nbsp; <i class="fa-solid fa-caret-down"></i>
                    </x-button>

                    <div id="unitCreateDropdown" class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            @if($unit_details->is_the_unit_for_rent_to_tenant)
                            <li>
                                @if($unit_details->occupancy > $unit_details->contracts()->where('status','active')->count())
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New tenant
                                </a>
                                @else
                                <a href="#/" data-modal-toggle="warning-create-tenant-modal" class="{{ $addAnchorClass }}">
                                    New tenant
                                </a>
                                @endif
                            </li>
                            @endif

                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New owner
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/guest/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New guest
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/concern/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New concern
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>
                <div class="grid grid-cols-2 lg:gap-6">
                    <img src="{{ asset('/brands/'.$statusIcon) }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />

                    <div class="flex items-center justify-center ml-5">
                        {{-- <a href="#"
                            class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:purple">Upload

                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($unitSubfeaturesArray as $subfeature)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="{{ $subfeature }}-tab"
                                data-tabs-target="#{{ $subfeature }}" type="button" role="tab"
                                aria-controls="{{ $subfeature }}" aria-selected="false">
                                {{ $subfeature }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div id="myTabContent" wire:ignore>
                    @foreach($unitSubfeaturesArray as $subfeature)
                    @if($subfeature == 'unit')
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div>
                            @include('forms.units.unit-edit')
                        </div>
                    </div>
                    @else
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel" aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                @if($subfeature == 'inventory')
                                    @if($inventories->count())
                                        @include('units.tables.inventories')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                       <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No inventories</h3>
                                        <div class="mt-6">
                                            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/inventory/{{ Str::random(8) }}/create'" >
                                                New inventory
                                            </x-button>
                                        </div>
                                    </div>
                                    @endif
                                @elseif($subfeature == 'owner')
                                    @if($deed_of_sales->count())
                                        @include('tables.deedofsales')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No owners</h3>
                                        <div class="mt-6">
                                            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create'">
                                                New owner
                                            </x-button>
                                        </div>
                                    </div>
                                    @endif
                                @elseif($subfeature == 'tenant')
                                    @if($contracts->count())
                                    @include('tables.contracts')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No tenants</h3>

                                        <div class="mt-6">
                                            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create'">
                                                New tenant
                                            </x-button>
                                        </div>
                                    </div>
                                    @endif
                                @elseif($subfeature == 'guest')
                                    @if($bookings->count())
                                        @include('tables.bookings')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                       <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No guests</h3>
                                        <div class="mt-6">
                                            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/calendar'">
                                                New guest
                                            </x-button>

                                        </div>
                                    </div>
                                    @endif
                                @elseif($subfeature == 'concern')
                                    @if($concerns->count())
                                        @include('tables.concerns')
                                    @else
                                    <div class=" mt-10 text-center mb-10">
                                       <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No concerns</h3>

                                        <div class="mt-6">
                                            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_details->uuid }}/concern/{{ Str::random(8) }}/create'">
                                                New concern
                                            </x-button>


                                        </div>
                                    </div>
                                    @endif
                                @elseif($subfeature == 'utility')
                                    @if($utilities->count())
                                        @include('tables.utilities')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                       <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No utilities</h3>

                                        <div class="mt-6">
                                            <x-button  wire:click="redirectToTheCreateUtilitiesPage">
                                                New utility reading
                                            </x-button>
                                        </div>
                                    </div>
                                    @endif
                                @elseif($subfeature == 'collection')
                                    @if($collections->count())
                                        @include('tables.collections')
                                    @else
                                        <div class="mt-10 text-center mb-10">
                                            <i class="fa-solid fa-circle-plus"></i>
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">No collections</h3>
                                        </div>
                                    @endif
                                @elseif($subfeature == 'financial')
                                    @include('units.tables.financials')
                                @elseif($subfeature == 'remittance')
                                <div class="flex justify-end items-center ">
                                    <x-button onclick="window.location.href='/property/{{ $unit_details->property_uuid }}/unit/{{ $unit_details->uuid }}/remittances'">See More Remittance</x-button>
                                    </div>
                                                            <div>
                                                                {{-- <div class="items-center justify-center">
                                                                    <select id="small" wire:model="remittance_date"
                                                                        class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

                                                                        <option value="{{ $remittance_date }}">{{
                                                                            Carbon\Carbon::parse($remittance_date)->format('M, Y') }}</option>
                                                                        @foreach ($dates as $date)
                                                                        @if(Carbon\Carbon::parse($date->created_at)->format('M, Y') !=
                                                                        Carbon\Carbon::parse($remittance_date)->format('M, Y'))
                                                                        <option value="{{ $date->created_at }}">{{
                                                                            Carbon\Carbon::parse($date->created_at)->format('M, Y') }}</option>
                                                                        @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <button class="text-xs text-white bg-purple-500 hover:bg-gray-400 p-2 rounded-lg ">Send
                                                                        Email to Owner</button>
                                                                </div> --}}


                                                                {{-- <div class="-mt-10 flex items-center px-8 py-5 border-b">
                                                                    <div class="w-0 flex-1 pt-0.5">
                                                                        <p class="text-sm font-medium text-gray-900">Date
                                                                        </p>

                                                                    </div>
                                                                </div> --}}

                                                                {{-- <div class="flex items-center px-8 py-5 border-b">
                                                                    <div class="w-0 flex-1 pt-0.5">
                                                                        <div class="grid grid-cols-2">
                                                                            <p class="text-sm font-medium text-gray-900">Date
                                                                            </p>
                                                                            <p class="mt-1 text-sm font-base text-gray-500">
                                                                                {{ Carbon\Carbon::parse($remittance_date)->format('M, Y') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}

                                                                <div class="flex items-center px-8 py-5 border-b">
                                                                    <div class="w-0 flex-1 pt-0.5">
                                                                        <div class="grid grid-cols-2">
                                                                            <p class="text-sm font-medium text-gray-900">Total Amount Collected
                                                                            </p>
                                                                            <p class="mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('monthly_rent') +
                                                                                $remittances->sum('marketing_fee') + $remittances->sum('management_fee'),
                                                                                2)}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex items-center px-8 py-5 border-b">
                                                                    <div class="w-0 flex-1 pt-0.5">
                                                                        <div class="grid grid-cols-2">
                                                                            <p class="text-sm font-medium text-gray-900">Total Rent
                                                                            </p>
                                                                            <p class="mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('monthly_rent'), 2)}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex items-center px-8 py-5 border-b">
                                                                    <div class="w-0 flex-1 pt-0.5">
                                                                        <div class="grid grid-cols-2">
                                                                            <p class="text-sm font-medium text-gray-900">Total Deductions
                                                                            </p>
                                                                            <p class="mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('total_deductions'), 2)}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex items-center px-8 py-5 border-b">
                                                                    <div class="w-0 flex-1 pt-0.5">
                                                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">

                                                                        </p>
                                                                        <div class="grid grid-cols-2">

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Bank Transfer Fee
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('bank_transfer_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Management Fee
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('management_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Marketing Fee
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('marketing_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Purchased Materials/Unit Repairs/Etc
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('miscellaneous_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Membership Fee
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('membership_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Condo Dues
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('condo_dues'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Parking Dues
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('parking_dues'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Water
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('water'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Electricity
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('electricity'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Generator Share
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('generator_share'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Surcharges
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('surcharges'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Building Insurance
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('building_insurance'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Real Property Tax
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('real_property_tax'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Housekeeping Fee
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('housekeeping_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Laundry Fee
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('laundry_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Complimentary
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('complimentary'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Internet
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('internet'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Special Assessment
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('special_assessment'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Materials Recovery Facility
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('materials_recovery_facility'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Recharge of Fire Extinguisher
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('recharge_of_fire_extinguisher'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Environmental Fee
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('environmental_fee'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Bladder Tank
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('bladder_tank'), 2)}}
                                                                            </p>

                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                Cause of Magnet
                                                                            </p>
                                                                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('cause_of_magnet'), 2)}}
                                                                            </p>









                                                                        </div>
                                                                    </div>
                                                                </div>




                                                                <div class="flex items-center px-8 py-5">
                                                                    <div class="w-0 flex-1 pt-0.5">
                                                                        <div class="grid grid-cols-2">
                                                                            <p class="text-sm font-medium text-gray-900">Total Remittance
                                                                            </p>
                                                                            <p class="mt-1 text-sm font-base text-gray-500">
                                                                                {{ number_format($remittances->sum('remittance'), 2)}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                            </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    @include('modals.warnings.create-tenant-modal')
</div>
