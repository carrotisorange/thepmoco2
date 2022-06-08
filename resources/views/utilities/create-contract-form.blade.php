<div>
    <form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data"
        action="/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/store" class="w-full"
        id="create-form">
        @csrf
        <div class="flex flex-wrap mx-3 mb-6">

            <div class="w-full md:w-1/2 px-3">
                <x-label for="start">
                    Start <span class="text-red-600">*</span>
                </x-label>
                <x-form-input wire:model="start" id="start" type="date" value="{{ old('start', $start)}}"
                    name="start" />

                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <x-label for="end">
                    End <span class="text-red-600">*</span>
                </x-label>
                <x-form-input wire:model="end" id="end" type="date" name="end" value="{{ old('end', $end )}}" />

                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="flex flex-wrap mx-3 mb-6">

            <div class="w-full md:w-1/3 px-3">
                <x-label for="rent">
                    Rent <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model="rent" id="rent" type="number" value="{{ $rent }}" name="rent" readonly />

                    @error('rent')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
            </div>

            <div class="w-full md:w-1/3 px-3">
                <x-label for="discount">
                    Discount
                </x-label>
                <x-form-input wire:model="discount" id="discount" type="number" value="{{ old('discount', $discount) }}"
                    name="discount" />

                @error('discount')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/3 px-3">
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
        <div class="flex flex-wrap mx-3 mb-6">
            <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
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

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
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
        <div class="flex flex-wrap mx-3 mb-6">
            <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                <div>
                    <div class="form-check">
                        <input wire:model="sendContract"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="{{ old('sendContract'), $sendContract }}" name="sendContract"
                            id="flexCheckChecked">
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                            Send contract details to tenant through e-mail.
                        </label>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="mt-4">
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
                    <i class="fa-solid fa-circle-right"></i>&nbspSubmit
                </x-button>
            </p>
        </div>
    </form>

</div>