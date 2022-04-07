<x-app-layout>
    @section('title', '| Deed of Sale | Create')
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
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Deed of Sale</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button wire:submit.prevent="submitForm"
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/bank/{{ Str::random(8) }}/create'">
                        Skip</x-button>
                </h5>

            </div>
        </h2>
    </x-slot>
    @livewire('deed-of-sale-component', ['unit' => $unit, 'owner' => $owner])
</x-app-layout>