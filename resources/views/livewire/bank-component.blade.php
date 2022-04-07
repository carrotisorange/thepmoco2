<div>
    <form method="POST" wire:submit.prevent="submitForm"
        id="create-form">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="account_name">
                    Account Name
                </x-label>
                <x-input wire:model="account_name"
                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="account_name" type="text" name="account_name" value="{{ old('account_name', $owner->owner) }}" />

                @error('account_name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="bank_name">
                    Bank Name
                </label>
                <x-input wire:model="bank_name"
                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="bank_name" type="text" name="bank_name" value="{{ old('bank_name') }}" />
                @error('bank_name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="account_number">
                    Account Number
                </label>
                <input wire:model="account_number"
                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="account_number" type="text" name="account_number" value="{{ old('account_number') }}">

                @error('account_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button form="create-form">
                    <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Submit
                </x-button>
            </p>
        </div>
    </form>
</div>