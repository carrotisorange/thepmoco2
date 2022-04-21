<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="p-6 bg-white">
                <div>
                    <form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data" class="w-full"
                        id="create-form">
                        @csrf
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3">
                                <x-label for="unit_uuid">
                                    Selec a unit <span class="text-red-600">*</span>
                                </x-label>

                                <x-form-select wire:model="unit_uuid" id="unit_uuid" name="unit_uuid">
                                    <option value="">Select one</option>
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->uuid }}" {{ old('unit_uuid')==$unit->id?
                                        'selected': 'Select one'
                                        }}>{{ $unit->building->building.' '.$unit->unit }}</option>
                                    @endforeach
                                </x-form-select>
                                @error('unit_uuid')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/4 px-3">
                                <x-label for="start">
                                    Start <span class="text-red-600">*</span>
                                </x-label>
                                <x-form-input wire:model="start" id="start" type="date"
                                    value="{{ old('start', $start)}}" name="start" />

                                @error('start')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    End <span class="text-red-600">*</span>
                                </label>
                                <x-form-input wire:model="end" id="end" type="date" name="end"
                                    value="{{ old('end', $end )}}" />

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
                                <x-form-input wire:model="term" id="term" value="{{ old('term', $term)}} " type="text"
                                    name="term" readonly/>
                            </div>

                            <div class="w-full md:w-1/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Rent/mo
                                </label>
                                <x-form-input wire:model="rent" id="rent" type="number" value="{{ old('rent',$rent) }}"
                                    name="rent" readonly />

                                @error('rent')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/3 px-3">
                                <x-label for="discount">
                                    Discount
                                </x-label>
                                <x-form-input wire:model="discount" id="discount" type="number"
                                    value="{{ old('discount', $discount) }}" name="discount" readonly />

                                @error('discount')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
                                <x-label for="contract"
                                    :value="__('Contract (Please attached the signed contract here.)')" />

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
                                    <svg wire:loading wire:target="submitForm"
                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                   <i class="fa-solid fa-circle-check"></i>&nbspSubmit
                                </x-button>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>