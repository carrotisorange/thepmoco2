<div>
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-5 lg:col-span-9">

                <div class="flex justify-between">
                    <h1 class="text-3xl font-bold text-white">{{ $tenant_details->tenant }}</h1>
                    @can('tenantportal')
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/unlock'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Tenant Portal
                    </button>
                    @else
                    <button type="button" onclick="window.location.href='/tenant/{{ $tenant_details->uuid }}/user'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Tenant Portal
                    </button>
                    @endcan


                </div>

            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-4  lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="flex items-center justify-center mr-5">
                    <img src="{{ asset('/brands/user.png') }}" alt="door"
                        class="h-56 lg:col-span-2 md:row-span-2 rounded-md">
                </div>
                {{-- <a href="#"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Change
                    username </a>
                <a href="#"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Change
                    password</a> --}}



            </div>

            <div class="mt-2 lg:col-span-9">
                <form method="POST" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8 mt-9">

                        <div class="sm:col-span-4">
                            <div
                                class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="name" class="block text-xs font-medium text-gray-900">Tenant
                                    #</label>
                                <input type="text" value="{{ $tenant_details->bill_reference_no }}" readonly
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <div
                                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Mobile #</label>
                                <input type="text" wire:model.lazy="mobile_number"
                                    value="{{ $tenant_details->mobile_number }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <div
                                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Country
                                </label>
                                <select wire:model="country_id"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id', $tenant_details->
                                        country_id) == $country->id ? 'selected' : '' }}>
                                        {{ $country->country }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="sm:col-span-2">
                            <div
                                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Province</label>
                                <select wire:model="province_id"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                    @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" {{ old('province_id', $tenant_details->
                                        province_id) == $province->id ? 'selected' : '' }}>
                                        {{ $province->province }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <div
                                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">City</label>
                                <select wire:model="city_id"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id', $tenant_details->
                                        city_id) == $city->id ? 'selected' : '' }}>
                                        {{ $city->city }}
                                    </option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" wire:model.lazy="city_id"
                                    value="{{ $tenant_details->city->city }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder=""> --}}
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <div
                                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">
                                    Address</label>
                                <input type="text" wire:model.lazy="barangay" value="{{ $tenant_details->barangay }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">
                            </div>
                        </div>


                        <div class="sm:col-span-8">
                            <div
                                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Email
                                </label>
                                <input type="text" wire:model.lazy="email" value="{{ $tenant_details->email }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">
                            </div>
                        </div>

                        @if($tenant_details->type == 'studying')
                        <div class="sm:col-span-4">
                            <div
                                class="h-44 bg-blue-50 relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Course</label>
                                <input type="text" name="job-title" id="job-title" value="{{ $tenant_details->course }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">

                                <label for="job-title" class="block text-xs font-medium text-gray-900">Year
                                    Level</label>
                                <input type="text" name="job-title" id="job-title"
                                    value="{{ $tenant_details->year_level }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">

                                <label for="job-title" class="block text-xs font-medium text-gray-900">School</label>
                                <input type="text" name="job-title" id="job-title" value="{{ $tenant_details->school }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Address</label>
                                <input type="text" name="job-title" id="job-title"
                                    value="{{ $tenant_details->school_address }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">
                            </div>
                        </div>
                        @else
                        <div class="sm:col-span-4">
                            <div
                                class="h-32 bg-blue-50 relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title"
                                    class="block text-xs font-medium text-gray-900">Occupation</label>
                                <input type="text" name="job-title" id="job-title"
                                    value="{{ $tenant_details->occupation }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">

                                <label for="job-title" class="block text-xs font-medium text-gray-900">Employer</label>
                                <input type="text" name="job-title" id="job-title"
                                    value="{{ $tenant_details->employer }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">

                                <label for="job-title" class="block text-xs font-medium text-gray-900">Address</label>
                                <input type="text" name="job-title" id="job-title"
                                    value="{{ $tenant_details->address }}"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">

                            </div>
                        </div>
                        @endif

                        @forelse ($references->take(1) as $reference)
                        <div class="sm:col-span-4">
                            <div
                                class="h-32 bg-blue-50 relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Character
                                    Reference</label>
                                <input type="text" name="job-title" id="job-title"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="" value="{{ $reference->reference }}">

                                <label for="job-title"
                                    class="block text-xs font-medium text-gray-900">Relationship</label>
                                <input type="text" name="job-title" id="job-title"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="" value="{{ $reference->relationship->relationship }}">

                                <label for="job-title" class="block text-xs font-medium text-gray-900">Contact</label>
                                <input type="text" name="job-title" id="job-title"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="" value="{{ $reference->mobile.' '.$reference->email }}">
                            </div>
                        </div>
                        @empty
                        <div class="sm:col-span-4">
                            <div
                                class="h-32 bg-blue-50 relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="job-title" class="block text-xs font-medium text-gray-900">Character
                                    Reference</label>
                                <input type="text" name="job-title" id="job-title"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">

                                <label for="job-title"
                                    class="block text-xs font-medium text-gray-900">Relationship</label>
                                <input type="text" name="job-title" id="job-title"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">

                                <label for="job-title" class="block text-xs font-medium text-gray-900">Contact</label>
                                <input type="text" name="job-title" id="job-title"
                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                    placeholder="">
                            </div>
                        </div>
                        @endforelse


                    </div>



                    <div class="mt-1 flex justify-end">
                        <x-form-button wire:loading.remove wire:click="submitForm()">Update</x-form-button>
                    </div>


            </div>

        </div>

        </form>
    </div>
    @include('layouts.notifications')

    <section class="mb-10">
        <h1 class="mt-10 text-xl font-bold text-black">Contracts</h1>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    <table class="min-w-full table-fixed">

                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    UNIT</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    BUILDING</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    DURATION</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    RENT/MO</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    STATUS</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    INTERACTION</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                </th>
                            </tr>
                        </thead>

                        @foreach ($contracts as $item)
                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    {{-- <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    --}}
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->

                                <td
                                    class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
                                    <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit->uuid }}">{{
                                        $item->unit->unit
                                        }}</a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{$item->unit->building->building }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                                    '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{number_format($item->rent, 2)}}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if($item->status === 'active')
                                    <span
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fa-solid fa-circle-check"></i> {{ $item->status }}
                                    </span>
                                    @else

                                    <span
                                        class="px-2 text-sm leading-5 font-semibold rounded-full
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
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $item->interaction->interaction }}
                                </td>
                                <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                                    @if($item->contract)
                                    <a href="{{ asset('/storage/'.$item->contract) }}" target="_blank"
                                        class="text-indigo-600 hover:text-indigo-900">View Attachment</a>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                                        class="text-indigo-600 hover:text-indigo-900">Renew</a>
                                </td>
                                <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                                    @if($item->status == 'active')
                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                                        class="text-indigo-600 hover:text-indigo-900">Moveout</a>
                                    @endif
                                </td>

                            </tr>
                            <!-- More people... -->
                        </tbody>

                        @endforeach


                    </table>

                </div>

                <div class="mt-8 flex justify-end">
                    @can('tenantportal')
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/contract'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        New Contract
                    </button>
                    @else
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/units'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New
                        Contract</button>
                    @endif
                </div>
    </section>

    <section class="mb-10">
        <h1 class="text-xl font-bold text-black">Bills</h1>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    <table class="min-w-full table-fixed">

                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

                                </th>
                                <th scope="col"
                                    class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                    #</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    DATE POSTED</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    UNIT</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    PERIOD COVERED</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    PARTICULAR</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    AMOUNT DUE</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    AMOUNT PAID</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    BALANCE</th>
                                <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">

                                    </th>
                            </tr>
                        </thead>
                        @forelse ($bills as $index => $item)
                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    {{-- <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    --}}
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                    {{ $item->bill_no }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->uuid }}">{{
                                        $item->unit->unit}}
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">August
                                    {{ Carbon\Carbon::parse($item->start)->format('M d,
                                    y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $item->particular->particular}}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ number_format($item->bill, 2) }}

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
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ number_format($item->initial_payment, 2) }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ number_format(($item->bill-$item->initial_payment), 2) }}
                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>

                <div class="mt-8 flex justify-end">
                    @can('accountreceivable')
                    <button type="button" onclick="window.location.href='/property/{{ Session::get('property') }}/bill'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        View Bills
                    </button>
                    @else
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/bills'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View
                        Bills</button>
                    @endif
                </div>
    </section>

    <section class="mb-10">
        <h1 class="text-xl font-bold text-black">Guardians</h1>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    <table class="min-w-full table-fixed">

                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

                                </th>
                                <th scope="col"
                                    class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                    NAME
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    RELATIONSHIP
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    MOBILE
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    EMAIL
                                </th>
                            </tr>
                        </thead>

                        @forelse ($guardians as $guardian)


                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    {{-- <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    --}}
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $guardian->guardian }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $guardian->relationship->relationship }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $guardian->mobile_number }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $guardian->email }}
                                </td>


                            </tr>

                        </tbody>

                        @empty
                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <tr>
                                <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                    No guardians found.
                                </td>
                            </tr>
                        </tbody>

                        @endforelse

                    </table>

                </div>
    </section>

    <section class="mb-10">
        <h1 class="text-xl font-bold text-black">Collections</h1>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    <table class="min-w-full table-fixed">

                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

                                </th>
                                <th scope="col"
                                    class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                    AR #</th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    DATE APPLIED</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    DATE DEPOSITED</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    MDDE OF PAYMENT</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    CHEQUE NO</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    BANK</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    AMOUNT PAID</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">View</span>
                                    <span class="sr-only">Download</span>
                                    <span class="sr-only">Attachment</span>
                                </th>


                            </tr>
                        </thead>

                        @forelse($collections as $item)
                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    {{-- <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    --}}
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $item->ar_no }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if($item->date_deposited)
                                    {{ Carbon\Carbon::parse($item->date_deposited)->format('M d, Y') }}
                                    @else
                                    NA
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $item->mode_of_payment }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if($item->cheque_no)
                                    {{ $item->cheque_no }}
                                    @else
                                    NA
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if($item->bank)
                                    {{ $item->bank }}
                                    @else
                                    NA
                                    @endif
                                </td>
                                <?php
                                                                                            $collections_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->count();
                                                                                        ?>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ number_format($item->amount,2) }} ({{ $collections_count }})
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view"
                                        class="text-indigo-600 hover:text-indigo-900">View</a>
                                </td>

                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export"
                                        class="text-indigo-600 hover:text-indigo-900">Export</a>
                                </td>

                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">

                                    @if(!$item->attachment == null)
                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/attachment"
                                        class="text-indigo-600 hover:text-indigo-900">Attachment</a>
                                    @endif
                                </td>


                            </tr>
                            @empty
                            <tr>
                                <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">No
                                    data
                                    found.</td>
                            </tr>



                            <!-- More people... -->
                        </tbody>
                        @endforelse


                    </table>

                </div>
                <div class="mt-8 flex justify-end">
                    @can('accountreceivable')
                    <button type="button" onclick="window.location.href='/property/{{ Session::get('property') }}/bill'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        View Collections
                    </button>
                    @else
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/collections'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        View Collections</button>
                    @endif
                </div>
    </section>

</div>