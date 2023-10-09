<x-app-layout>
    @section('title', '| New | '. env('APP_NAME'))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property_uuid') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property') }}</a>
                                </li>
                                </li>

                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">New Contract</li>

                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">

                    <x-button wire:submit.prevent="submitForm" onclick="window.location.href='{{ url()->previous() }}'">
                        <i class="fa-solid fa-circle-arrow-left"></i>&nbspBack
                    </x-button>

                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @livewire('new-contract-component', ['tenant' => $tenant])

                </div>
            </div>
        </div>
    </div>
</x-app-layout>