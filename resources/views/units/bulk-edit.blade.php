<x-index-layout>
    @section('title', '| Units | Edit',)
    <x-slot name="labels">
        <li><span class="text-gray-500 mx-2">Units</span></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Edit
        <li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/unit'">Go back to
            units
        </x-button>
        <x-button id="dropdownButton" data-dropdown-toggle="unitsOptionsDropdown" type="button">Create <svg
                class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                </path>
            </svg></x-button>

        <div id="unitsOptionsDropdown"
            class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1" aria-labelledby="unitsOptionsDropdown">

                <li>
                    <a href="#/" data-modal-toggle="create-unit-modal"
                        class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Unit
                    </a>
                </li>

                <li>
                    <a href="#/" data-modal-toggle="add-building-modal"
                        class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Building
                    </a>
                </li>
            </ul>
        </div>
    </x-slot>

    @livewire('unit-component', ['batch_no' => $batch_no])

</x-index-layout>
@include('modals.create-unit-modal')
@include('modals.create-building-modal');