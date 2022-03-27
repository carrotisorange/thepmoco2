<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-6">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <form method="POST" wire:submit.prevent="createForm" action="/property/{{ Str::random(8) }}/store"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="property" :value="__('Property')" />

                            <x-input wire:model="property" id="property" class="block mt-1 w-full" type="text"
                                name="property" :value="old('property')" autofocus />

                            @error('property')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="type" :value="__('Description')" />

                            <textarea wire:model="description"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="description" id="description" cols="30"
                                rows="10">{{ old('description') }}</textarea>

                            @error('description')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="type_id" :value="__('Type')" />

                            <select wire:model="type_id"
                                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="type_id" id="type_id">
                                <option value="">Select one</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id')==$type->id?
                                    'selected': 'Select one'
                                    }}>{{ $type->type }}</option>
                                @endforeach
                            </select>

                            @error('type_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="thumbnail" :value="__('Thumbnail')" />

                            <x-input wire:model="thumbnail" id="thumbnail" class="block mt-1 w-full" type="file"
                                name="thumbnail" :value="old('thumbnail')" autofocus />

                            @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="tenant_contract" :value="__('Tenant Contract (Please only upload a PDF file.)')" />

                            <x-input wire:model="tenant_contract" id="tenant_contract" class="block mt-1 w-full" type="file"
                                name="tenant_contract" :value="old('tenant_contract')" autofocus />

                            @error('tenant_contract')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <x-label for="owner_contract" :value="__('Owner Contract (Please only upload a PDF file.)')" />

                            <x-input wire:model="owner_contract" id="owner_contract" class="block mt-1 w-full" type="file"
                                name="owner_contract" :value="old('owner_contract')" autofocus />

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
                                    Submit
                                </x-button>
                            </p>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>