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
                                <li><a href="/property/{{ Session::get('property') }}/units"
                                        class="text-blue-600 hover:text-blue-700">Units</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit ({{ $units->count() }})</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button data-modal-toggle="small-modal">
                        Create Building
                    </x-button>
                    @if($units->count())
                    <x-button form="edit-form">Save</x-button>
                    @else
                    <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'">Create Building
                    </x-button>
                    @endif
                </h5>

            </div>
        </h2>
    </x-slot>
    @livewire('unit-component', ['batch_no' => $batch_no, 'units' => $units, 'buildings' => $buildings, 'categories' => $categories, 'floors'=> $floors])

    @include('utilities.create-building');
</x-app-layout>