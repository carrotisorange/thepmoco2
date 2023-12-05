<x-modal-component>
    <x-slot name="id">
        create-bill-modal
    </x-slot>
<h1 class="text-center font-medium">Create Bill</h1>
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
                <x-validation-error-component name='unit_uuid'/>
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
                <x-validation-error-component name='particular_id'/>
                <span class="text-xs">Can't find your desired particular? Add one <a
                        class="text-blue-500 text-xs text-decoration-line: underline" href="#/"
                        data-modal-toggle="particular-create-component">
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
                <x-form-input type="date" id="end" wire:model="end"/>

                <x-validation-error-component name='end' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="bill">Amount</x-label>

                <x-form-input type="number" step="0.001" id="bill" wire:model="bill"/>

                <x-validation-error-component name='bill' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>

            </div>
            </form>
        </div>
</x-modal-component>
