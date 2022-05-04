<x-app-layout>
    @section('title', $tenant->tenant)
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

                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                <li class="text-gray-500">Bills</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenants'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbsp Back
                    </x-button>
                    <x-button data-modal-toggle="create-particular-modal">
                        <i class="fa-solid fa-circle-plus"></i>&nbsp Particular
                    </x-button>
                    @can('billing')
                    <x-button data-modal-toggle="create-bill-modal">
                        <i class="fa-solid fa-circle-plus"></i>&nbsp Bill
                    </x-button>
                    @endcan
                    @can('treasury')
                    <x-button data-modal-toggle="create-collection-modal">
                        <i class="fa-solid fa-circle-plus"></i>&nbsp Collection
                    </x-button>
                    @endcan
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
       @livewire('tenant-bill-component', ['tenant'=> $tenant]);
    </div>
</x-app-layout>
@include('utilities.create-bill-modal')
@include('utilities.create-collection-modal')
@include('utilities.create-particular-modal');