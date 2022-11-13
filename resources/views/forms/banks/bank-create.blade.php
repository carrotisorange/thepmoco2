<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="mt-3 col-span-4">

                    <div class="form-check">

                        <input wire:model="is_the_property_on_loan"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="{{ old('is_the_property_on_loan'), $is_the_property_on_loan }}"
                            id="flexCheckChecked">
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                            Is the property on loan?
                        </label>

                    </div>

                </div>

                @if($is_the_property_on_loan)
                <div class="mt-3 col-span-6">
                    <label for="financing_company" class="block text-sm font-medium text-gray-700">Financing
                        Company</label>
                    <input type="text" wire:model="financing_company" placeholder="Please enter your bank name."
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('financing_company')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                <div class="mt-3 col-span-6">
                    <label for="turnover_at" class="block text-sm font-medium text-gray-700">Date of Purchase</label>
                    <input type="date" wire:model="turnover_at" placeholder="" step="0.001"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('turnover_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-3 col-span-6">
                    <label for="price" class="block text-sm font-medium text-gray-700">Puchasing Price</label>
                    <input type="number" step="0.001" wire:model="price" placeholder=""
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('price')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <label for="bank_name" class="mt-3 block text-md font-medium text-gray-700">Bank Details</label>

                <div class="grid grid-cols-2 gap-6">
                    <div class="mt-3 col-span-6">
                        <label for="bank_name" class="block text-sm font-medium text-gray-700">Name of the Bank</label>
                        <input type="text" wire:model="bank_name" placeholder="Please enter your bank name."
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('bank_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

         
                    <div class="col-span-1">
                        <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                        <input type="text" wire:model="account_name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('account_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="account_number" class="block text-sm font-medium text-gray-700">Account
                            Number</label>
                        <input type="text" wire:model="account_number"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('account_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                  

                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/occupancy/create">
                Skip
            </a>
            <button type="submit"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Next
            </button>
        </div>
    </div>




</form>