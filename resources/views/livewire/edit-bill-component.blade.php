<x-modal-component>
    <x-slot name="id">
        edit-bill-modal-{{$bill_details->id}}
    </x-slot>
    <h1 class="text-center font-medium">Edit Bill</h1>
    <div class="p-5">
        <form wire:submit.prevent="updateBill">
            <div class="mt-5 sm:mt-6">
                <x-label class="text-sm" for="reference_no">Reference No</x-label>
                <x-form-input type="text" readonly
                    value="{{ App\Models\Unit::where('uuid',$bill_details->unit_uuid)->value('unit').'-'.$bill_details->bill_no}}" />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label class="text-sm" for="tenant">Bill to</x-label>
                @if($bill_details->tenant_uuid)
                <x-form-input type="text" readonly
                    value="{{ App\Models\Tenant::where('uuid',$bill_details->tenant_uuid)->value('tenant') }} (T)" />
                @elseif($bill_details->owner_uuid)
                <x-form-input type="text" readonly
                    value="{{ App\Models\Owner::where('uuid',$bill_details->owner_uuid)->value('owner') }} (O)" />
                @elseif($bill_details->guest_uuid)
                <x-form-input type="text" readonly
                    value="{{ App\Models\Guest::where('uuid',$bill_details->guest_uuid)->value('guest') }} (G)" />
                @else
                <x-form-input type="text" readonly value="NA" />
                @endif
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label class="text-sm" for="status">Status</x-label>
                <x-form-input type="text" readonly value="{{ $bill_details->status}}" />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label class="text-sm" for="particular_id">Particular</x-label>
                <x-form-select id="particular_id" name="particular_id" wire:model="particular_id" class="">
                    @foreach ($particulars as $particular)
                    <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                        particular_id?
                        'selected': 'Select one'
                        }}>{{ $particular->particular }}</option>
                    @endforeach
                </x-form-select>

                @error('particular_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="bill">Start</label>
                <x-form-input type="date" id="start" wire:model="start" />
                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label class="text-sm" for="bill">End</x-label>
                <x-form-input type="date" id="end" wire:model="end" />
                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-5 sm:mt-6">
                <x-label class="text-sm" for="bill">Amount</x-label>
                <x-form-input type="number" step="0.001" id="bill" wire:model="bill" />
                @error('bill')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit"> Update
                </x-button>
            </div>
        </form>
    </div>
</x-modal-component>
