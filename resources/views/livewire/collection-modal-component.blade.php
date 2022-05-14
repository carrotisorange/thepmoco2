<form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" wire:submit.prevent="submitForm">
    @csrf
    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Enter Collection Information</h3>
    {{-- <br>
    <h4>Amount to be paid: {{ number_format($total, 2) }}</h4> --}}
    <div>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-1/2 px-3">
                <x-label for="particular_id">
                    Mode of payment
                </x-label>
                <x-form-select wire:model="form" id="form" name="form" required>
                    <option value="bank" {{ old('form')=='bank' ? 'selected' : 'Select one' }}>bank</option>
                    <option value="cash" {{ old('form')=='cash' ? 'selected' : 'Select one' }} selected>cash
                    </option>
                    <option value="cheque" {{ old('form')=='cheque' ? 'selected' : 'Select one' }}>cheque
                    </option>
                </x-form-select>

                @error('form')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full md:w-1/2 px-3">
                <x-label for="bill">
                    Amount
                </x-label>
                <x-form-input wire:model="collection" id="collection" type="number"
                    value="{{ old('collection', $total) }}" name="collection" min="0" />

                @error('collection')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        @if($form === 'bank')
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="bank">
                    Bank
                </x-label>
                <x-form-input wire:model="bank" id="bank" type="text" value="{{ old('bank', $bank) }}" name="bank" />

                @error('bank')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="attachment">
                    Attachment <span class="text-red-600">*</span>
                </x-label>
                <x-form-input wire:model="attachment" id="attachment" type="file"
                    value="{{ old('attachment', $attachment) }}" name="attachment" />

                @error('attachment')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        @endif

        @if($form === 'cheque')
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="check_no">
                    Check No
                </x-label>
                <x-form-input wire:model="check_no" id="check_no" type="text" value="{{ old('check_no', $check_no) }}" name="check_no" />

                @error('check_no')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="attachment">
                    Attachment
                </x-label>
                <x-form-input wire:model="attachment" id="attachment" type="file"
                    value="{{ old('attachment', $attachment) }}" name="attachment" />

                @error('attachment')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        @endif
        <div class="mt-5">
            <p class="text-right">
                <x-form-button></x-form-button>
            </p>
        </div>
</form>