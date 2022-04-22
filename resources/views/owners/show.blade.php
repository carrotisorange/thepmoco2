<x-app-layout>
    @section('title', '| '.$owner->owner)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/owners"
                                        class="text-blue-600 hover:text-blue-700">Owners</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $owner->owner }}</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    {{-- <x-button onclick="window.location.href='/owner/{{ $owner->uuid }}/edit'">
                        <i class="fa-solid fa-pen-to-square"></i>&nbspEdit
                    </x-button> --}}
                    {{--<x-button
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/contract/{{ Str::random(10) }}/create'">
                        Add Contract</x-button> --}}
                    <x-button id="dropdownButton" data-dropdown-toggle="dropdown" type="button"><i
                            class="fa-solid fa-circle-plus"></i>&nbspAdd<svg class="ml-2 w-4 h-4" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></x-button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="/unit/{{ $owner->uuid }}/owner/{{ Str::random(10) }}/create"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-house"></i>&nbspUnit
                                </a>
                            </li>
                        </ul>
                    </div>
                </h5>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <div class="flex justify-center">
                        <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white">
                            <img src="/storage/{{ $owner->photo_id }}"
                                class="p-2 bg-white border rounded max-w-xs mt-5 mx-5 ml-5 mr-5" alt="..." />
                        </div>
                        <div class="flex flex-col md:flex-row md:max-w-xl">

                            <div class="p-6 flex flex-col justify-start">
                                <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $owner->owner }}</h5>
                                <hr>
                                <p class="mt-5 text-gray-700 text-base mb-4">
                                    Email: {{ $owner->email }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Mobile: {{ $owner->mobile_number }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Birthdate: {{ Carbon\Carbon::parse($owner->birthdate)->format('M d, Y') }} ({{
                                    Carbon\Carbon::now()->diffForHumans($owner->birthdate)}})
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Civil status: {{ $owner->civil_status }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Gender: {{ $owner->gender }}
                                </p>

                                <p class="text-gray-700 text-base mb-4">
                                    Address: {{ $owner->barangay.', '.$owner->province->province.',
                                    '.$owner->country->country }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="mb-3">
                                    <span class="text-center text-red">{{ Str::plural('Units',
                                        $units->count())}}
                                        ({{ $units->count() }})</span>
                                </div>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Unit</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date of turnover</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Price</th>


                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Classification</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>

                                            </tr>
                                        </thead>
                                        @forelse ($units as $unit)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{
                                                        $unit->unit->unit}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        $unit->unit->building->building}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ Carbon\Carbon::parse($unit->turnover_at)->format('M d,
                                                    Y') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ number_format($unit->price, 2) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $unit->classification }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($unit->status === 'active')
                                                    <span
                                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <i class="fa-solid fa-circle-check"></i> {{
                                                        $unit->status }}
                                                        @else
                                                        <span
                                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                            <i class="fa-solid fa-clock"></i> {{
                                                            $unit->status }}
                                                        </span>
                                                        @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button id="dropdownDividerButton"
                                                        data-dropdown-toggle="dropdownDivider.{{ $unit->uuid }}"
                                                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg></button>

                                                    <div id="dropdownDivider.{{ $unit->uuid }}"
                                                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                            <li>
                                                                <a href="/unit/{{ $unit->unit->uuid }}/"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-house"></i>&nbspShow
                                                                    Unit</a>
                                                            </li>

                                                        </ul>

                                                    </div>
                                                </td>

                                            </tr>


                                            @empty
                                            <tr>
                                                <span>No units found!</span>
                                            </tr>

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mb-3 mt-5">
                                    <span class="text-center text-red">{{ Str::plural('Leasing Contract',
                                        $leasings->count())}}
                                        ({{ $leasings->count() }})</span>
                                </div>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Unit</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Contract Period</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Agreed Rent/mo</th>


                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>




                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>

                                            </tr>
                                        </thead>
                                        @forelse ($leasings as $leasing)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{
                                                        $leasing->unit->unit}}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        $leasing->unit->building->building}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{
                                                        Carbon\Carbon::parse($leasing->start)->format('M d, Y').' -
                                                        '.Carbon\Carbon::parse($leasing->end)->format('M d, Y')
                                                        }}
                                                        @if($leasing->end <= Carbon\Carbon::now()->addMonth())
                                                            <span
                                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-300">
                                                                <svg class="mr-1 w-3 h-3" fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                expiring
                                                            </span>
                                                            @endif

                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        Carbon\Carbon::parse($leasing->end)->diffForHumans($leasing->start)
                                                        }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ number_format($leasing->rent, 2) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($leasing->status === 'active')
                                                    <span
                                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <i class="fa-solid fa-circle-check"></i> {{
                                                        $leasing->status }}
                                                        @else
                                                        <span
                                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            <i class="fa-solid fa-clock"></i> {{
                                                            $leasing->status }}
                                                        </span>
                                                        @endif
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button id="dropdownDividerButton"
                                                        data-dropdown-toggle="dropdownDivider.{{ $leasing->uuid }}"
                                                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg></button>

                                                    <div id="dropdownDivider.{{ $leasing->uuid }}"
                                                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1" aria-labelledby="dropdownDividerButton">

                                                            <li>
                                                                <a href="/leasing/{{ $leasing->uuid }}/edit"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-file-contract"></i>&nbspShow
                                                                    Contract</a>
                                                            </li>

                                                            <li>
                                                                <a href="/leasing/{{ $leasing->uuid }}/transfer"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                                                    Contract</a>
                                                            </li>
                                                            <li>
                                                                <a href="/leasing/{{ $leasing->uuid }}/renew"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                                                    Contract</a>
                                                            </li>

                                                        </ul>
                                                        @if($leasing->status == 'active')
                                                        <div class="py-1">
                                                            <a href="/leasing/{{ $leasing->uuid }}/moveout/bills"
                                                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                <i
                                                                    class="fa-solid fa-arrow-right-to-bracket"></i>&nbspUnenroll</a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <span>No enrollment histories found!</span>
                                            </tr>

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mb-3 mt-5">
                                    <span class="text-center text-red">{{ Str::plural('Representative',
                                        $representatives->count())}}
                                        ({{ $representatives->count() }})</span>
                                </div>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Relationship</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Email</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Mobile</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>
                                            </tr>
                                        </thead>
                                        @forelse ($representatives as $representative)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $representative->representative }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $representative->relationship->relationship }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $representative->email }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $representative->mobile_number }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button id="dropdownDividerButton"
                                                        data-dropdown-toggle="dropdownDivider.{{ $representative->id }}"
                                                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                        type="button"><i
                                                            class="fa-solid fa-list-check"></i>&nbspOptions<svg
                                                            class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg></button>

                                                    <div id="dropdownDivider.{{ $representative->id }}"
                                                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                            <li>
                                                                <a href="/representative/{{ $representative->id }}/edit"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-edit"></i>&nbspEdit</a>
                                                            </li>





                                                        </ul>

                                                        <div class="py-1">
                                                            <li>
                                                                <a href="/representative/{{ $representative->id }}/delete"
                                                                    class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-trash-alt"></i>&nbspRemove
                                                                </a>
                                                            </li>
                                                        </div>


                                                    </div>

                                                </td>
                                            </tr>
                                        </tbody>
                                        @empty
                                        <span class="text-center text-red">No representatives found!</span>
                                        @endforelse
                                    </table>
                                </div>

                                <div class="mb-3 mt-5">
                                    <span class="text-center text-red">{{ Str::plural('Bank',
                                        $banks->count())}}
                                        ({{ $banks->count() }})</span>
                                </div>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Account Name</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Bank</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Account Number</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    </th>

                                            </tr>
                                        </thead>
                                        @forelse ($banks as $bank)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $bank->account_name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $bank->bank_name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $bank->account_number }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button id="dropdownDividerButton"
                                                        data-dropdown-toggle="dropdownDivider.{{ $bank->id }}"
                                                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                        type="button"><i
                                                            class="fa-solid fa-list-check"></i>&nbspOptions<svg
                                                            class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg></button>

                                                    <div id="dropdownDivider.{{ $bank->id }}"
                                                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                            <li>
                                                                <a href="/bank/{{ $bank->id }}/edit"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-edit"></i>&nbspEdit</a>
                                                            </li>





                                                        </ul>

                                                        <div class="py-1">
                                                            <li>
                                                                <a href="/bank/{{ $bank->id }}/delete"
                                                                    class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-trash-alt"></i>&nbspRemove
                                                                </a>
                                                            </li>
                                                        </div>


                                                    </div>

                                                </td>

                                            </tr>
                                        </tbody>
                                        @empty
                                        <span class="text-center text-red">No banks found!</span>
                                        @endforelse
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>