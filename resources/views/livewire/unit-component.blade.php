<div>
    <div class="sm:flex sm:items-center">
        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="/property/{{Session::get('property')}}/unit"><img class="h-5 w-auto"
                                src="{{ asset('/brands/back-button.png') }}"></a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-700">Edit Units</h1>
        </div>

        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button type="submit" data-modal-toggle="create-unit-modal"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add units
            </button>

            @if($selectedUnits)
            <button type="submit" wire:click="removeUnits()"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="removeUnits" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Remove units ({{ count($selectedUnits) }})
            </button>
            @endif

            @if(App\Models\Property::find(Session::get('property'))->units->count())
            <button type="submit" wire:click="updateForm()"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="updateForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Save Units
            </button>
            @endif

        </div>
    </div>
    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-6">

            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative w-full mb-5">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" id="text" wire:model="search"
                    class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit no" required>

            </div>


        </div>
    </div>
    <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        @include('forms.unit-bulk-edit')
    </div>
    @include('layouts.notifications')
</div>