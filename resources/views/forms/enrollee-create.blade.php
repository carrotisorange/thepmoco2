<form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data"
    action="/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/enrollee/{{ Str::random(8) }}/store" class="w-full"
    id="create-form">
    @csrf
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
            <x-label for="start">
                Start
            </x-label>
            <x-form-input wire:model="start" id="start" type="date" value="{{ old('start', $start)}}" name="start" />

            @error('start')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <x-label for="end">
                End
            </x-label>
            <x-form-input wire:model="end" id="end" type="date" name="end" value="{{ old('end', $end )}}" />

            @error('end')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="flex flex-wrap mx-3 mb-6">

        <div class="w-full md:w-1/2 px-3">
            <x-label for="term">
                Term
            </x-label>
            <x-form-input wire:model="term" id="term" value="{{ old('term', $term)}} " type="text" name="term"
                readonly />
        </div>

        <div class="w-full md:w-1/4 px-3">
            <x-label for="rent">
                Rent
            </x-label>
            <x-form-input wire:model="rent" id="rent" type="number" value="{{ old('rent',$rent) }}" name="rent" />

            @error('rent')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/4 px-3">
            <x-label for="discount">
                Discount
            </x-label>
            <x-form-input wire:model="discount" id="grid-last-name" type="number"
                value="{{ old('discount', $discount) }}" name="discount" />

            @error('discount')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
            <x-label for="contract" :value="__('Contract (Please attached the signed contract here.)')" />

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
                Create
            </x-button>
        </p>
    </div>
</form>