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
                    </x-lab>
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
                <x-label for="interaction">
                    Interaction<span class="text-red-600">*</span> (<span class="text-indigo-600">For marketing
                        purposes</span>)
                </x-label>
                <x-form-select x-data="{ open: false }"  wire:model="interaction" id="interaction" name="interaction">

                    <option value="">Select one</option>
                    <option x-data="{ open: false }" value="ads" {{ old('interaction')=='ads' ? 'selected' : 'Select one' }}>
                        {{
                        'ads' }}</option>
                    <option x-data="{ open: false }" value="facebook" {{ old('interaction')=='facebook' ? 'selected' : 'Select one' }}>
                        {{
                        'facebook' }}</option>
                    <option x-data="{ open: true }" value="referred" {{ old('interaction')=='referred' ? 'selected' : 'Select one' }}>
                        {{
                        'referred' }}</option>
                    <option x-data="{ open: false }" value="walk-in" {{ old('interaction')=='walk-in' ? 'selected' : 'Select one' }}>
                        {{
                        'walk-in' }}</option>
                </x-form-select>

                @error('interaction')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div x-show="false" class="flex flex-wrap mx-3 mb-6">
            <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
                <x-label for="contract">
                   Name of the referral
                </x-label>

                <x-form-input wire:model="referral" id="referral" type="text" name="referral"
                    value="{{ old('referral') }}" />

                @error('referral')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


        </div>

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
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
                    <i class="fa-solid fa-circle-right"></i>&nbspSubmit
                </x-button>
            </p>
        </div>
    </form>

</div>