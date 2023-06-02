<form action="#" method="POST" wire:submit.prevent="submitForm">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-3 sm:col-span-3">
                    <label for="backout_at" class="block text-sm font-medium text-gray-700">Date of Backout</label>
                    <input type="date" wire:model="backout_at"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('backout_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="backout_reason" class="block text-sm font-medium text-gray-700">Reason for
                        backout:</label>
                    <div class="mt-1">
                        <x-form-select wire:model="backout_reason">
                            <option value="">Select one</option>
                            <option value="Found another unit" {{ old('backout_reason')=='Found another unit'
                                ? 'selected' : 'Select one' }}>
                                {{ 'Found another unit' }}
                            </option>
                            <option value="Unsatisfied with the service" {{
                                old('backout_reason')=='Unsatisfied with the service' ? 'selected' : 'Select one' }}>
                                {{ 'Unsatisfied with the service' }}
                            </option>
                        </x-form-select>

                        @error('backout_reason')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="px-4 py-3 text-right sm:px-6">
                <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                    href="{{ url()->previous() }}">
                    Cancel
                </a>
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                 
                    Confirm Backout
                </button>
            </div>
        </div>
</form>