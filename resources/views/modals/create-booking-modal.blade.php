<x-modal-component>
    <x-slot name="id">
        create-booking-modal
    </x-slot>
<h1 class="text-center font-medium">Create Booking</h1>
  <div class="p-5">
    <form wire:submit.prevent="storeBooking">
        <div class="mt-5 sm:mt-6">
            <x-label for="unit_uuid">Unit</x-label>
            <x-form-select id="unit_uuid" name="unit_uuid" wire:model="unit_uuid" class="">
                <option value="">Select one</option>
                @foreach ($units as $unit)
                <option value="{{ $unit->uuid }}" {{ $unit->uuid === $unit_uuid? 'selected': 'Select one' }}>
                    {{ $unit->unit }}
                </option>
                @endforeach
            </x-form-select>
            <x-validation-error-component name='unit_uuid' />
        </div>

        <div class="mt-5 sm:mt-6">
            <x-label for="birthdate">Rent/night</x-label>
            <x-form-input type="number" id="price" wire:model="price" readonly />
            <x-validation-error-component name='price' />
        </div>

        <div class="mt-5 sm:mt-6">
            <x-label for="birthdate">Check-in</x-label>
            <x-form-input type="date" id="movein_at" wire:model="movein_at" />
            <x-validation-error-component name='movein_at' />
        </div>

        <div class="mt-5 sm:mt-6">
            <x-label for="birthdate">Check-out</x-label>
            <x-form-input type="date" id="moveout_at" wire:model="moveout_at" />
            <x-validation-error-component name='moveout_at' />
        </div>

        <div class="mt-5 sm:mt-6">
            <x-button class="w-full" type="submit" wire:click="storeBooking">
                Confirm
            </x-button>
        </div>
    </form>
  </div>
</x-modal-component>
