<form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" wire:submit.prevent="submitForm">
    @csrf
    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Enter Collection Information</h3> 
    <div>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-1/2 px-3">
                <x-label for="particular_id">
                    Mode of payment {{ $form }}
                </x-label>
                <x-form-select wire:model="form" id="form" name="form" required>
                    <option value="bank" {{ old('form')=='bank' ? 'selected' : 'Select one' }}>bank</option>
                    <option value="cash" {{ old('form')=='cash' ? 'selected' : 'Select one' }} selected>cash
                    </option>
                    <option value="cheque" {{ old('form')=='cheque' ? 'selected' : 'Select one' }}>cheque
                    </option>
                </x-form-select>

                @error('form')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full md:w-1/2 px-3">
                <x-label for="bill">
                    Amount
                </x-label>
                <x-form-input wire:model="collection" id="grid-last-name" type="number" value="{{ old('collection') }}"
                    name="collection" min="0" />

                @error('collection')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-form-button></x-form-button>
            </p>
        </div>
</form>