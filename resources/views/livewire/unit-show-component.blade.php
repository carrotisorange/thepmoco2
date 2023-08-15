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
                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                        id="dropdownButton" data-dropdown-toggle="unitCreateDropdown" type="button">
                       
                        Add
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="unitCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            @if($unit_details->is_the_unit_for_rent_to_tenant)
                            <li>
                                @if($unit_details->occupancy > $unit_details->contracts()->where('status',
                                'active')->count())
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New tenant
                                </a>
                                @else
                                <a href="#/" data-modal-toggle="warning-create-tenant-modal" class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New tenant
                                </a>
                                @endif
                            </li>
                            @endif

                            <li>
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New owner
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/guest/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                                            text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                            dark:text-gray-200 dark:hover:text-white">
                                    New guest
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/concern/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                    dark:text-gray-200 dark:hover:text-white">
                                    New concern
                                </a>
                            </li>

                        </ul>
                    </div>

                    {{-- <a href="unit-calendar">
                        <button
                            class="ml-2 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="text-white w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                            Calendar

                        </button>
                    </a> --}}
                </div>

            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="grid grid-cols-2 lg:gap-6">

                    @if($unit_details->status_id == '1')
                    <img src="{{ asset('/brands/vacant.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @elseif($unit_details->status_id == '2')
                    <img src="{{ asset('/brands/occupied.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @elseif($unit_details->status_id == '3')
                    <img src="{{ asset('/brands/maintenance.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @elseif($unit_details->status_id == '4' || ($unit_details->status_id == '6'))
                    <img src="{{ asset('/brands/reserved.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @else
                    <img src="{{ asset('/brands/maintenance.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @endif

                    <div class="flex items-center justify-center ml-5">
                        {{-- <a href="#"
                            class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:purple">Upload

                        </a> --}}
                    </div>


                </div>
            </div>

            <div class="mt-8 lg:col-span-9" >
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="unit-tab"
                                data-tabs-target="#unit" type="button" role="tab" aria-controls="unit"
                                aria-selected="false">Unit</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="inventories-tab" data-tabs-target="#inventories" type="button" role="tab"
                                aria-controls="inventories" aria-selected="false">Inventories</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="owners-tab" data-tabs-target="#owners" type="button" role="tab"
                                aria-controls="owners" aria-selected="false">Owners</button>
                        </li>

                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="tenants-tab" data-tabs-target="#tenants" type="button" role="tab"
                                aria-controls="contacts" aria-selected="false">Tenants</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="guests-tab" data-tabs-target="#guests" type="button" role="tab"
                                aria-controls="guests" aria-selected="false">Guests</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="concerns-tab" data-tabs-target="#concerns" type="button" role="tab"
                                aria-controls="concerns" aria-selected="false">Concerns</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="utilities-tab" data-tabs-target="#utilities" type="button" role="tab"
                                aria-controls="utilities" aria-selected="false">Utilities</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab" aria-controls="bills"
                                aria-selected="false">Bills</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="collections-tab" data-tabs-target="#collections" type="button" role="tab" aria-controls="collections"
                                aria-selected="false">Collections</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="financials-tab" data-tabs-target="#financials" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Financials</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="remittance-summary-tab" data-tabs-target="#remittance-summary" type="button" role="tab"
                                aria-controls="remittance-summary" aria-selected="false">Remittance Summary</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="unit" role="tabpanel"
                        aria-labelledby="unit-tab">
                        <div>
                            @include('forms.units.unit-edit')
                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="inventories" role="tabpanel"
                        aria-labelledby="inventories-tab">
                        <button type="button"
                            onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/inventory/{{ Str::random(8) }}/create'"
                            class="rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                            Update
                        </button>

                        <a target="_blank"
                            href='/property/{{ $this->unit_details->property_uuid }}/unit/{{ $this->unit_details->uuid }}/inventory/{{ Str::random(8) }}/export'"
                        class=" inline-flex items-center justify-center rounded-md border border-transparent
                            bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400
                            focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                            Export
                        </a>
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>

                                    @if($inventories->count())

                                    @include('units.tables.inventories')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No inventories</h3>

                                        <div class="mt-6">
                                            <button type="button"
                                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/inventory/{{ Str::random(8) }}/create'"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                         

                                               New inventory
                                            </button>

                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="owners" role="tabpanel"
                        aria-labelledby="owners-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($deed_of_sales->count())
                                    @include('tables.deedofsales')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No owners</h3>

                                        <div class="mt-6">
                                            <button type="button"
                                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create'"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                         

                                               New owner
                                            </button>


                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple" id="financials" role="tabpanel" aria-labelledby="financials-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @include('units.tables.financials')
                                </div>

                            </div>

                        </div>
                    </div>
                    
                    <div class="hidden p-4 purple" id="remittance-summary" role="tabpanel"
                        aria-labelledby="remittance-summary-tab">
                        <div>
                        <div class="items-center justify-center">
                            <select id="small" wire:model="remittance_date"
                                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        
                                <option value="{{ $remittance_date }}">{{ Carbon\Carbon::parse($remittance_date)->format('M, Y') }}</option>
                                @foreach ($dates as $date)
                                @if(Carbon\Carbon::parse($date->created_at)->format('M, Y') != Carbon\Carbon::parse($remittance_date)->format('M, Y'))
                                    <option value="{{ $date->created_at }}">{{ Carbon\Carbon::parse($date->created_at)->format('M, Y') }}</option>
                                @endif
                                @endforeach
                            </select>
                                {{-- <button class="text-xs text-white bg-purple-500 hover:bg-gray-400 p-2 rounded-lg ">Send Email to Owner</button> --}}
                        </div>
                       
                            
                            {{-- <div class="-mt-10 flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-gray-900">Date
                                    </p>
             
                                </div>
                            </div> --}}

                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Date
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">
                                            {{ Carbon\Carbon::parse($remittance_date)->format('M, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Amount Collected
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('monthly_rent') + $remittances->sum('marketing_fee') + $remittances->sum('management_fee'), 2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Rent
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">
                                          {{ number_format($remittances->sum('monthly_rent'), 2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                       
                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-gray-900">Deductions
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
                                        Purchased Materials/Unit Repairs/Others
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

                            <div class="flex items-center px-8 py-5">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Net Remittance
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('remittance'), 2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            

                    </div>
                </div>


                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="tenants" role="tabpanel"
                        aria-labelledby="tenants-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($contracts->count())

                                    @include('tables.contracts')

                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No tenants</h3>

                                        <div class="mt-6">
                                            <button type="button"
                                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create'"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                 

                                              New tenant
                                            </button>


                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="guests" role="tabpanel"
                        aria-labelledby="guests-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($bookings->count())

                                    @include('tables.bookings')

                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No guests</h3>

                                        <div class="mt-6">
                                            <button type="button"
                                                onclick="window.location.href='/property/{{ Session::get('property') }}/calendar'"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                         

                                                New guest
                                            </button>

                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="concerns" role="tabpanel"
                        aria-labelledby="concerns-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($concerns->count())

                                    @include('units.tables.concerns')
                                    @else
                                    <div class=" mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No concerns</h3>

                                        <div class="mt-6">
                                            <button type="button"
                                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/concern/{{ Str::random(8) }}/create'"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                
                                              New concern
                                            </button>


                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="utilities" role="tabpanel"
                        aria-labelledby="utilities-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($utilities->count())
                                    @include('tables.utilities')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No utilities</h3>

                                        <div class="mt-6">
                                            <button type="button" wire:click="redirectToTheCreateUtilitiesPage"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                           

                                              New utility reading
                                            </button>


                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="bills" role="tabpanel"
                        aria-labelledby="bills-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($bills->count())
                                    @include('tables.bills')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>

                                        <div class="mt-6">
                                            <button type="button"
                                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/bills'"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                         

                                             New bill
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="collections" role="tabpanel" aria-labelledby="collections-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">
                    
                                    </div>
                                    @if($collections->count())
                                    @include('tables.collections')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No collections</h3>
                    
                                    </div>
                                    @endif
                    
                                </div>
                    
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.warnings.create-tenant-modal')
</div>