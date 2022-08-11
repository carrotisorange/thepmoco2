<x-index-layout>
    @section('title', '| Units')
    <x-slot name="labels">
        Units
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back to units
        </x-button>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        {{-- <x-search placeholder="Search for units..."></x-search> --}}
        <div class="mt-2 mb-2">
            {{ $units->links() }}
        </div>
       @include('tables.units-masterlist')
    </div>
</x-index-layout>