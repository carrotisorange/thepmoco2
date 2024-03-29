<div id="create-tenant-contract-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Select a unit
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="create-tenant-contract-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 space-y-6">
               <div class="grid grid-cols-6 gap-1 md:grid:cols-1 sm:grid:cols-1">
                @foreach ($units as $unit)
                <div class="mt-5">
                    <x-button title="{{ $unit->unit }}" onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create'">
                        <div>
                            <div>
                                <img src="/storage/{{ $unit->thumbnail }}" />
                            </div>
                            <div>
                                <small> {{ $unit->unit }}</small>
                            </div>
                        </div>
                    </x-button>
                </div>
                @endforeach
            </div>
            </div>

            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <x-button data-modal-toggle="create-tenant-contract-modal" type="button">Cancel</x-button>
            </div>
        </div>
    </div>
</div>