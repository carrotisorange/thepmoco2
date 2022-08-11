<form method="POST" wire:submit.prevent="submitForm" action="/contract/{{ $contract->uuid }}/store" class="w-full"
    id="create-form">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
            <x-label for="moveout_at">
                Date of moveout
            </x-label>
            <x-form-input wire:model="moveout_at" id="moveout_at" type="date" name="moveout_at"
                value="{{ old('moveout_at'. $moveout_at) }}" />

            @error('moveout_at')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <x-label for="moveout_reason">
                Reason for moving out
            </x-label>


            <x-form-select wire:model="moveout_reason" name="moveout_reason" id="moveout_reason">
                <option value="">Select one</option>
                <option value="End of Contract" {{ old('moveout_reason')=='End of Contract' ? 'selected' : 'Select one'
                    }}>End of Contract</option>

                <option value="Force Majeure" {{ old('moveout_reason')=='Force Majeure' ? 'selected' : 'Select one' }}>
                    Force Majeure</option>
                <option value="Just Graduated" {{ old('moveout_reason')=='Just Graduated' ? 'selected' : 'Select one'
                    }}>Just Graduated
                </option>
                <option value="Run Away" {{ old('moveout_reason')=='Run Away' ? 'selected' : 'Select one' }}>Run
                    Away
                </option>
                <option value="Delinquent" {{ old('moveout_reason')=='Delinquent' ? 'selected' : 'Select one' }}>
                    Delinquent
                </option>
                <option value="Unruly" {{ old('moveout_reason')=='Unruly' ? 'selected' : 'Select one' }}>Unruly
                </option>
                <option value="Unsatisfied with the service" {{ old('moveout_reason')=='Unsatisfied with the service'
                    ? 'selected' : 'Select one' }}>Unsatisfied
                    with the service
                </option>
            </x-form-select>

            @error('moveout_reason')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @if($contract->tenant->email)
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
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
    <div class="mt-5">
        <p class="text-right">
            <x-form-button>Moveout</x-form-button>
        </p>
    </div>
</form>