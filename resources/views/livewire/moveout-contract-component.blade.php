<div>
    <form method="POST" wire:submit.prevent="submitForm" action="/contract/{{ $contract->uuid }}/store" class="w-full"
        id="create-form">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="moveout_at">
                    Date of moveout
                </x-label>
                <x-input wire:model="moveout_at"
                    class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                    id="moveout_at" type="date" name="moveout_at" value="{{ old('moveout_at'. $moveout_at) }}" />

                @error('moveout_at')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="grid-first-name">
                    Reason for moving out
                </x-label>


                <select wire:model="moveout_reason"
                    class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                    name="moveout_reason" id="moveout_reason">
                    <option value="">Select one</option>
                    <option value="End of Contract" {{ old('moveout_reason')=='End of Contract' ? 'selected'
                        : 'Select one' }}>End of Contract</option>

                    <option value="Force Majeure" {{ old('moveout_reason')=='Force Majeure' ? 'selected' : 'Select one'
                        }}>Force Majeure</option>
                    <option value="Just Graduated" {{ old('moveout_reason')=='Just Graduated' ? 'selected' : 'Select one'
                        }}>Just Graduated
                    </option>
                    <option value="Run Away" {{ old('moveout_reason')=='Run Away' ? 'selected' : 'Select one' }}>Run Away
                    </option>
                    <option value="Delinquent" {{ old('moveout_reason')=='Delinquent' ? 'selected' : 'Select one' }}>
                        Delinquent
                    </option>
                    <option value="Unruly" {{ old('moveout_reason')=='Unruly' ? 'selected' : 'Select one' }}>Unruly
                    </option>
                    <option value="Unsatisfied with the service" {{ old('moveout_reason')=='Unsatisfied with the service'
                        ? 'selected' : 'Select one' }}>Unsatisfied with the service
                    </option>
                </select>

                @error('moveout_reason')
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