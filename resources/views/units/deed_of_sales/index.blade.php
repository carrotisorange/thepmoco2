<x-index-layout>
    @section('title', $unit->unit)
    <x-slot name="labels">
        {{ $unit->unit }} / Deed of Sales
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back to unit
        </x-button>
    </x-slot>

    <div class="bg-white border-b border-gray-200">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @include('portals.owners.tables.deedofsales')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-index-layout>