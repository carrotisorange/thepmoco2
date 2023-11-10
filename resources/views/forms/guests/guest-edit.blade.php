

<form wire:submit.prevent="updateGuest" class="w-full">
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">
        <div class="sm:col-span-8">
            <x-label for="guest"> Guest </x-label>
            <x-form-input name="guest" type="text" wire:model="guest" />
            <x-validation-error-component name='guest' />
        </div>
        <div class="sm:col-span-4">
            <x-label for="job-title">Email</x-label>
            <x-form-input type="email" wire:model="email" />
            <x-validation-error-component name='email' />
        </div>
        <div class="sm:col-span-4">
            <x-label for="mobile_number">Mobile No</x-label>
            <x-form-input type="text" wire:model="mobile_number" />
            <x-validation-error-component name='mobile_number' />
        </div>
    </div>
    <div class="mt-5 flex justify-end">
        <x-button type="submit">
            Update
        </x-button>
    </div>
</form>
