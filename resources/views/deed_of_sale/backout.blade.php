<x-new-layout>
    @section('title', $deedOfSale->owner->owner.' | '.Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $deedOfSale->owner->owner }} / {{ $deedOfSale->unit->unit }} / Backout</h1>
                </div>

              
            </div>
            @livewire('deedofsale-backout-component', ['deedOfSale' => $deedOfSale])
</x-new-layout>