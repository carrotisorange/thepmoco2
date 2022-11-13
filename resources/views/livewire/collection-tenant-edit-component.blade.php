<div>
    <div class="p-3">
        <div class="p-8 bg-white border-b border-gray-200">
            <div class="mt-2 flex flex-wrap mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <x-label for="created_at">
                        Date
                    </x-label>
                    <x-form-input form="edit-form" name="created_at" wire:model="created_at" type="date" required />

                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label for="particular_id">
                        Mode of payment
                    </x-label>
                    <x-form-select form="edit-form" name="form" wire:model="form" required>
                        <option value="bank" {{ old('form')=='bank' ? 'selected' : 'Select one' }}>bank</option>
                        <option value="cash" {{ old('form')=='cash' ? 'selected' : 'Select one' }} selected>cash
                        </option>
                        <option value="cheque" {{ old('form')=='cheque' ? 'selected' : 'Select one' }}>cheque
                        </option>
                        <option value="e-wallet" {{ old('form')=='e-wallet' ? 'selected' : 'Select one' }} selected>
                            e-wallet
                        </option>
                    </x-form-select>

                    @error('form')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @if($form === 'bank')
            <div class="mt-2 flex flex-wrap mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <x-label for="bank">
                        Bank
                    </x-label>
                    <x-form-input form="edit-form" name="bank" wire:model="bank" type="text" />

                    @error('bank')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label for="date_deposited">
                        Date Deposited
                    </x-label>
                    <x-form-input form="edit-form" name="date_deposited" wire:model="date_deposited" type="date" />

                    @error('date_deposited')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


            </div>

            @endif
            <div class="w-full  px-3">
                <x-label for="attachment">
                    Proof of payment (i.e., Deposit Slip)
                </x-label>
                <x-form-input form="edit-form" name="attachment" wire:model="attachment" type="file" />

                @error('attachment')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2 flex flex-wrap mb-6">

            </div>

            @if($form === 'cheque')
            <div class="mt-2 flex flex-wrap mb-6">
                <div class="w-full px-3">
                    <x-label for="check_no">
                        Cheque No
                    </x-label>
                    <x-form-input form="edit-form" name="check_no" wire:model="check_no" type="text" />

                    @error('check_no')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>
            </div>
            @endif
        </div>


        <div class="mt-5 p-2 bg-white border-b border-gray-200">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                       @include('forms.collections.collection-tenant-create')
                    </div>
                </div>
            </div>

        </div>

        {{--
        @if($tenant->email)
        <div class="mt-5 p-2 bg-white border-b border-gray-200">
            <div class="flex flex-wrap mb-6">
                <div class="mt-2 w-full md:w-full  mb-6 md:mb-0">
                    <div>
                        Acknowledgement Receipt will be sent to {{ $tenant->email }}
                    </div>
                </div>
            </div>
        </div>
        @endif --}}

        <div class="mt-5 p-2">
            <p class="text-right">
                <x-button form="edit-form">
                    Confirm Payment
                </x-button>
            </p>
        </div>
    </div>
</div>