<form class="space-y-6" wire:submit.prevent="submitForm()" enctype="multipart/form-data" method="POST">


    <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <label for="start" class="block text-sm font-medium text-gray-700">Start</label>
                        <input type="date" wire:model.lazy="start" autocomplete="start"
                            class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('start')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="end" class="block text-sm font-medium text-gray-700">End</label>
                        <input type="date" wire:model.lazy="end" autocomplete="end"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('end')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="col-span-1">
                        <label for="rent" class="block text-sm font-medium text-gray-700">Rent</label>
                        <input type="number" wire:model.lazy="rent" autocomplete="rent" readonly step="0.001"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('rent')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                        <input type="number" wire:model.lazy="discount" autocomplete="discount" readonly step="0.001"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('discount')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="interaction_id" class="block text-sm font-medium text-gray-700">Interaction</label>
                        <select wire:model.lazy="interaction_id" autocomplete="interaction_id"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select one</option>
                            @foreach ($interactions as $interaction)
                            <option value="{{ $interaction->id }}" {{ old('interaction_id')==$interaction->id?
                                'selected': 'Select one'
                                }}>{{ $interaction->interaction }}</option>
                            @endforeach
                        </select>
                        @error('interaction_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                    
                        <label class="block text-sm font-medium text-gray-700"> Attached the contract here.
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                    
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input wire:model.lazy="contract" id="file-upload" type="file" value="{{ old('contract') }}" 
                                            class="sr-only">
                                    </label>
                                    <p class="pl-1"></p>
                                </div>
                    
                            </div>
                            @error('contract')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

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


                </div>
            </div>
        </div>

        <div class="flex justify-end mt-5">
            {{-- <button type="button"
                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a
                    href="addtenant3">Back</a></button> --}}
            <button type="submit" wire:click="submitForm()"
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

{{-- <form method="POST" wire:submit.prevent="submitForm()" enctype="multipart/form-data" class="w-full"
    id="create-form">
    @csrf
    <div class="flex flex-wrap mb-6">
        <div class="w-full md:w-1/2 ">
            <x-label for="start">
                Start <span class="text-red-600">*</span>
            </x-label>
            <x-form-input wire:model="start" id="start" type="date" value="{{ old('start', $start)}}" name="start" />

            @error('start')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 ">
            <x-label for="end">
                End <span class="text-red-600">*</span>
            </x-label>
            <x-form-input wire:model="end" id="end" type="date" name="end" value="{{ old('end', $end )}}" />

            @error('end')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mb-6">

        <div class="w-full md:w-1/3 ">
            <x-label for="rent">
                Rent <span class="text-red-600">*</span>
            </x-label>
            <x-form-input wire:model="rent" id="rent" type="number" value="{{ $rent }}" name="rent" readonly />

            @error('rent')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/3 ">
            <x-label for="discount">
                Discount
            </x-label>
            <x-form-input wire:model="discount" id="discount" type="number" value="{{ old('discount', $discount) }}"
                name="discount" />

            @error('discount')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/3 ">
            <x-label for="interaction_id">
                Interaction<span class="text-red-600">*</span>
            </x-label>
            <x-form-select wire:model="interaction_id">
                <option value="">Select one</option>
                @foreach ($interactions as $interaction)
                <option value="{{ $interaction->id }}" {{ old('interaction_id')==$interaction->id?
                    'selected': 'Select one'
                    }}>{{ $interaction->interaction }}</option>
                @endforeach
            </x-form-select>

            @error('interaction_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @if($interaction_id == 10)
    <div class="flex flex-wrap mb-6">
        <div class="mt-2 w-full md:w-full  mb-6 md:mb-0">
            <x-label for="contract">
                Name of the referral <span class="text-red-600">*</span>
            </x-label>

            <x-form-input wire:model="referral" id="referral" type="text" name="referral"
                value="{{ old('referral') }}" />

            @error('referral')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @endif
    <div class="flex flex-wrap mb-6">
        <div class="mt-2 w-full md:w-full  mb-6 md:mb-0">
            <x-label for="contract">
                Contract (Please attached the signed contract here.)
            </x-label>

            <x-form-input wire:model="contract" id="contract" type="file" name="contract"
                value="{{ old('contract') }}" />

            @error('contract')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @if($tenant->email)
    <div class="flex flex-wrap mb-6">
        <div class="mt-2 w-full md:w-full  mb-6 md:mb-0">
            <div>
                <div class="form-check">
                    <input wire:model="sendContract"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="checkbox" value="{{ old('sendContract'), $sendContract }}" name="sendContract"
                        id="flexCheckChecked">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                        Send contract details to {{ $tenant->email }}.
                    </label>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="pt-5">
        <div class="flex justify-end">
            <x-form-button type="submit" wire:loading.remove wire:click="submitForm()" id="create-form">
                Submit
            </x-form-button>
        </div>
    </div>
</form> --}}