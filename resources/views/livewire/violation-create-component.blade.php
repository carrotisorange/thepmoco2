<x-modal-component>
    <x-slot name="id">
        violation-create-component
    </x-slot>
    <h1 class="text-center font-medium">Create Violation</h1>
    <form wire:submit.prevent="submit">
        <div class="p-5">
            <div class="mt-5 sm:mt-6">
                <x-label for="category_id">Unit</x-label>
                <x-form-select id="unit_uuid" name="unit_uuid" wire:model="unit_uuid">
                    <option value="">Select one</option>
                    @foreach ($units as $unit)
                    <option value="{{ $unit->uuid }}">{{ $unit->unit }}</option>
                    @endforeach

                </x-form-select>
                <x-validation-error-component name='unit_uuid' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="tenant_uuid">Tenant</x-label>
                <x-form-select id="tenant_uuid" name="tenant_uuid" wire:model="tenant_uuid">
                    <option value="">Select one</option>
                    @foreach ($tenants as $tenant)
                    <option value="{{ $tenant->tenant->uuid }}">{{ $tenant->tenant->tenant }}</option>
                    @endforeach

                </x-form-select>
                <x-validation-error-component name='unit_uuid' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="owner_uuid">Owner</x-label>
                <x-form-select id="owner_uuid" name="owner_uuid" wire:model="owner_uuid">
                    <option value="">Select one</option>
                    @foreach ($owners as $owner)
                    <option value="{{ $owner->owner->uuid }}">{{ $owner->owner->owner }}</option>
                    @endforeach

                </x-form-select>
                <x-validation-error-component name='owner_uuid' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="category_id">Type of Violation</x-label>
                <x-form-select id="type_id" name="type_id" wire:model="type_id">
                    <option value="">Select one</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </x-form-select>
                <x-validation-error-component name='category_id' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="violation">Violation</x-label>
                <x-form-input type="text" id="violation" wire:model="violation" />
                <x-validation-error-component name='violation' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="details">Details of the violation</x-label>
                <x-form-textarea id="details" rows="4" wire:model="details"></x-form-textarea>
                <x-validation-error-component name='details' />
            </div>

            <div class="mt-2 sm:col-span-3">
                <x-label>Image</x-label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <label for="image"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                <span wire:loading.remove>Upload a file</span>

                                <span wire:loading>Loading...</span>
                                <input id="image" wire:model="image" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($image)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment()">Remove the attachment
                                    </a></span>
                                @endif
                            </label>
                        </div>
                        @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($image)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i>
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </div>
        </div>
    </form>
</x-modal-component>
