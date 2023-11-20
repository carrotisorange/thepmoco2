<x-modal-component>
    <x-slot name="id">
        create-bulk-bill-modal
    </x-slot>
    <h1 class="text-center font-medium">Create Bulk Bill</h1>
    <div class="p-5">
        <form wire:submit.prevent="storeBills">
            <div class="mt-2 text-center sm:mt-5">
                <div class="mt-2">
                    @if($activeContracts->count())
                    <p class="text-sm text-gray-500">You're about to create <b class="font-bold text-lg text-red-500">{{
                            $activeContracts->count() }}</b> bills for <b class="font-bold text-lg text-red-500">{{
                            $activeContracts->count('tenant_uuid') }}</b>
                        active tenants <b class="font-bold text-lg text-red-500">ONLY.</b> You may still modify
                        these bills when you click
                        <b>CONFIRM
                    </p>
                    @else
                    <p class="text-sm text-gray-500">
                        There are no active contracts found. To continue adding bills, please add a tenant using
                        the
                        button below.
                    </p>
                    @endif
                </div>
            </div>

            @if($activeContracts->count())
            <div class="mt-5 sm:mt-6">
                <x-label for="">Select a particular</x-label>
                <x-form-select wire:model="particular_id">
                    <option value="">Please select one</option>
                    @foreach ($particulars as $item)
                    <option value="{{ $item->particular_id }}" {{ old('particular_id', $particular_id)==$item->particular_id ? 'selected' : 'selected' }}>
                        {{ $item->particular }}
                    </option>
                    @endforeach
                </x-form-select>
                <x-validation-error-component name='particular_id' />
              <span class="text-xs">Can't find your desired particular? Add one <a
                    class="text-blue-500 text-xs text-decoration-line: underline" href="#/"
                    data-modal-toggle="create-particular-modal">
                    here
                </a>.</span>
            </div>

            <div class="mt-2 sm:mt-6">
                <x-label for="">Start Date</x-label>
                <x-form-input type="date" id="start" wire:model="start" />
                <x-validation-error-component name='start' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="">End Date</x-label>
                <x-form-input type="date" id="end" wire:model="end" />
                <x-validation-error-component name='end' />
            </div>

            @if($particular_id != 1)
            <div class="mt-5 sm:mt-6">
                <x-label for="kwh">Amount</x-label>
                <x-form-input type="number" step="0.001" id="bill" wire:model="bill" />
                <x-validation-error-component name='bill' />
            </div>
            @endif

            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </div>

            @else
            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" wire:click="redirectToUnitsPage">
                    Add Tenant
                </x-button>

            </div>

            @endif

        </form>
    </div>
</x-modal-component>
