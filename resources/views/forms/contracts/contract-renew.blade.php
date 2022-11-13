<form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data" class="w-full" id="create-form">
    @csrf
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
            <x-label for="start">
                Start
            </x-label>
            <x-form-input wire:model="start" id="grid-last-name" type="date" value="{{ old('start', $start)}}"
                name="start" readonly />

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

        <div class="w-full md:w-1/3 px-3">
            <x-label for="term">
                Term
            </x-label>
            <x-form-input wire:model="term" id="term" value="{{ old('term', $term)}} " type="text" name="term"
                readonly />
        </div>

        <div class="w-full md:w-1/3 px-3">
            <x-label for="rent">
                Rent/mo
            </x-label>
            <x-form-input wire:model="rent" id="rent" type="number" value="{{ old('rent',$rent) }}" name="rent"
                readonly />

            @error('rent')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/3 px-3">
            <x-label for="discount">
                Discount
            </x-label>
            <x-form-input wire:model="discount" id="discount" type="number" value="{{ old('discount', $discount) }}"
                name="discount" readonly />

            @error('discount')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
            <x-label for="contract" :value="__('Contract (Please attached the signed contract here.)')" />

            <x-form-input wire:model="contract" id="contract" type="file" name="contract"
                value="{{ old('contract') }}" />

            @error('contract')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @if($contract_details->tenant->email)
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
            <x-form-button>Renew</x-form-button>
        </p>
    </div>
</form>