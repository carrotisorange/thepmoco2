<x-index-layout>
    @section('title', ' | '.$unit->unit)
    <x-slot name="labels">
        {{ $unit->unit }}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/unit'">Go back to
            units
        </x-button>
        <x-button data-modal-toggle="add-building-modal">Create a building
        </x-button>
        {{-- @include('modals.show-unit-show-options')
        @include('modals.show-unit-create-options') --}}
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        @include('forms.unit-edit')
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Contracts</h1>
        @include('tables.contracts')
        <div class="mt-5">
            {{ $contracts->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/tenant/{{ Str::random(8) }}/create'">
                    Add
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/contracts/'">
                    See more
                </x-button>
            </p>
        </div>
    </div>


    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Deed of sales</h1>
        @include('tables.deed_of_sales')
        <div class="mt-5">
            {{ $deed_of_sales->links() }}
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ Str::random(8) }}/create'">
                    Add
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/deed_of_sales/'">
                    See more
                </x-button>
            </p>
        </div>
    </div>



    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Enrollees</h1>
        @include('tables.enrollees')
        <div class="mt-5">
            {{ $enrollees->links() }}
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/{{ $unit->uuid }}/enrollee/'">
                    Add
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/enrollee/'">
                    See more

                </x-button>
            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Bills</h1>
        @include('tables.bills')
        <div class="mt-5">
            {{ $bills->links() }}
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/bills/'">
                    See more
                </x-button>
            </p>
        </div>
    </div>
    @include('modals.create-building-modal')
</x-index-layout>