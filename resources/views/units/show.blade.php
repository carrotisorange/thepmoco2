<x-app-layout>
    @section('title', '| '.$unit->unit)
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
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/units'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbsp Back
                    </x-button>
                    @can('manager')
                    <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/edit'">
                        <i class="fa-regular fa-pen-to-square"></i>&nbsp Edit
                    </x-button>
                    @endcan
                    @include('utilities.show-unit-show-options')
                    @include('utilities.show-unit-create-options')
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @include('utilities.show-unit-info')
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                {{-- @include('units.contracts.index')
                                @include('units.deed_of_sales.index')
                                @include('units.enrollees.index')
                                @include('units.bills.index') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>