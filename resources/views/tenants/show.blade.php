<x-app-layout>
    @section('title', '| '.$tenant->tenant)
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
                                <li><span class="text-gray-500 mx-2">Tenant</span></li>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    {{-- <x-button onclick="window.location.href='/tenant/{{ $tenant->uuid }}/edit'">
                        <i class="fa-solid fa-pen-to-square"></i>&nbspEdit
                    </x-button> --}}
                    {{--<x-button
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/contract/{{ Str::random(10) }}/create'">
                        Add Contract</x-button> --}}
                    <x-button id="dropdownButton" data-dropdown-toggle="dropdown" type="button"><i
                            class="fa-solid fa-circle-plus"></i>&nbspAdd <svg class="ml-2 w-4 h-4" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></x-button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="/tenant/{{ $tenant->uuid }}/new_contract"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <i class="fa-solid fa-file-contract"></i>&nbspContract</a>
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
                            <img src="/storage/{{ $tenant->photo_id }}"
                                class="p-2 bg-white border rounded max-w-xs mt-5 mx-5 ml-5 mr-5" alt="..." />
                        </div>
                        <div class="flex flex-col md:flex-row md:max-w-xl">

                            <div class="p-6 flex flex-col justify-start">
                                <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $tenant->tenant }} </h5>
                                <hr>
                                <p class="mt-5 text-gray-700 text-base mb-4">
                                    Email: {{ $tenant->email }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Mobile: {{ $tenant->mobile_number }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Birthdate: {{ Carbon\Carbon::parse($tenant->birthdate)->format('M d, Y') }} ({{
                                    Carbon\Carbon::now()->diffForHumans($tenant->birthdate)}})
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Civil status: {{ $tenant->civil_status }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Gender: {{ $tenant->gender }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Tenant type: {{ $tenant->type }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Address: {{ $tenant->barangay.', '.$tenant->province->province.',
                                    '.$tenant->country->country }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @include('tenants.contracts.index')
                                @include('tenants.guardians.index')
                                @include('tenants.references.index')
                                @include('tenants.bills.index')
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>