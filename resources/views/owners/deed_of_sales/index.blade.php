<x-index-layout>
    @section('title', $owner->owner)
    <x-slot name="labels">
        {{ $owner->owner }} / Deed Of sales
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back to owner
        </x-button>
    </x-slot>

    <div class="bg-white border-b border-gray-200">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @include('tables.deed-of-sale')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-index-layout>