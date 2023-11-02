<div id="create-collection-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-xl h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="create-collection-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8"
                action="/tenant/{{ $tenant->uuid }}/collection/store">
                @csrf
             
                <div>
                    <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                        <div class="w-full md:w-1/2 px-3">
                            <x-label for="particular_id">
                                Mode of payment
                            </x-label>
                            <x-form-select wire:model="form" id="form" name="form" required>
                                <option value="bank" {{ old('form')=='bank' ? 'selected' : 'Select one' }} >bank</option>
                                <option value="cash" {{ old('form')=='cash' ? 'selected' : 'Select one' }} selected>cash</option>
                                <option value="cheque" {{ old('form')=='cheque' ? 'selected' : 'Select one' }}>cheque</option>
                            </x-form-select>

                          <x-validation-error-component name='form' />
                        </div>

                        <div class="w-full md:w-1/2 px-3">
                            <x-label for="bill">
                                Amount
                            </x-label>
                            <x-form-input wire:model="collection" id="grid-last-name" type="number" value="{{ old('collection') }}"
                                name="collection" min="0" />

                          <x-validation-error-component name='collection' />
                        </div>
                    </div>
                    <div class="mt-5">
                        <p class="text-right">
                            <x-button type="submit"></x-button>
                        </p>
                    </div>
            </form>

        </div>
        </form>

    </div>
</div>
</div>
