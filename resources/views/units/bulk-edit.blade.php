<x-app-layout>
    @section('title', '| Units | Edit',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><span class="text-gray-500 mx-2">Units</span></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit
                                <li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">

                </h5>
            </div>
        </h2>
    </x-slot>
    @include('utilities.create-unit-modal')
    @livewire('unit-component', ['batch_no' => $batch_no, 'unit_count' => $unit_count])
    @include('utilities.create-building-modal');
</x-app-layout>