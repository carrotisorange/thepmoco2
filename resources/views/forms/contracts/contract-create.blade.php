<form class="space-y-6" wire:submit.prevent="submitForm()">
    <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <x-label for="start" >Start of the contract</x-label>
                        <x-form-input type="date" wire:model="start" autocomplete="start" />
                        <x-validation-error-component name='start' />
                    </div>

                    <div class="col-span-1">
                        <x-label for="end" >End of the contract</x-label>
                        <x-form-input type="date" wire:model="end" autocomplete="end" />
                     <x-validation-error-component name='end' />
                    </div>

                    <div class="col-span-1">
                        <x-label for="rent" >Rent/month/tenant</x-label>
                        <x-form-input type="number" wire:model="rent" autocomplete="rent" step="0.001"/>
                        <x-validation-error-component name='rent' />
                    </div>

                    <div class="col-span-1">
                        <x-label for="discount" >Discount </x-label>
                        <x-form-input type="number" wire:model="discount" autocomplete="discount" step="0.001" />
                        <x-validation-error-component name='discount' />
                    </div>

                    <div class="col-span-2">
                        <x-label for="interaction_id" >How did you acquire the tenant?</x-label>
                        <x-form-select wire:model="interaction_id" autocomplete="interaction_id">
                            @foreach ($interactions as $interaction)
                            <option value="{{ $interaction->id }}" {{ old('interaction_id')==$interaction->id?
                                'selected': 'Select one'
                                }}>{{ $interaction->interaction }}</option>
                            @endforeach
                        </x-form-select>
                     <x-validation-error-component name='interaction_id' />
                    </div>

                    @if($this->interaction_id == 10)
                    <div class="col-span-2">
                        <x-label for="referral" >Name of the referral</x-label>
                        <x-form-input type="text" wire:model="referral" autocomplete="referral" />
                        <x-validation-error-component name='referral' />
                    </div>
                    @endif

                    <div class="col-span-2">
                        <x-label > You may attached the signed contract
                            here.
                        </x-label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="image"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="image" name="image" type="file" class="sr-only"
                                            wire:model="contract">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($contract)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeContract()">Remove the attached contract.</a></span>
                                @endif
                            </div>


                        </div>
                        @error('contract')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($contract)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>

                        @endif
                        @enderror
                    </div>

                    <div class="mt-3 col-span-2">
                        <div class="form-check">
                            <input wire:model="autoGenerateBills"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="{{ old('autoGenerateBills'), $autoGenerateBills }}"
                                id="flexCheckChecked">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                                Automatically generate bills for this contract.
                            </label>
                        </div>
                    </div>


                    @if($tenant->email)
                    <div class="mt-3 col-span-2">
                        <div class="form-check">
                            <input wire:model="sendContractToTenant"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="{{ old('sendContractToTenant'), $sendContractToTenant }}"
                                id="flexCheckChecked">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                                Send contract details to tenant.
                            </label>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="flex justify-end mt-5">
            <x-button wire:click="makeReservation()">
                Mark as RESERVED
            </x-button>

             <x-button type="submit">
                Next
            </x-button>

        </div>
    </div>
</form>
