<x-app-layout>
    @section('title', '| Reference | Create')
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
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $unit->unit }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">References</li>

                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    @if($unit->unit)
                    <x-button wire:submit.prevent="submitForm"
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create'">
                        Next
                    </x-button> 
                    @else
                    <x-button wire:submit.prevent="submitForm" onclick="window.location.href='/tenant/{{ $tenant->uuid }}/edit'">
                        Go back to tenant
                    </x-button>
                    @endif
                   
            </div>
        </h2>
    </x-slot>

    @livewire('reference-component', ['unit' => $unit, 'tenant' => $tenant])
</x-app-layout>