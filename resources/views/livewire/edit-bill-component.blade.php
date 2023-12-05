<x-modal-component>
    <x-slot name="id">
        edit-bill-modal-{{$bill_details->id}}
    </x-slot>
    <h1 class="text-center font-medium">Edit Bill</h1>
    <div class="p-5">
        <form wire:submit.prevent="updateBill">
            <div class="mt-5 sm:mt-6">
                <x-label  for="reference_no">Bill #</x-label>
                <x-form-input type="text" readonly value="{{ $bill_details->bill_no}}" />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label for="tenant">Bill to</x-label>
                <x-form-input type="text" value="{{ $bill_details->tenant->tenant }} {{ $bill_details->owner->owner }} {{ $bill_details->guest->guest }}" readonly />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label  for="status">Status</x-label>
                <x-form-input type="text" readonly value="{{ $bill_details->status}}" />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label  for="particular_id">Particular</x-label>
                <x-form-select name="particular_id" wire:model="particular_id">
                    @foreach ($particulars as $particular)
                    <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                        particular_id?
                        'selected': 'Select one'
                        }}>{{ $particular->particular }}</option>
                    @endforeach
                </x-form-select>
                <x-validation-error-component name='particular_id' />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label  for="bill">Start</x-label>
                <x-form-input type="date" wire:model="start" />
                <x-validation-error-component name='start' />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label  for="bill">End</x-label>
                <x-form-input type="date" wire:model="end" />
               <x-validation-error-component name='end' />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label  for="bill">Amount</x-label>
                <x-form-input type="number" step="0.001"  wire:model="bill" />
                <x-validation-error-component name='bill' />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit"> Update</x-button>
            </div>
        </form>
    </div>
</x-modal-component>

