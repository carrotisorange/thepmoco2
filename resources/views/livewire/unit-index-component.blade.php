<div class="border-b pb-5 border-gray-200">
    <x-search placeholder="Search for units..."></x-search>
    <div class="mt-4">
        <p class="text-center">Showing <span class="text-black-600">{{ $units->count() }}</span> units.</p>
    </div>
    <div class="mt-2">
        {{ $units->links() }}
    </div>
    <div class="p-6 mt-3 overflow-x-auto bg-white border rounded shadow">
        <div class="flex flex-row">
            <div class="basis-1/4 mt-10 ml-10">
                @include('modals.show-unit-filters')
            </div>
            <div class="basis-full">
                @include('modals.show-unit-results')
            </div>
        </div>
    </div>
</div>