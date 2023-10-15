<x-modal-component>
    {{-- @include('layouts.notifications') --}}
    <x-slot name="id">
        edit-contract-modal-{{$contract->uuid}}
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Edit Contract

                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>
            <form wire:submmit.prevent="updateContract">
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="tenant">Tenant</label>
                    <input type="text" readonly value="{{ App\Models\Tenant::find($contract->tenant_uuid)->tenant }}"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>

                </div>

                {{-- <div class="mt-5 sm:mt-6">
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
                </div> --}}

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

                {{-- @if($status === 'inactive') --}}
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="unit_uuid">Would you like to update the tenant status?</label>
                    <x-form-select id="markTenantAsInactive" name="markTenantAsInactive" wire:model="markTenantAsInactive" class="">
                        <option value="true" {{ true===$status? 'selected' : 'Select one' }}>
                            yes
                        </option>

                        <option value="false" {{ false===$status? 'selected' : 'Select one' }}>
                            no
                        </option>


                    </x-form-select>

                    @error('markTenantAsInactive')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- @endif --}}

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="interaction_id">Interaction</label>
                    <x-form-select id="interaction_id" name="interaction_id" wire:model="interaction_id" class="">
                        <option value="">Select one</option>
                        @foreach($interactions as $interaction)
                        <option value="{{ $interaction->id }}" {{ $interaction->id===$interaction_id? 'selected' :
                            'Select one' }}>
                            {{ $interaction->interaction }}
                        </option>
                        @endforeach


                    </x-form-select>

                    @error('interaction_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                <label for="contract" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Contract</label>
                @if(!$contract->contract)
                <span>No file is uploaded. </span>
                @else
                <a target="_blank" href="{{ asset('/storage/'.$contract->contract) }}">View file</a>

                @endif
                <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                    <div class="space-y-1 text-center">

                        <div class="flex text-sm text-gray-600">
                            <label for="tenant_contract"
                                class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="tenant_contract" name="tenant_contract" type="file" wire:model="tenant_contract" class="sr-only">
                            </label>

                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        <p class="text-center">
                            @error('contract')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if($tenant_contract)
                        <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                        @endif
                        @enderror
                        </p>
                    </div>
                </div>
            </div>

                <div class="mt-5 sm:mt-6">

                    <x-button class="w-full" type="button" wire:click="updateContract">
                        Update
                    </x-button>

                </div>
            </form>
        </div>
    </div>
</x-modal-component>
