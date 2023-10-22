<x-modal-component>

    <x-slot name="id">
        edit-utility-modal-{{$utility->id}}
    </x-slot>
    <h1 class="text-center font-medium">Edit Utility</h1>
    <div class="p-5">
        <form wire:submmit.prevent="updateUtility">
            <div class="mt-5 sm:mt-6">
                <x-label for="unit_uuid">Unit</x-label>
                <x-form-input type="text" readonly value="{{ App\Models\Unit::find($utility->unit_uuid)->unit }}" />

            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="type">Particular</x-label>
                <x-form-input type="text" readonly value="{{ $utility->type }}" />

            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="previous_reading">Previous Reading</x-label>
                <x-form-input type="number" id="previous_reading" wire:model="previous_reading" step="0.001" />
                @error('previous_reading')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="current_reading">Current Reading</x-label>
                <x-form-input type="number" id="current_reading" wire:model="current_reading" step="0.001" />
                @error('current_reading')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="kwh">Rate</x-label>
                <x-form-input type="number" id="kwh" wire:model="kwh" step="0.001" />
                @error('kwh')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="current_consumption">Current Consumption</x-label>
                <x-form-input type="number" id="current_consumption" wire:model="current_consumption" readonly step="0.001" />
                @error('current_consumption')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="min_charge">Min Charge</x-label>
                <x-form-input type="number" id="min_charge" wire:model="min_charge" step="0.001" />
                @error('min_charge')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="total_amount_due">Total Amount Due</x-label>
                <x-form-input type="number" id="total_amount_due" wire:model="total_amount_due" readonly step="0.001" />
                @error('total_amount_due')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            @if($status=='unbilled')
            <div class="mt-5 sm:mt-6">
                <x-label for="bill_to">Bill to</x-label>
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
                <x-button class="w-full" wire:click="updateUtility">
                    Confirm
                </x-button>

            </div>
            @else
            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="button" disabled>
                    {{$status}}
                </x-button>
            </div>
            @endif


        </form>
    </div>

</x-modal-component>
