<x-modal-component>
    <x-slot name="id">
        edit-contract-modal-{{$contract->uuid}}
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
            <div>
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                    <!-- Heroicon name: outline/check -->
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Edit Contract
                        Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>
            <form wire:submmit.prevent="updateContract">
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="tenant">Tenant</label>
                    <input type="text" readonly value="{{ $contract->tenant->tenant }}"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>

                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="unit_uuid">Unit</label>
                    <x-form-select id="unit_uuid" name="unit_uuid" wire:model="unit_uuid" class="">
                        <option value="">Select one</option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->uuid }}" {{ $unit->uuid === $unit_uuid?
                            'selected'
                            : 'Select one' }}>
                            {{ $unit->unit }} - {{ $unit->rent }}/mo
                
                        </option>
                        @endforeach
                    </x-form-select>

                    @error('unit_uuid')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Rent/mo</label>
                    <input type="number" step="0.001" id="rent" wire:model="rent"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('rent')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Movein Date</label>
                    <input type="date" id="start" wire:model="start"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('start')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="birthdate">Moveout Date</label>
                    <input type="date" id="end" wire:model="end"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('end')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="unit_uuid">Status</label>
                    <x-form-select id="status" name="status" wire:model="status" class="">
                        <option value="">Select one</option>

                        <option value="active" {{ "active"===$status? 'selected' : 'Select one' }}>
                          active
                        </option>
                        <option value="inactive" {{ "inactive"===$status? 'selected' : 'Select one' }}>
                            inactive
                        </option>
                        <option value="pendingmovein" {{ "pendingmovein"===$status? 'selected' : 'Select one' }}>
                            pendingmovein
                        </option>
                        <option value="pendingmoveout" {{ "pendingmoveout"===$status? 'selected' : 'Select one' }}>
                            pendingmoveout
                        </option>
                        <option value="reserved" {{ "reserved"===$status? 'selected' : 'Select one' }}>
                            reserved
                        </option>


                    </x-form-select>

                    @error('status')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="interaction_id">Interaction</label>
                    <x-form-select id="interaction_id" name="interaction_id" wire:model="interaction_id" class="">
                        <option value="">Select one</option>
                        @foreach($interactions as $interaction)
                        <option value="{{ $interaction->id }}" {{ $interaction->id===$interaction_id? 'selected' : 'Select one' }}>
                            {{ $interaction->interaction }}
                        </option>
                        @endforeach
                
                
                    </x-form-select>
                
                    @error('interaction_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">

                    <button type="button" wire:click="updateContract" wire:loading.remove
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        <i class="fa-solid fa-arrow-right"></i>&nbsp Update
                    </button>
                    <button type="button" wire:loading wire:target="updateContract" disabled
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        Loading...
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-modal-component>