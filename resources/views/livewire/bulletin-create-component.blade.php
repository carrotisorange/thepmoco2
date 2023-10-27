<x-modal-component>
    <x-slot name="id">
        create-bulletin-modal
    </x-slot>
    <h1 class="text-center font-medium">Add Bulletin </h1>
    {{-- <form wire:submit.prevent="submitForm"> --}}
    <div class="p-5">
        <div class="mt-5 sm:mt-6">
            <x-label  for="title">Title </x-label>
            <x-form-input name="title" type="text" wire:model="title" />
            @error('title')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
            <x-label for="title">Description </x-label>
            <x-form-textarea name="description" wire:model="description" />
            @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
       <x-label >Attachment</x-label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
                <div class="flex text-sm text-gray-600">
                    <label for="attachment"
                        class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                        <span wire:loading.remove>Upload a file</span>
                        <span wire:loading>Loading...</span>
                        <input id="attachment" wire:model="attachment" type="file" class="sr-only">
                        <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                        @if($attachment)
                        <span class="text-red-500 text-xs mt-2">
                            <a href="#/" wire:click="removeAttachment()">Remove the attachment</a></span>
                        @endif

                    </label>

                </div>

                @error('attachment')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                @if ($attachment)
                <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                </p>
                @endif
            </div>
        </div>
        </div>


        <div class="mt-5 sm:mt-6">

            <x-button class="w-full" wire:click="submitForm">
                Confirm
            </x-button>

        </div>
    </div>
    {{-- </form> --}}
</x-modal-component>
