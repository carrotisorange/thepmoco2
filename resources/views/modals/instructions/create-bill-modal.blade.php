<x-modal-component>
    <x-slot name="id">
        instructions-create-bill-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
            <div>
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                    <!-- Heroicon name: outline/check -->
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div class="mt-2 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Create bills
                    </h3>
                    <div class="mt-2">
                        @if($active_contracts->count())
                        <p class="text-sm text-gray-500">You're about to create <b
                                class="font-bold text-lg text-red-500">{{
                                $active_contracts->count() }}</b> bills for <b class="font-bold text-lg text-red-500">{{
                                $active_tenants->count('tenant_uuid') }}</b>
                            active tenants <b class="font-bold text-lg text-red-500">ONLY.</b> You may still modify
                            these bills when you click
                            <b>CONFIRM
                        </p>
                        @else
                        <p class="text-sm text-gray-500">
                            There are no active contracts found. To continue adding bills, please add a tenant using the
                            button below.
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @if($active_contracts->count())
            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Select a particular</label>
                <select wire:model.debounce.500ms="particular_id" 
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

                <span class="text-xs">Can't find your desired particular? Add one <a
                        class="text-blue-500 text-xs text-decoration-line: underline" href="#/"
                        data-modal-toggle="instructions-create-particular-modal">
                        here
                    </a>.</span>
            </div>

            <div class="mt-2 sm:mt-6">
                <label class="text-sm" for="">Start Date</label>
                <input type="date" id="start" wire:model.debounce.500ms="start"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>
                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">End Date</label>
                <input type="date" id="end" wire:model.debounce.500ms="end"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>
                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="kwh">Amount</label>
                <input type="number" step="0.001" id="bill" wire:model.debounce.500ms="bill"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                @error('bill')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-5 sm:mt-6">

                <button type="button" wire:click="storeBills" wire:loading.remove
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    <i class="fa-solid fa-arrow-right"></i>&nbsp Confirm
                </button>

                <button type="button" wire:loading wire:target="storeBills" disabled
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Loading...
                </button>
            </div>

            @else
            <div class="mt-5 sm:mt-6">
                <button type="button" wire:click="redirectToUnitsPage" wire:loading.remove
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    <i class="fa-solid fa-arrow-right"></i>&nbsp Add Tenant
                </button>
                <button type="button" wire:loading wire:target="redirectToUnitsPage" disabled
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Loading...
                </button>
            </div>

            @endif
        </div>
    </div>
</x-modal-component>