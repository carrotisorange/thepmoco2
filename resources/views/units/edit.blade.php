<x-index-layout>
    @section('title', '| '.$unit->unit)
    <x-slot name="labels">
        {{ $unit->unit }}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/units'">Go back to
            units
        </x-button>
        <x-button data-modal-toggle="add-building-modal">Create a building
        </x-button>
        {{-- @include('utilities.show-unit-show-options')
        @include('utilities.show-unit-create-options') --}}
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Unit</h1>
        <div>
            <form action="/unit/{{ $unit->uuid }}/update" method="POST" id="edit-form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex flex-row">
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="unit" value="Unit" />

                            <x-form-input form="edit-form" type="text" name="unit" value="{{old('unit', $unit->unit)}}"
                                required autofocus />

                            @error('unit')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="building_id" :value="__('Building')" />

                            <x-form-select form="edit-form" name="building_id" id="building_id">
                                @foreach($buildings as $building)
                                <option value="{{ $building->id }}" {{ $building->id == $unit->building_id ?
                                    'selected' : ''
                                    }}>{{ $building->building }}</option>
                                @endforeach
                            </x-form-select>

                            @error('building_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="floor_id" :value="__('Floor')" />

                            <x-form-select form="edit-form" name="floor_id" id="floor_id">
                                @foreach($floors as $floor)
                                <option value="{{ $floor->id }}" {{ $floor->id == $unit->floor_id ?
                                    'selected' : ''
                                    }}>{{ $floor->floor }}</option>
                                @endforeach
                            </x-form-select>

                            @error('floor_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="category_id" :value="__('Category')" />

                            <x-form-select form="edit-form" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $unit->category_id) ==
                                    $category->id ? 'selected' : '' }}>
                                    {{ $category->category }}
                                </option>
                                @endforeach
                            </x-form-select>

                            @error('category_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="flex flex-row">
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="category_id" :value="__('Status')" />

                            <x-form-select form="edit-form" name="status_id" id="status_id">
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ old('status_id', $unit->status_id) ==
                                    $status->id ? 'selected' : '' }}>
                                    {{ $status->status }}
                                    @endforeach
                            </x-form-select>

                            @error('status_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <div class="basis-full">
                            <x-label for="size" :value="__('Size')" />

                            <x-form-input form="edit-form" type="text" name="size" value="{{old('size', $unit->size)}}"
                                required autofocus />

                            @error('size')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="rent" :value="__('Rent')" />

                            <x-form-input form="edit-form" type="number" step="0.00" name="rent"
                                value="{{old('rent', $unit->rent)}}" autofocus />

                            @error('rent')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-row">
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="discount" :value="__('Discount')" />

                            <x-form-input form="edit-form" type="number" step="0.00" name="discount"
                                value="{{old('discount', $unit->discount)}}" autofocus />

                            @error('discount')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="basis-full">
                        <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                            <x-label for="occupancy" :value="__('Occupancy')" />

                            <x-form-input form="edit-form" type="number" name="occupancy"
                                value="{{old('occupancy', $unit->occupancy)}}" autofocus />

                            @error('occupancy')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{--
                    <div class="mt-5 flex">
                        <div class="flex-3">
                            <x-label for="thumbnail" :value="__('Thumbnail')" />

                            <x-form-input form="edit-form" id="thumbnail" type="file" name="thumbnail"
                                value="{{old('thumbnail', $unit->thumbnail)}}" autofocus />

                            @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $unit->thumbnail }}" alt="">
                        </div>
                    </div> --}}
                </div>
                <div class="">
                    <div class="mt-5">
                        <p class="text-right">
                            <x-button form="edit-form">Update Unit Info</x-button>
                        </p>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Contracts</h1>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <?php $ctr =1; ?>
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Tenant</x-th>
                    <x-th>Contract</x-th>
                    <x-th>Rent/Mo</x-th>
                    <x-th>Status</x-th>
                    <x-th>Interaction</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            @forelse ($contracts as $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $ctr++ }}</x-td>
                    <x-td>{{ $item->tenant->tenant }}</x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{
                            Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                            '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                        </div>

                        <div class="text-sm text-gray-500">{{
                            Carbon\Carbon::parse($item->end)->diffInMonths($item->start)
                            }} months
                        </div>

                    </x-td>
                    <x-td>{{number_format($item->rent, 2)}}</x-td>
                    <x-td>
                        @if($item->status === 'active')
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i> {{ $item->status }}
                        </span>
                        @else

                        <span class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $item->status }}
                        </span>
                        @endif
                        @if($item->end <= Carbon\Carbon::now()->addMonth() && $item->status
                            == 'active')
                            <span
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fa-solid fa-clock"></i> expiring
                            </span>
                            @endif
                    </x-td>
                    <x-td>{{ $item->interaction->interaction }}</x-td>
                    <x-td>
                        <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                            type="button">Actions<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg></x-button>

                        <div id="dropdownDivider.{{ $item->uuid }}"
                            class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1" aria-labelledby="dropdownDividerButton">

                                <li>
                                    <a href="/contract/{{ $item->uuid }}/export"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fa-solid fa-file-contract"></i>&nbspExport
                                    </a>
                                </li>

                                <li>
                                    <a href="/contract/{{ $item->uuid }}/transfer"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                    </a>
                                </li>
                                <li>
                                    <a href="/contract/{{ $item->uuid }}/renew"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                    </a>
                                </li>

                            </ul>
                            <?php
                                                                    $unpaid_bills = App\Models\Tenant::find($item->tenant_uuid)->bills->where('status', '!=', 'paid');
                                                                ?>
                            @if($item->status == 'active')
                            <div class="py-1">
                                @if($unpaid_bills->count()<=0) <a href="/contract/{{ $item->uuid }}/moveout"
                                    class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                                    @else
                                    <a data-modal-toggle="popup-error-modal" href="#/"
                                        class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                                    @endif

                            </div>
                            @endif
                        </div>
                    </x-td>
                    @empty
                    <x-td>No data found!</x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
        <div class="mt-5">
            <span>Showing the last 5 contracts</span>
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ Str::random(8) }}/old_create'">
                    Create a contract
                </x-button>
                <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/contracts/'">See more contracts
                </x-button>
            </p>
        </div>
    </div>


    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Deed of sales</h1>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <?php $ctr =1; ?>
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>name</x-th>
                    <x-th>Date of turnover</x-th>
                    <x-th>Price</x-th>
                    <x-th>Classification</x-th>
                    <x-th>Status</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            @forelse ($deed_of_sales as $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $ctr++ }}</x-td>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <a href="/owner/{{ $item->owner_uuid }}">
                                    <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->owner->photo_id }}"
                                        alt=""></a>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{
                                    $item->owner->owner }}
                                </div>

                            </div>
                        </div>
                    </x-td>
                    <x-td>
                        {{ Carbon\Carbon::parse($item->turnover_at)->format('M d, Y') }}
                    </x-td>
                    <x-td>{{ number_format($item->price, 2) }}</x-td>
                    <x-td>{{ $item->classification }}</x-td>
                    <x-td>
                        @if($item->status === 'active')
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i> {{
                            $item->status }}
                            @else
                            <span
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fa-solid fa-clock"></i> {{
                                $item->status }}
                            </span>
                            @endif
                    </x-td>
                    <x-td>
                        <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                            type="button">Actions
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </x-button>
                        <div id="dropdownDivider.{{ $item->uuid }}"
                            class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                <li>
                                    <a href="/owner/{{ $item->owner->uuid }}/"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fa-solid fa-user"></i>&nbspShow
                                        Owner</a>
                                </li>
                            </ul>
                        </div>
                    </x-td>
                    @empty
                    <x-td>No data found!</x-td>
                    @endforelse
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <span>Showing the last 5 deed of sales</span>
            <p class="text-right">
                <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/owner/{{ Str::random(8) }}/create'">
                    Create a deed of sale
                </x-button>
                <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/deed_of_sales/'">See more deed of sales
                </x-button>
            </p>
        </div>
    </div>



    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Leasing</h1>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <?php $ctr =1; ?>
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Owner</x-th>
                    <x-th>Contract Period</x-th>
                    <x-th>Agreed Rent/mo</x-th>
                    <x-th>Status</x-th>

                    <x-th></x-th>
                </tr>
            </thead>
            @forelse ($enrollees as $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $ctr++ }}</x-td>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <a href="/owner/{{ $item->owner_uuid }}">
                                    <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->owner->photo_id }}"
                                        alt=""></a>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{
                                    $item->owner->owner }}
                                </div>

                            </div>
                        </div>
                    </x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{
                            Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                            '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                        </div>
                        <div class="text-sm text-gray-500">{{
                            Carbon\Carbon::parse($item->end)->diffForHumans($item->start)
                            }}
                        </div>
                    </x-td>
                    <x-td>
                        {{ number_format($item->rent, 2) }}
                    </x-td>
                    <x-td>
                        @if($item->status === 'active')
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i> {{
                            $item->status }}
                            @else
                            <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fa-solid fa-clock"></i> {{
                                $item->status }}
                            </span>
                            @endif
                    </x-td>

                    <x-td>
                        <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                            type="button">Actions<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg></x-button>

                        <div id="dropdownDivider.{{ $item->uuid }}"
                            class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1" aria-labelledby="dropdownDividerButton">

                                <li>
                                    <a href="/contract/{{ $item->uuid }}/edit"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fa-solid fa-file-contract"></i>&nbspShow
                                        Contract</a>
                                </li>

                                <li>
                                    <a href="/contract/{{ $item->uuid }}/transfer"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                        Contract</a>
                                </li>
                                <li>
                                    <a href="/contract/{{ $item->uuid }}/renew"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                            class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                        Contract</a>
                                </li>
                            </ul>
                            @if($item->status == 'active')
                            <div class="py-1">
                                <a href="/contract/{{ $item->uuid }}/moveout/bills"
                                    class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspUnenroll</a>
                            </div>
                            @endif
                        </div>
                    </x-td>
                    @empty
                    <x-td>No data found!</x-td>
                    @endforelse
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <span>Showing the last 5 leasing contracts</span>
            <p class="text-right">
                <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/enrollees/'">See more leasing contracts
                </x-button>
            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Bills</h1>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <?php $ctr =1; ?>
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>

                    <x-th>Payee</x-th>
                    <x-th>Period Covered</x-th>
                    <x-th>Particular</x-th>
                    <x-th>Amount</x-th>
                    <x-th>Status</x-th>
                    <x-th>Amount Paid</x-th>
                    <x-th>Balance</x-th>
                </tr>
            </thead>
            @forelse ($bills as $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $ctr++ }}</x-td>

                    <x-td>@if($item->tenant_uuid)
                        {{ $item->tenant->tenant}} (<span>T</span>)
                        @else
                        {{ $item->owner->owner}}
                        @endif</x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d, Y').'-'.
                        Carbon\Carbon::parse($item->end)->format('M d, Y')}}</x-td>
                    <x-td>{{ $item->particular->particular}}</x-td>
                    <x-td>{{ number_format($item->bill, 2) }}</x-td>
                    <x-td>@if($item->status === 'paid')
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i> {{
                            $item->status }}
                            @else
                            <span
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fa-solid fa-clock"></i> {{
                                $item->status }}
                            </span>
                            @endif
                    </x-td>
                    <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
                    <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
                    @empty
                    <x-td>No data found!</x-td>
                    @endforelse
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <span>Showing the last 5 bills</span>
            <p class="text-right">
                <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/bills/'">See more bills
                </x-button>
            </p>
        </div>
    </div>
    @include('utilities.create-building-modal')
</x-index-layout>