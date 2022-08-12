<form method="POST" wire:submit.prevent="submitForm()" enctype="multipart/form-data"
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
    <div class="pt-5">
        <div class="flex justify-end">
            <button type="button"
                onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner->uuid }}/'"
                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Skip
            </button>
            <x-form-button type="submit" wire:loading.remove wire:click="submitForm()">
                Submit
            </x-form-button>

        </div>
    </div>
</form>