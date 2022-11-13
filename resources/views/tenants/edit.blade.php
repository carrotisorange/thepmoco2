<x-index-layout>
    @section('title', ' | '.$tenant_details->tenant)
    <x-slot name="labels">
        {{ $tenant_details->tenant}}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenants'">Go back
            to tenants
        </x-button>
        {{-- <x-button id="dropdownButton" data-dropdown-toggle="unitAddDropdown" type="button"> Create <svg
                class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                </path>
            </svg></x-button>
        <!-- Dropdown menu -->
        <div id="unitAddDropdown"
            class="hidden z-10 w-30 text-base text-left list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1" aria-labelledby="dropdownDividerButton">
                @can('managerandadmin')
                <li>
                    <a data-modal-toggle="create-guardian-modal" href="#/"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                            class="fa-solid fa-user-group"></i>&nbsp
                        Guardian</a>
                </li>
                <li>
                    <a data-modal-toggle="create-reference-modal" href="#/"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                            class="fa-solid fa-people-arrows-left-right"></i></i>&nbsp
                        Reference</a>
                </li>
                @endcan
            </ul>
        </div> --}}
        {{-- <x-button id="dropdownButton" data-dropdown-toggle="unitShowDropdown" type="button">View <svg
                class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                </path>
            </svg></x-button>

        <!-- Dropdown menu -->
        <div id="unitShowDropdown"
            class="hidden z-10 w-30 text-base text-left list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1" aria-labelledby="dropdownDividerButton">
                @can('managerandadmin')
                <li>
                    <a href="/tenant/{{ $tenant_details->uuid }}/contracts"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                            class="fas fa-file-signature"></i>&nbsp
                        Contracts</a>
                </li>
                <li>
                    <a href="/tenant/{{ $tenant_details->uuid }}/concerns"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                            class="fa-solid fa-screwdriver-wrench"></i>&nbsp
                        Concerns</a>
                </li>
                @endcan
                @can('billing')
                <li>
                    <a href="/tenant/{{ $tenant_details->uuid }}/bills"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                            class="fa-solid fa-file-invoice-dollar"></i>&nbsp
                        Bills</a>
                </li>
                @endcan
                @can('treasury')
                <li>
                    <a href="/tenant/{{ $tenant_details->uuid }}/collections"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        <i class="fa-solid fa-coins"></i>&nbsp
                        Collections</a>
                </li>
                @endcan
                <li>
                    <a href="/tenant/{{ $tenant_details->uuid }}/ledger"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        <i class="fa-solid fa-file-invoice"></i>&nbsp
                        Ledger</a>
                </li>
            </ul>
            {{-- <div class="py-1">
                <li>
                    <a href="/tenant/{{ $tenant_details->uuid }}/delete"
                        class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                            class="fa-solid fa-trash-alt"></i>&nbspRemove
                    </a>
                </li>
            </div>
        </div>--}}
    </x-slot>


    @livewire('tenant-edit-component', ['tenant_details' => $tenant_details])

    @include('modals.create-guardian')
    @include('modals.create-reference')

</x-index-layout>