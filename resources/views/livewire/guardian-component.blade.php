<div>
    <form method="POST" wire:submit.prevent="submitForm"
        action="/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/guardian/{{ Str::random(10) }}/store" class="w-full"
        id="create-form">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="grid-first-name">
                    Full Name
                </x-label>
                <x-input wire:model="guardian"
                    class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-first-name" type="text" name="guardian" value="{{ old('guardian') }}" />

                @error('guardian')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Relationship
                </label>
                <select wire:model="relationship"
                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state" name="relationship">
                    <option value="">Select one</option>
                    <option value="parent" {{ old('relationship')=='parent' ? 'selected' : 'Select one' }}>{{
                        'parent' }}</option>
                    <option value="spouse" {{ old('relationship')=='spouse' ? 'selected' : 'Select one' }}>{{
                        'spouse' }}</option>
                    <option value="sibling" {{ old('relationship')=='sibling' ? 'selected' : 'Select one' }}>{{
                        'sibling' }}</option>
                    <option value="friend" {{ old('relationship')=='friend' ? 'selected' : 'Select one' }}>{{
                        'friend' }}</option>
                    <option value="relative" {{ old('relationship')=='relative' ? 'selected' : 'Select one' }}>{{
                        'relative' }}</option>
                    <option value="child" {{ old('relationship')=='child' ? 'selected' : 'Select one' }}>{{
                        'child' }}</option>

                </select>

                @error('relationship')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Email
                </label>
                <input wire:model="email"
                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="email" name="email" value="{{ old('email') }}">

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Mobile
                </label>
                <input wire:model="mobile_number"
                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="text" name="mobile_number" value="{{ old('mobile_number') }}">

                @error('mobile_number')
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