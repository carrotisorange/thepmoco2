<x-modal-component>
    @include('layouts.notifications')
    <x-slot name="id">
        edit-utility-modal-{{$utility->id}}
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Edit Utility
                    
                </h3>

            </div>
            <form wire:submmit.prevent="updateUtility">
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="unit_uuid">Unit</label>
                    <input type="text" readonly value="{{ App\Models\Unit::find($utility->unit_uuid)->unit }}"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" >

                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="type">Particular</label>
                    <input type="text" readonly value="{{ $utility->type }}"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" >

                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="previous_reading">Previous Reading</label>
                    <input type="number" id="previous_reading" wire:model="previous_reading" step="0.001"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" >
                    @error('previous_reading')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="current_reading">Current Reading</label>
                    <input type="number" id="current_reading" wire:model="current_reading" step="0.001"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('current_reading')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="kwh">Rate</label>
                    <input type="number" id="kwh" wire:model="kwh" step="0.001"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('kwh')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="current_consumption">Current Consumption</label>
                    <input type="number" id="current_consumption" wire:model="current_consumption" readonly step="0.001"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('current_consumption')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="min_charge">Min Charge</label>
                    <input type="number" id="min_charge" wire:model="min_charge" step="0.001"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('min_charge')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="total_amount_due">Total Amount Due</label>
                    <input type="number" id="total_amount_due" wire:model="total_amount_due" readonly step="0.001"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('total_amount_due')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                @if($status=='unbilled')
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="bill_to">Bill to</label>
                    <x-form-select id="bill_to" name="bill_to" wire:model="bill_to" class="">
                        <option value="">Select one</option>
                        @foreach($tenants as $tenant)
                        <option value="{{ $tenant->tenant_uuid }}" {{ $tenant->tenant_uuid===$tenant_uuid? 'selected' :
                            'Select one' }}>
                            {{ $tenant->tenant->tenant }} (T)
                        </option>
                        @endforeach
                        @foreach($owners as $owner)
                        <option value="{{ $owner->owner_uuid }}" {{ $owner->owner_uuid===$owner_uuid? 'selected' :
                            'Select one' }}>
                            {{ $owner->owner->owner }} (O)
                        </option>
                        @endforeach

                    </x-form-select>

                    @error('bill_to')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-5 sm:mt-6">

                    <x-button type="button" wire:loading.remove wire:click="updateUtility">
                        Update
                    </x-button>

                    <x-button type="button" wire:loading disabled>
                        Loading...
                    </x-button>

                </div>
                @else
                <div class="mt-5 sm:mt-6">
                    <x-button type="button" disabled>
                       {{$status}}
                    </x-button>
                </div>
                @endif


            </form>
        </div>
    </div>

</x-modal-component>