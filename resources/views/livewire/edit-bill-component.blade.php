<x-modal-component>
    <x-slot name="id">
       edit-bill-modal-{{$bill_details->id}}
    </x-slot>
    <h1 class="text-center font-medium">Edit Bill</h1>
    <form wire:submit.prevent="updateBill">
    <div class="p-4">

         <div class="mt-5 sm:mt-6">
                        <label class="text-sm" for="reference_no">Reference No</label>
                        <input type="text" readonly value="{{ App\Models\Unit::find($bill_details->unit_uuid)->unit.'-'.$bill_details->bill_no}}"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                    </div>
                    
                    <div class="mt-5 sm:mt-6">
                        <label class="text-sm" for="tenant">Bill to</label>
                        @if($bill_details->tenant_uuid)
                        <input type="text" readonly value="{{ App\Models\Tenant::find($bill_details->tenant_uuid)->tenant }} (T)"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @elseif($bill_details->owner_uuid)
                        <input type="text" readonly value="{{ App\Models\Owner::find($bill_details->owner_uuid)->owner }} (O)"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @elseif($bill_details->guest_uuid)
                        <input type="text" readonly value="{{ App\Models\Guest::find($bill_details->guest_uuid)->guest }} (G)"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @else
                        <input type="text" readonly value="NA"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @endif
                    </div>
                    
                    <div class="mt-5 sm:mt-6">
                        <label class="text-sm" for="status">Status</label>
                        <input type="text" readonly value="{{ $bill_details->status}}"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                    </div>

                    <div class="mt-5 sm:mt-6">
                        <label class="text-sm" for="particular_id">Particular</label>
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
                        <input type="date" id="start" wire:model="start"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @error('start')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mt-5 sm:mt-6">
                        <label class="text-sm" for="bill">End</label>
                        <input type="date" id="end" wire:model="end"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @error('end')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    <div class="mt-5 sm:mt-6">
                        <label class="text-sm" for="bill">Amount</label>
                        <input type="number" step="0.001" id="bill" wire:model="bill"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @error('bill')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    <div class="mt-5 sm:mt-6">
                       
                        <x-button type="submit" wire:loading.remove>   Update
                        </x-button>
                        <x-button type="button" wire:loading>   Loading...
                        </x-button>
                     
                    
                    </div>
                </form>
    </div>
</x-modal-component>