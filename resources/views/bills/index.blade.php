<x-app-layout>
    @section('title', '| Bills')
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
                                <li class="text-gray-500">Bills</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button data-modal-toggle="create-particular-modal">
                        <i class="fa-solid fa-circle-plus"></i>&nbsp Particular
                    </x-button>
                    @can('billing')
                    <x-button id="dropdownButton" data-dropdown-toggle="unitCreateDropdown" type="button"> <i
                            class="fa-solid fa-circle-plus"></i>&nbsp Bill <svg class="ml-2 w-4 h-4" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></x-button>

                    <!-- Dropdown menu -->
                    <div id="unitCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            @can('managerandadmin')
                            <li>
                                <a href="#/" data-modal-toggle="create-express-bill-modal"
                                    class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <i class="fa-solid fa-truck-fast"></i>&nbsp Express Bill
                                </a>
                            </li>
                            <li>
                                <a href="#/" data-modal-toggle="create-customized-bill-modal"
                                    class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <i class="fa-solid fa-file-pen"></i>&nbsp Customized Bill
                                </a>
                            </li>

                            @endcan

                        </ul>
                    </div>
                    @endcan
                </h5>
                @include('utilities.create-express-bill')
                @include('utilities.create-customized-bill')
            </div>
        </h2>
    </x-slot>
    @livewire('bill-index-component')
</x-app-layout>