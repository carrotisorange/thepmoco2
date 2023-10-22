<div>
    <div class="mt-5 block">
        <p>
            <x-button wire:click="exportCandidates">Export List of Candidates</x-button>
        </p>
    </div>

    <div class="mt-5 px-4 sm:px-6 lg:px-8">

        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden ring-black ring-opacity-5 md:rounded-lg">
                    @include('tables.candidates')
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">

            <x-button class="bg-red-500"
                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election/{{ $election->id }}/create/step-2'">
                Back
            </x-button>

            <x-button
                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election/{{ $election->id }}/create/step-4'">
                Next
            </x-button>

        </div>
    </div>
</div>