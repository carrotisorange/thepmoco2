<x-modal-component>
    <x-slot name="id">
        create-concern-component
    </x-slot>
    <h1 class="text-center font-medium">Create Concern</h1>
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
            <x-label for="subject">Subject</x-label>
            <x-form-input type="text" id="subject" wire:model="subject" />
            <x-validation-error-component name='subject' />
        </div>

        <div class="mt-5 sm:mt-6">
            <x-label for="category_id">Category</x-label>
            <x-form-select id="category_id" name="category_id" wire:model="category_id">
                <option value="">Select one</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </x-form-select>
            <x-validation-error-component name='category_id' />
        </div>

        <div class="mt-5 sm:mt-6">
            <x-label for="concern">Details of the concern</x-label>
            <x-form-textarea id="concern" rows="4" wire:model="concern"></x-form-textarea>
            <x-validation-error-component name='concern' />
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
                            <a href="#/" wire:click="removeAttachment('image')">Remove the attachment
                            </a></span>
                        @endif
                    </label>
                </div>
                @error('image')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                @if ($image)
                <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
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
