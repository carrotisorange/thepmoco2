<div>
    @include('layouts.notifications')
    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Tenant Details</h1>
        <div>
            <form method="POST" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
                <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="tenant">
                            Full Name <span class="text-red-600">*</span>
                        </x-label>
                        <x-form-input wire:model.lazy="tenant" id="tenant" type="text" name="tenant"
                            value="{{ old('tenant', $tenant_details->tenant) }}" />

                        @error('tenant')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3">
                        <x-label for="email">
                            Email
                        </x-label>
                        <x-form-input wire:model.lazy="email" id="email" type="email" name="email"
                            value="{{ old('email', $tenant_details->email) }}" />

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-label for="mobile_number">
                            Mobile
                        </x-label>
                        <x-form-input wire:model.lazy="mobile_number" id="mobile_number" type="text"
                            name="mobile_number" value="{{ old('mobile_number', $tenant_details->mobile_number) }}" />

                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="type">
                            Type
                        </x-label>
                        <x-form-select wire:model.lazy="type" id="type" name="type">
                            <option value="">Select one</option>

                            <option value="studying" {{ old('type', $tenant_details->
                                type) == 'studying' ? 'selected' : '' }}>
                                studying
                            </option>

                            <option value="working" {{ old('type', $tenant_details->
                                type) == 'working' ? 'selected' : '' }}>
                                working
                            </option>
                        </x-form-select>

                        @error('type')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="birthdate">
                            Birthdate
                        </x-label>
                        <x-form-input wire:model.lazy="birthdate" id="birthdate" type="date" name="birthdate"
                            value="{{ old('birthdate', $tenant_details->birthdate) }}" />

                        @error('birthdate')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="gender">
                            Gender <span class="text-red-600">*</span>
                        </x-label>
                        <x-form-select wire:model.lazy="gender" id="gender" name="gender">
                            <option value="">Select one</option>

                            <option value="female" {{ old('gender', $tenant_details->
                                gender) == 'female' ? 'selected' : '' }}>
                                female
                            </option>

                            <option value="male" {{ old('gender', $tenant_details->
                                gender) == 'male' ? 'selected' : '' }}>
                                male
                            </option>
                        </x-form-select>

                        @error('gender')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="civil_status">
                            Civil Status
                        </x-label>
                        <x-form-select wire:model.lazy="civil_status" id="civil_status" name="civil_status">
                            <option value="">Select one</option>

                            <option value="single" {{ old('civil_status', $tenant_details->
                                civil_status) == 'single' ? 'selected' : '' }}>
                                single
                            </option>

                            <option value="married" {{ old('civil_status', $tenant_details->
                                civil_status) == 'married' ? 'selected' : '' }}>
                                married
                            </option>

                            <option value="widowed" {{ old('civil_status', $tenant_details->
                                civil_status) == 'widowed' ? 'selected' : '' }}>
                                widowed
                            </option>

                            <option value="divorced" {{ old('civil_status', $tenant_details->
                                civil_status) == 'divorced' ? 'selected' : '' }}>
                                divorced
                            </option>
                        </x-form-select>

                        @error('civil_status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="country_id">
                            Country
                        </x-label>
                        <div class="relative">
                            <x-form-select wire:model.lazy="country_id" id="country_id" name="country_id">

                                <option value="">Select one</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id', $tenant_details->
                                    country_id) == $country->id ? 'selected' : '' }}>
                                    {{ $country->country }}
                                </option>
                                @endforeach
                            </x-form-select>

                            @error('country_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="province_id">
                            Province
                        </x-label>
                        <div class="relative">
                            <x-form-select wire:model.lazy="province_id" id="province_id" id="province_id"
                                name="province_id">
                                <option value="">Select one</option>
                                @foreach($provinces as $province)
                                <option value="{{ $province->id }}" {{ old('province_id', $tenant_details->
                                    province_id) == $province->id ? 'selected' : '' }}>
                                    {{ $province->province }}
                                </option>
                                @endforeach

                            </x-form-select>
                            @error('province_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="city_id">
                            City
                        </x-label>
                        <x-form-select wire:model.lazy="city_id" id="city_id" id="city_id" name="city_id">
                            <option value="">Select one</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id', $tenant_details->
                                city_id) == $city->id ? 'selected' : '' }}>
                                {{ $city->city }}
                            </option>
                            @endforeach

                        </x-form-select>

                        @error('city_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="barangay">
                            Barangay
                            </x-lab>
                            <x-form-input wire:model.lazy="barangay" id="barangay" type="text" name="barangay"
                                value="{{ old('barangay', $tenant_details->barangay) }}" />
                            @error('barangay')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                @if($type === 'studying')
                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="course">
                            Course
                        </x-label>
                        <x-form-input wire:model.lazy="course" id="course" type="text" name="course"
                            value="{{ old('course', $tenant_details->course) }}" />

                        @error('course')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="year_level">
                            Year Level
                        </x-label>
                        <x-form-input wire:model.lazy="year_level" id="year_level" type="text" name="year_level"
                            value="{{ old('year_level', $tenant_details->year_level) }}" />

                        @error('school')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="school">
                            School
                        </x-label>
                        <x-form-input wire:model.lazy="school" id="school" type="text" name="school"
                            value="{{ old('school', $tenant_details->school) }}" />

                        @error('school')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="school_address">
                            School Address
                        </x-label>
                        <x-form-input wire:model.lazy="school_address" id="school_address" type="text"
                            name="school_address"
                            value="{{ old('school_address', $tenant_details->school_address) }}" />

                        @error('school_address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                @if($type==='working')
                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3">
                        <x-label for="occupation">
                            Occupation
                        </x-label>
                        <x-form-input wire:model.lazy="occupation" id="occupation" type="text" name="occupation"
                            value="{{ old('occupation', $tenant_details->occupation) }}" />

                        @error('occupation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <x-label for="employer">
                            Employer
                        </x-label>
                        <x-form-input wire:model.lazy="employer" id="employer" type="text" name="employer"
                            value="{{ old('employer', $tenant_details->employer) }}" />

                        @error('employer')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <x-label for="employer_address">
                            Employer Address
                        </x-label>
                        <x-form-input wire:model.lazy="employer_address" id="employer_address" type="text"
                            name="employer_address"
                            value="{{ old('employer_address', $tenant_details->employer_address) }}" />

                        @error('employer_address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full px-3 mb-6 md:mb-0 mt-5 flex">
                        <div class="flex-3">
                            <x-label for="photo_id">
                                Photo ID (i.e., Government issues ID, school ID, employee ID)
                            </x-label>
                            <x-form-input wire:model.lazy="photo_id" id="photo_id" type="file" name="photo_id"
                                value="{{old('photo_id', $tenant_details->photo_id)}}" autofocus />

                            @error('photo_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $tenant_details->photo_id }}"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="mt-6 p-4">
                    <p class="text-right">
                        <x-form-button wire:loading.remove wire:click="submitForm()">Update</x-form-button>
                    </p>
                </div>
        </div>
        </form>

    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Guardians</h1>
    <div>
        @include('tenants.guardians.index')
        <div class="mt-5">
            {{ $guardians->links() }}
        </div>
    </div>
</div>
<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">References</h1>
    <div>
        @include('tenants.references.index')
        <div class="mt-5">
            {{ $references->links() }}
        </div>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Contracts</h1>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Unit</x-th>
                <x-th>Duration</x-th>
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
                <x-td>
                    <div class="text-sm text-gray-900"><a class="text-blue-800 font-bold"
                            href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">{{
                            $item->unit->unit }}</a>
                    </div>

                    <div class="text-sm text-gray-500">{{
                        $item->unit->building->building}}
                    </div>

                </x-td>
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
                            class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                                        bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i> expiring
                        </span>
                        @endif
                </x-td>
                <x-td>{{ $item->interaction->interaction }}</x-td>
                <x-td>

                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/view'"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        View
                    </button>

                    <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                        type="button">Actions<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></x-button>

                    <div id="dropdownDivider.{{ $item->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">

                            <li>
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/export"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-file-contract"></i>&nbspExport
                                </a>
                            </li>

                            <li>
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/transfer"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
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
                            @if($unpaid_bills->count()<=0) <a
                                href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
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
        {{ $contracts->links() }}
    </div>

    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/units/'">
                Add
            </x-button>
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/contracts'">
                See more

            </x-button>
        </p>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Bills</h1>
    <div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>

                    {{-- <x-th>#</x-th> --}}
                    <x-th>Bill #</x-th>
                    <x-th>Date posted</x-th>

                    <x-th>Unit</x-th>
                    <x-th>Period Covered</x-th>
                    <x-th>Particular</x-th>
                    <x-th>Amount Due</x-th>
                    <x-th>Amount Paid</x-th>
                    <x-th>Balance</x-th>
                </tr>
            </thead>
            @forelse ($bills as $index => $item)
            <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <tr>

                    {{-- <x-td>{{ $index + $bills->firstItem() }}</x-td> --}}
                    <x-td>{{ $item->bill_no}}</x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}</x-td>
                    <x-td><a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}/bills"><b
                                class="text-blue-600">{{$item->unit->unit }}</b></a></x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                        y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}</x-td>
                    <x-td>{{ $item->particular->particular}}</x-td>
                    <x-td>{{ number_format($item->bill, 2) }}

                        @if($item->status === 'paid')
                        <span title="paid"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i>
                        </span>
                        @elseif($item->status === 'partially_paid')
                        <span title="partially_paid"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i>
                        </span>
                        @else
                        <span title="unpaid"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </span>
                        @endif

                        @if($item->description === 'movein charges' && $item->status==='unpaid')
                        <span title="urgent"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-bolt"></i>
                        </span>
                        @endif

                    </x-td>
                    <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
                    <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
                </tr>
                @empty
                <tr>
                    <x-td>No data found.</x-td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>
    <div class="mt-5">
        {{ $bills->links() }}
    </div>
    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/bills'">
                See more
            </x-button>
        </p>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Payments</h1>
    <div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>AR #</x-th>
                    <x-th>Date of payment</x-th>
                    <x-th>Mode of payment</x-th>
                    <x-th>Amount</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            @forelse ($collections as $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
                    <x-td>{{ $item->mode_of_payment }}</x-td>
                    <x-td>{{ number_format($item->amount,2) }}</x-td>
                    <x-td>
                        <x-button
                            onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view'">
                            View
                        </x-button>
                        <x-button
                            onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export'">
                            Export
                        </x-button>
                    </x-td>
                    @empty
                    <x-td>No data found!</x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>
    <div class="mt-5">
        {{ $collections->links() }}
    </div>
    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/collections'">
                See more

            </x-button>
        </p>
    </div>
</div>

</div>