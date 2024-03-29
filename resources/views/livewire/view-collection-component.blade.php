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
                    <x-validation-error-component name='status' />
                </div>



                @if($mode_of_payment === 'bank')
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Date Deposited</label>
                    <input type="date" id="date_deposited" wire:model="date_deposited"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                  <x-validation-error-component name='date_deposited' />
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Bank</label>
                    <input type="text" id="bank" wire:model="bank"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                  <x-validation-error-component name='bank' />
                </div>
                @elseif($mode_of_payment === 'cheque')
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Cheque No</label>
                    <input type="text" id="cheque_no" wire:model="cheque_no"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                  <x-validation-error-component name='cheque_no' />
                </div>
                @endif

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="start">Amount Paid</label>
                    <input type="number" id="amount" wire:model="amount"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                  <x-validation-error-component name='amount' />
                </div>



                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="interaction_id">Interaction</label>
                    {{ App\Models\Collection::where('property_uuid',
                    $collection->property_uuid)->where('ar_no',$collection->ar_no)->get() }}


                  <x-validation-error-component name='interaction_id' />
                </div>

                <div class="mt-5 sm:mt-6">

                    <button type="button" wire:click="closeView" class="w-full">
                        Close
                    </button>

                </div>
            </form>
        </div>
    </div>
</x-modal-component>
