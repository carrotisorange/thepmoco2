<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Units / Edit</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button onclick="window.location.href='/property/{{ Session::get('property') }}/unit'"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">Back
                </button>

                @if($selectedUnits)
                <button type="button" wire:click="removeUnits()"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Remove ({{ count($selectedUnits) }})
                </button>
                @endif

                @if(App\Models\Property::find(Session::get('property'))->units->count())
                <button type="button" wire:click="updateUnit()"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
                </button>
                @endif
            </div>
        </div>

        <div class="mt-3 -my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            @include('forms.units.unit-edit-bulk')
        </div>
    </div>

</div>