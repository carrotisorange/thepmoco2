<x-new-layout>
    @section('title', $unit->unit.' | '.Session::get('property_name'))

    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="pt-6 sm:pb-5">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 "> {{ $unit->unit }}/ Guest
                    </h1>
                </div>
            </div>

            @livewire('guest-component', ['unitDetails' => $unit])

        </div>
    </div>
</x-new-layout>