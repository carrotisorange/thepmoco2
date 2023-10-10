<x-modal-component>
    @include('layouts.notifications')
    <x-slot name="id">
        edit-booking-modal-{{$booking->uuid}}
    </x-slot>
         <h1 class="text-center font-medium">Edit Booking Information</h1>
        <div class="p-5">
            <form wire:submmit.prevent="updateBooking">
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="birthdate">Guest</label>
                    <input type="text" readonly value="{{ $booking->guest->guest }}"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>

                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="unit_uuid">Unit</label>
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
                    <label class="text-sm" for="price">Rent/night</label>
                    <input type="number" id="price" wire:model="price" readonly
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('price')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="movein_at">Check-in</label>
                    <input type="date" wire:model="movein_at"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('movein_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="arrival_time">Expected Arrival time</label>
                    <input type="time" wire:model="arrival_time"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('arrival_time')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="moveout_at">Check-out</label>
                    <input type="date" wire:model="moveout_at"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('moveout_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                 <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="departure_time">Expected Departure time</label>
                    <input type="time" wire:model="departure_time"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('departure_time')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="status">Status</label>
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
                    <label class="text-sm" for="no_of_guests">No of guests</label>
                    <input type="number" wire:model="no_of_guests" min="0"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('no_of_guests')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="no_of_children">No of children</label>
                    <input type="number" wire:model="no_of_children" min="0"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('no_of_children')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="no_of_senior_citizens">No of senior citizens</label>
                    <input type="number" wire:model="no_of_senior_citizens" min="0"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('no_of_senior_citizens')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="no_of_pwd">No of companions</label>
                    <input type="number" wire:model="no_of_companions" min="0"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('no_of_companions')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="no_of_pwd">No of pwd</label>
                    <input type="number" wire:model="no_of_pwd" min="0"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('no_of_pwd')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="vehicle_details">Vehicle details</label>
                    <input type="text" wire:model="vehicle_details"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('vehicle_details')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="plate_number">Plate number</label>
                    <input type="text" wire:model="plate_number"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('plate_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="special_request">Special request</label>
                    <input type="text" wire:model="special_request"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('special_request')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="flight_itinerary">Flight itinerary</label>
                    <input type="text" wire:model="flight_itinerary"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('flight_itinerary')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="remarks">Remarks</label>
                    <input type="number" wire:model="remarks" min="0"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
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
