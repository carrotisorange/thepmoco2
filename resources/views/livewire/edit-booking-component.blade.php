<x-modal-component>
    <x-slot name="id">
            edit-booking-modal-{{$booking->uuid}}
    </x-slot>
    <h1 class="text-center font-medium">Edit Booking</h1>
    <div class="p-5">
<form wire:submmit.prevent="updateBooking">
    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="birthdate">Guest</x-label>
        <x-form-input type="text" readonly value="{{ $booking->guest->guest }}" />

    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="unit_uuid">Unit</x-label>
        <x-form-select wire:model="unit_uuid" class="">
            @foreach ($units as $unit)
            <option value="{{ $unit->uuid }}" {{ $unit->uuid === $unit_uuid?
                'selected': 'Select one' }}> {{ $unit->unit }}
            </option>
            @endforeach
        </x-form-select>

        @error('unit_uuid')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="price">Rent/night</x-label>
        <x-form-input type="number" id="price" wire:model="price" readonly />
        @error('price')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="movein_at">Check-in</x-label>
        <x-form-input type="date" wire:model="movein_at" />
        @error('movein_at')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="arrival_time">Expected Arrival time</x-label>
        <x-form-input type="time" wire:model="arrival_time" />
        @error('arrival_time')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="moveout_at">Check-out</x-label>
        <x-form-input type="date" wire:model="moveout_at" />
        @error('moveout_at')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="departure_time">Expected Departure time</x-label>
        <x-form-input type="time" wire:model="departure_time" />
        @error('departure_time')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="status">Status</x-label>
        <x-form-select wire:model="status" class="">
            <option value="">Select one</option>

            <option value="checked-in" {{ "checked-in"===$status? 'selected' : 'Select one' }}>
                checked-in
            </option>

            <option value="checked-out" {{ "checked-out"===$status? 'selected' : 'Select one' }}>
                checked-out
            </option>

            <option value="cancelled" {{ "cancelled"===$status? 'selected' : 'Select one' }}>
                cancelled
            </option>

            <option value="reserved" {{ "reserved"===$status? 'selected' : 'Select one' }}>
                reserved
            </option>

        </x-form-select>

        @error('status')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="no_of_guests">No of guests</x-label>
        <x-form-input type="number" wire:model="no_of_guests" min="0" />
        @error('no_of_guests')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="no_of_children">No of children</x-label>
        <x-form-input type="number" wire:model="no_of_children" min="0" />
        @error('no_of_children')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="no_of_senior_citizens">No of senior citizens</x-label>
        <x-form-input type="number" wire:model="no_of_senior_citizens" min="0" />
        @error('no_of_senior_citizens')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="no_of_pwd">No of companions</x-label>
        <x-form-input type="number" wire:model="no_of_companions" min="0" />
        @error('no_of_companions')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="no_of_pwd">No of pwd</x-label>
        <x-form-input type="number" wire:model="no_of_pwd" min="0" />
        @error('no_of_pwd')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="vehicle_details">Vehicle details</x-label>
        <x-form-input type="text" wire:model="vehicle_details" />
        @error('vehicle_details')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="plate_number">Plate number</x-label>
        <x-form-input type="text" wire:model="plate_number" />
        @error('plate_number')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="special_request">Special request</x-label>
        <x-form-input type="text" wire:model="special_request" />
        @error('special_request')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="flight_itinerary">Flight itinerary</x-label>
        <x-form-input type="text" wire:model="flight_itinerary" />
        @error('flight_itinerary')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-label class="text-sm" for="remarks">Remarks</x-label>
        <x-form-input type="text" wire:model="remarks" min="0" />
        @error('remarks')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-5 sm:mt-6">
        <x-button class="w-full" type="button" wire:click="updateBooking">
            Update
        </x-button>

    </div>
</form>
    </div>
</x-modal-component>

