<form action="#" method="POST" wire:submit.prevent="submitForm">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-3 sm:col-span-2">
                    <label for="moveout_at" class="block text-sm font-medium text-gray-700">Date of Moveout</label>
                    <input type="date" wire:model="moveout_at" 
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="tenant" class="block text-sm font-medium text-gray-700">
                        Tenant</label>
                    <input type="text" wire:model="tenant" readonly
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="unit" class="block text-sm font-medium text-gray-700">Unit
                        No.</label>
                    <input type="text" wire:model="unit" readonly
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                </div>






                <div class="sm:col-span-6">
                    <label for="moveout_reason" class="block text-sm font-medium text-gray-700">Reason for
                        moveout:</label>
                    <div class="mt-1">
                        <x-form-select wire:model="moveout_reason" name="moveout_reason" id="moveout_reason" required>
                                    <option value="">Select one</option>
                                    <option value="End of Contract" {{ old('moveout_reason')=='End of Contract' ? 'selected' : 'Select one' }}>
                                        {{ 'End of Contract' }}
                                    </option>
                                    <option value="Force Majeure" {{ old('moveout_reason')=='Force Majeure' ? 'selected' : 'Select one' }}>
                                        {{ 'Force Majeure' }}
                                    </option>
                                    <option value="Just Graduated" {{ old('moveout_reason')=='Just Graduated' ? 'selected' : 'Select one' }}>
                                        {{ 'Just Graduated' }}
                                    </option>
                                    <option value="Run Away" {{ old('moveout_reason')=='Run Away' ? 'selected' : 'Select one' }}>
                                        {{ 'Run Away' }}
                                    </option>
                                    <option value="Delinquent" {{ old('moveout_reason')=='Delinquent' ? 'selected' : 'Select one' }}>
                                        {{ 'Delinquent' }}
                                    </option>
                                    <option value="Unruly" {{ old('moveout_reason')=='Unruly' ? 'selected' : 'Select one' }}>
                                        {{ 'Unruly' }}
                                    </option>
                                    <option value="Unsatisfied with the service" {{ old('moveout_reason')=='Unsatisfied with the service' ? 'selected'
                                        : 'Select one' }}>
                                        {{ 'Unsatisfied with the service' }}
                                    </option>
                                </x-form-select>
                                
                                @error('moveout_reason')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror                    </div>

                </div>



                {{-- <div class="sm:col-span-3">
                    <fieldset>
                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">Approved
                                by:
                            </label>
                            <div class="mt-1">
                                <textarea id="about" name="about" rows="3"
                                    class="h-5 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                    placeholder=""></textarea>
                            </div>
                        </div>


                </div> --}}
            </div>
            <div class="px-4 py-3 text-right sm:px-6">
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
                    Confirm Moveout
                </button>
            </div>
        </div>
</form>

{{-- <form method="POST" wire:submit.prevent="submitForm" action="/contract/{{ $contract->uuid }}/store" class="w-full"
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

            <x-form-select wire:model="moveout_reason" name="moveout_reason" id="moveout_reason" required>
                <option value="">Select one</option>
                <option value="End of Contract" {{ old('moveout_reason')=='End of Contract' ? 'selected' : 'Select one'
                    }}>
                    {{ 'End of Contract' }}
                </option>
                <option value="Force Majeure" {{ old('moveout_reason')=='Force Majeure' ? 'selected' : 'Select one' }}>
                    {{ 'Force Majeure' }}
                </option>
                <option value="Just Graduated" {{ old('moveout_reason')=='Just Graduated' ? 'selected' : 'Select one'
                    }}>
                    {{ 'Just Graduated' }}
                </option>
                <option value="Run Away" {{ old('moveout_reason')=='Run Away' ? 'selected' : 'Select one' }}>
                    {{ 'Run Away' }}
                </option>
                <option value="Delinquent" {{ old('moveout_reason')=='Delinquent' ? 'selected' : 'Select one' }}>
                    {{ 'Delinquent' }}
                </option>
                <option value="Unruly" {{ old('moveout_reason')=='Unruly' ? 'selected' : 'Select one' }}>
                    {{ 'Unruly' }}
                </option>
                <option value="Unsatisfied with the service" {{ old('moveout_reason')=='Unsatisfied with the service'
                    ? 'selected' : 'Select one' }}>
                    {{ 'Unsatisfied with the service' }}
                </option>
            </x-form-select>

            @error('moveout_reason')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @if($contract->tenant->email)
    <div class="w-full md:w-1/2 px-3">

        <div class="form-check">
            <input wire:model="sendContract"
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                type="checkbox" value="{{ old('sendContract'), $sendContract }}" name="sendContract"
                id="flexCheckChecked">
            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                Send moveout details to tenant.
            </label>
        </div>

    </div>
    @endif
    <div class="mt-5">
        <p class="text-right">
            <x-form-button>Moveout</x-form-button>
        </p>
    </div>
</form> --}}