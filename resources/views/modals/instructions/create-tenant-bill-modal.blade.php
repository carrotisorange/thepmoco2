<x-modal-component>
    <x-slot name="id">
        instructions-create-tenant-bill-modal
    </x-slot>
<h1 class="text-center font-medium">Add Tenant Bill</h1>
<div class="p-5">
       <form wire:submit.prevent="storeBill">
            <div class="mt-5 sm:mt-6">
                <x-label for="">Select a unit</x-label>
                <x-form-select wire:model="unit_uuid">
                    <option value="">Please select one</option>
                    @foreach ($units as $unit)
                        @if($units->count() == 1)
                        <option value="{{ $unit->unit->uuid }}" {{ old('unit_uuid')==$unit->unit->uuid? 'selected': 'Select one' }}>{{ $unit->unit->unit }}</option>
                        @else
                        <option value="{{ $unit->unit->uuid }}" {{ old('unit_uuid')==$unit->unit->uuid? 'selected': 'Select one' }}>{{ $unit->unit->unit }}</option>
                        @endif
                    @endforeach
                </x-form-select>
                @error('unit_uuid')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>
            <div class="mt-5 sm:mt-6">
                <x-label for="">Select a particular</x-label>
                <x-form-select wire:model="particular_id"> 
                    <option value="">Please select one</option>
                    @foreach ($particulars as $item)
                    <option value="{{ $item->particular_id }}" {{ old('particular_id', $particular_id)==$item->
                        particular_id ? 'selected' : 'se' }}>{{ $item->particular }}</option>
                    @endforeach
                </x-form-select>
                @error('particular_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                <span class="text-xs">Can't find your desired particular? Add one <a
                        class="text-blue-500 text-xs text-decoration-line: underline" href="#/"
                        data-modal-toggle="instructions-create-particular-modal">
                        here
                    </a>.</span>
            </div>
            <div class="mt-2 sm:mt-6">
                <label class="text-sm" for="">Start Date</label>
                <input type="date" id="start" wire:model="start"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" >
                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="">End Date</x-label>
                <x-form-input type="date" id="end" wire:model="end"/>
                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="bill">Amount</x-label>
                <x-form-input type="number" step="0.001" id="bill" wire:model="bill"/>
                @error('bill')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>

            </div>
            </form>
        </div>

</x-modal-component>
