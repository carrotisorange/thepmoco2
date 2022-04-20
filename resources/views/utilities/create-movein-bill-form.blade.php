<form method="POST" wire:submit.prevent="submitForm"
    action="/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ $contract->uuid }}/bill/{{ Str::random(8) }}/store"
    class="w-full" id="create-form">
    @csrf

    <div class="flex flex-wrap -mx-3 mb-6">

        <div class="w-full md:w-1/4 px-3">
            <x-label for="particular_id">
                Particular
            </x-label>
            <x-form-select wire:model="particular_id"
                id="particular_id" name="particular_id">
                <option value="">Select one</option>
                @foreach ($particulars as $particular)
                <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->id?
                    'selected': 'Select one'
                    }}>{{ $particular->particular }}</option>
                @endforeach
            </x-form-select>

            @error('particular_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/4 px-3">
            <x-label for="bill">
                Amount
            </x-label>
            <x-form-input wire:model="bill"
                id="bill" type="number" value="{{ old('bill') }}" name="bill" min="0" />

            @error('bill')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/4 px-3">
            <x-label for="start">
                Period covered (start)
            </x-label>
            <x-form-input wire:model="start"
                id="grid-last-name" type="date" value="{{ old('start',$start) }}" name="start" />

            @error('start')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/4 px-3">
            <x-label for="end">
                Period covered (end)
            </x-label>
            <x-form-input wire:model="end"
                id="end" type="date" value="{{ old('end',$end) }}" name="end" />

            @error('end')
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