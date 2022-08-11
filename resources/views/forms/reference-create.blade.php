<form method="POST" wire:submit.prevent="submitForm()" class="w-full" id="create-form">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
            <x-label for="reference">
                Full Name <span class="text-red-600">*</span>
            </x-label>
            <x-form-input wire:model="reference" id="reference" type="text" name="reference"
                value="{{ old('reference') }}" />

            @error('reference')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <x-label form="relationship">
                Relationship <span class="text-red-600">*</span>
            </x-label>
            <x-form-select wire:model="relationship_id" id="grid-relationship_id" name="relationship_id">
                <option value="">Select one</option>
                @foreach ($relationships as $relationship)
                <option value="{{ $relationship->id }}" {{ old('relationship_id')==$relationship->id?
                    'selected': 'Select one'
                    }}>{{ $relationship->relationship }}</option>
                @endforeach
            </x-form-select>
            @error('relationship_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-6 w-full md:w-1/2 px-3">
            <x-label for="email">
                Email
            </x-label>
            <x-form-input wire:model="email" id="grid-last-name" type="email" name="email" value="{{ old('email') }}" />

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-6 w-full md:w-1/2 px-3">
            <x-label for="mobile_number">
                Mobile <span class="text-red-600">*</span>
            </x-label>
            <x-form-input wire:model="mobile_number" id="grid-last-name" type="number" name="mobile_number"
                value="{{ old('mobile_number') }}" />

            @error('mobile_number')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="pt-5">
        <div class="flex justify-end">
            <button type="button"
                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create'"
                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Skip
            </button>
            <x-form-button type="submit" wire:loading.remove wire:click="submitForm()" id="create-form">
                Submit
            </x-form-button>
        </div>
    </div>
</form>