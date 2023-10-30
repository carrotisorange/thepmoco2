<div id="{{ $id }}" tabindex="-1" aria-hidden="true" wire:ignore.self    data-modal-backdrop="static" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-2 w-full max-w-2xl h-full lg:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="{{ $id }}">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </button>
                </div>
                {{ $slot }}
            </div>
    </div>
</div>

