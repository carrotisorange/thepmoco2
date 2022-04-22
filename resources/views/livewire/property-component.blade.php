<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-6">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-12 bg-white border-b border-gray-200">
                <div>
                    <form method="POST" wire:submit.prevent="createForm" action="/property/{{ Str::random(8) }}/store"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="property" :value="__('Property')" />

                            <x-form-input wire:model="property" id="property" type="text"
                                name="property" :value="old('property')" autofocus />

                            @error('property')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="type" :value="__('Description')" />

                            <x-form-textarea wire:model="description" name="description" id="description" cols="30"
                                rows="10">{{ old('description') }} </x-form-textarea>

                            @error('description')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="type_id" :value="__('Type')" />

                            <x-form-select wire:model="type_id"
                              name="type_id" id="type_id">
                                <option value="">Select one</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id')==$type->id?
                                    'selected': 'Select one'
                                    }}>{{ $type->type }}</option>
                                @endforeach
                            </x-form-select>

                            @error('type_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="thumbnail" :value="__('Thumbnail')" />

                            <x-form-input wire:model="thumbnail" id="thumbnail" type="file"
                                name="thumbnail" :value="old('thumbnail')" autofocus />

                            @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="tenant_contract"
                                :value="__('Tenant Contract (Please only upload a PDF file.)')" />

                            <x-form-input wire:model="tenant_contract" id="tenant_contract" 
                                type="file" name="tenant_contract" :value="old('tenant_contract')" autofocus />

                            @error('tenant_contract')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="owner_contract"
                                :value="__('Owner Contract (Please only upload a PDF file.)')" />

                            <x-form-input wire:model="owner_contract" id="owner_contract" 
                                type="file" name="owner_contract" :value="old('owner_contract')" autofocus />

                            @error('owner_contract')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <p class="text-right">
                                <x-button>
                                    <svg wire:loading wire:target="createForm"
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
                </div>
                </form>
            </div>
        </div>
    </div>
</div>