<div id="create-particular-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="create-particular-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" action="/property/{{ Session::get('property') }}/particular/{{ Str::random(8) }}/store""
                method=" POST" id="add-particular-form">
                @csrf
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Particular Information</h3>
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-full px-3">
                        <x-label>Particular <span class="text-red-600">*</span></x-label>

                        <x-form-input form="add-particular-form" id="particular" type="text" name="particular_id"
                            required />

                        @error('particular_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-full px-3">
                        <x-label>Minimum Charge <span class="text-red-600">*</span></x-label>
                        <x-form-input form="add-particular-form" id="minimum_charge" type="number" step="0.001" min="0"
                            name="minimum_charge" required />

                        @error('minimum_charge')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{--
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-full px-3">
                        <x-label>Minimum Charge</x-label>
                        <x-form-input form="add-particular-form" id="minimum_charge" type="number" step="0.001" min="0"
                            name="minimum_charge" required />

                        @error('minimum_charge')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div> --}}

                <div class="mt-5">
                    <p class="text-right">
                        <x-form-button>Create</x-form-button>
                    </p>
                </div>

    
            </form>

        </div>
    </div>
</div>

<!-- Small Modal -->
{{-- <div
    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
    id="small-modal">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    New Particular
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="small-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/particular/{{ Str::random(10) }}/store" method="POST" id="add-particular-form">
                    @csrf
                    <div class="mt-4">
                        <x-label for="particular" :value="__('Particular')" />
                        <x-input form="add-particular-form" id="particular" class="block mt-1 w-full" type="text"
                            name="particular_id" required />

                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <p class="text-right">
                    <x-button form="add-particular-form">Save</x-button>
                </p>
            </div>
        </div>
    </div>
</div> --}}