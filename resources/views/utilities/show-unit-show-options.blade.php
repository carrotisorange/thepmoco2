<x-button id="dropdownButton" data-dropdown-toggle="unitShowDropdown" type="button"> <i
        class="fa-solid fa-eye"></i>&nbsp Show <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
        </path>
    </svg></x-button>

<!-- Dropdown menu -->
<div id="unitShowDropdown"
    class="hidden z-10 w-30 text-base text-left list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
    <ul class="py-1" aria-labelledby="dropdownButton">
        @can('managerandadmin')
        {{-- <li>
            <a href="/unit/{{ $unit->uuid }}/tenant/{{ Str::random(10) }}/new_create"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">New
                Tenant
            </a>
        </li> --}}
        <li>
            <a href="/unit/{{ $unit->uuid }}/contracts"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                <i class="fa-solid fa-user"></i>&nbsp Tenants
            </a>
        </li>
        <li>
            <a href="/unit/{{ $unit->uuid }}/deed_of_sales"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                    class="fa-solid fa-user-tie"></i>&nbspOwners

            </a>
        </li>
        @endcan
        @can('manager')
        <li>
            <a href="/unit/{{ $unit->uuid }}/bills/"
                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                    class="fa-solid fa-file-invoice-dollar"></i>&nbspBills
            </a>
        </li>
        @endcan
    </ul>
</div>