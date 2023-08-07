<x-modal-component>
    <x-slot name="id">
        view-collection-modal-{{ $collection->id }}
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">View Collection

                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>
            <form wire:submmit.prevent="closeView()">
                {{-- <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="tenant">Tenant</label>
                    <input type="text" readonly value="{{ $contract->tenant->tenant }}"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>

                </div> --}}

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
                    @if($collection->tenant_uuid)
                    <label class="text-sm" for="start">Tenant</label>
                    <input type="text" value="{{ $collection->tenant->tenant }}" readonly
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @elseif($collection->owner_uuid)
                    <label class="text-sm" for="start">Owner</label>
                    <input type="text" value="{{ $collection->owner->owner }}" readonly
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @elseif($collection->guest_uuid)
                    <label class="text-sm" for="start">Guest</label>
                    <input type="text" value="{{ $collection->guest->guest }}" readonly
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @else
                    <label class="text-sm" for="start">NA</label>
                    @endif
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="mode_of_payment">Mode of payment</label>
                    <x-form-select id="mode_of_payment" name="mode_of_payment" wire:model="mode_of_payment" class="">
                        <option value="">Select one</option>

                        <option value="bank" {{ "bank"===$mode_of_payment? 'selected' : 'Select one' }}>
                            bank
                        </option>
                        <option value="cash" {{ "cash"===$mode_of_payment? 'selected' : 'Select one' }}>
                            cash
                        </option>
                        <option value="cheque" {{ "cheque"===$mode_of_payment? 'selected' : 'Select one' }}>
                            cheque
                        </option>
                        <option value="e-wallet" {{ "e-wallet"===$mode_of_payment? 'selected' : 'Select one' }}>
                            e-wallet
                        </option>
                    </x-form-select>

                    @error('status')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>



                @if($mode_of_payment === 'bank')
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Date Deposited</label>
                    <input type="date" id="date_deposited" wire:model="date_deposited"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('date_deposited')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Bank</label>
                    <input type="text" id="bank" wire:model="bank"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('bank')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @elseif($mode_of_payment === 'cheque')
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Cheque No</label>
                    <input type="text" id="cheque_no" wire:model="cheque_no"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('cheque_no')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Amount Paid</label>
                    <input type="number" id="amount" wire:model="amount"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('amount')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="interaction_id">Interaction</label>
                    {{ App\Models\Collection::where('property_uuid', $collection->property_uuid)->where('ar_no',$collection->ar_no)->get() }}
                    {{-- <x-form-select id="interaction_id" name="interaction_id" wire:model="interaction_id" class="">
                        <option value="">Select one</option>
                        @foreach($interactions as $interaction)
                        <option value="{{ $interaction->id }}" {{ $interaction->id===$interaction_id? 'selected' :
                            'Select one' }}>
                            {{ $interaction->interaction }}
                        </option>
                        @endforeach


                    </x-form-select> --}}

                    @error('interaction_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">

                    <button type="button" wire:click="closeView"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        Close
                    </button>

                </div>
            </form>
        </div>
    </div>
</x-modal-component>