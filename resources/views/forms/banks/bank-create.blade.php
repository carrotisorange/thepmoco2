<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
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
                <div class="mt-5 col-span-6">
                    <label for="financing_company" class="block text-sm font-medium text-gray-700">Financing
                        Company</label>
                    <x-form-input type="text" wire:model="financing_company" placeholder="Please enter your bank name."/>
                    @error('financing_company')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                <div class="mt-3 col-span-6">
                    <label for="turnover_at" class="block text-sm font-medium text-gray-700">Date of Purchase</label>
                    <x-form-input type="date" wire:model="turnover_at" placeholder="" step="0.001"/>
                    @error('turnover_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-3 col-span-6">
                    <label for="price" class="block text-sm font-medium text-gray-700">Puchasing Price</label>
                    <x-form-input type="number" step="0.001" wire:model="price" placeholder=""/>
                    @error('price')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <label for="bank_name" class="mt-3 block text-md font-medium text-gray-700">Bank Details</label>

                <div class="grid grid-cols-2 gap-6">
                    <div class="mt-3 col-span-6">
                        <label for="bank_name" class="block text-sm font-medium text-gray-700">Name of the Bank</label>
                        <x-form-input type="text" wire:model="bank_name" placeholder="Please enter your bank name."/>
                        @error('bank_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-1">
                        <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                        <x-form-input type="text" wire:model="account_name"/>
                        @error('account_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="account_number" class="block text-sm font-medium text-gray-700">Account
                            Number</label>
                        <x-form-input type="text" wire:model="account_number"/>
                        @error('account_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/occupancy/create">
                Skip
            </a>
              <x-button type="submit">
                Next
            </x-button>
        </div>
    </div>




</form>
