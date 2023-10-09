<?php
    $formDivClasses = '';
;?>

<form method="POST" wire:submit.prevent="updateGuest()" class="w-full" enctype="multipart/form-data">
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">

        <div class="sm:col-span-8">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="guest"> Guest </x-label>
                <x-form-input name="guest" type="text" wire:model="guest" />
                @error('guest')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-4">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="job-title">Email</x-label>
                <x-form-input type="email" wire:model="email" />
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="sm:col-span-4">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="mobile_number">Mobile No</x-label>
                <x-form-input type="text" wire:model="mobile_number" />
                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

    </div>
    <div class="mt-5 flex justify-end">
      
        <x-button type="submit" wire:target="updateGuest">
            Update
        </x-button>

    </div>
</form>
