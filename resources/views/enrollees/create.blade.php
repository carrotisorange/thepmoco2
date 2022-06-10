<x-app-layout>
    @section('title', '| Enrollee | Create')
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
                                <li class="text-gray-500">{{ $unit->unit }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $owner->owner }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Leasing</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button wire:submit.prevent="submitForm"
                        onclick="window.location.href='/owner/{{ $owner->uuid }}/deed_of_sales'">
                        <i class="fa-solid fa-forward"></i>&nbspSkip</x-button>
                </h5>

            </div>
        </h2>
    </x-slot>
    @livewire('enrollee-component', ['unit' => $unit, 'owner' => $owner])
</x-app-layout>