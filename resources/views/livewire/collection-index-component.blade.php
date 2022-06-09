<div class="py-2">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-2">
            <x-search placeholder="search for reference no"></x-search>
        </div>
        <div class="mt-1">
            @if($start || $end)
            <x-button class="text-black-600 cursor-pointer" wire:click="resetFilters"><i
                    class="fa-solid fa-circle-xmark"></i>&nbsp
                Clear filters</x-button>
            @endif
        </div>
        <div class="mt-5">
            {{ $ars->links() }}
        </div>
        <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            {{-- @include('utilities.show-ars-filters') --}}
                            @if($ars->count())
                            @include('utilities.show-ars-results')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>