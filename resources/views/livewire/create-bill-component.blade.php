<x-modal-component>
    <x-slot name="id">
        create-bill-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Create a new bill
                    </h3>
                    {{-- <div class="mt-2">
                        <p class="text-sm text-gray-500">Before you can create a new tenant, first you need to
                            select a unit.</p>
                    </div> --}}
                </div>
            </div>


            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Select a unit</label>
                <select wire:model="unit_uuid"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Please select one</option>
                    @foreach ($units as $unit)
                    @if($units->count() == 1)
                    <option value="{{ $unit->unit->uuid }}" {{ old('unit_uuid')==$unit->unit->uuid?
                        'selected': 'Select one'
                        }}>{{ $unit->unit->unit }}</option>
                    @else

                    <option value="{{ $unit->unit->uuid }}" {{ old('unit_uuid')==$unit->unit->uuid?
                        'selected': 'Select one'
                        }}>{{ $unit->unit->unit }}</option>
                    @endif
                    @endforeach
                </select>
                @error('unit_uuid')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>
            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Select a particular</label>
                <select wire:model="particular_id"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Please select one</option>
                    @foreach ($particulars as $item)
                    <option value="{{ $item->particular_id }}" {{ old('particular_id', $particular_id)==$item->
                        particular_id ? 'selected' : 'se' }}>{{ $item->particular }}</option>
                    @endforeach
                </select>
                @error('particular_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror


            </div>
            <div class="mt-2 sm:mt-6">
                <label class="text-sm" for="">Start Date</label>
                <input type="date" id="start" wire:model="start"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>
                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">End Date</label>
                <input type="date" id="end" wire:model="end"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>
                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="kwh">Amount</label>
                <input type="number" step="0.001" id="bill" wire:model="bill"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                @error('bill')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5 sm:mt-6">
                <button type="button" wire:click="storeBill"
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</x-modal-component>