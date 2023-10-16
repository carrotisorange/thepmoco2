<div>
    <form wire:submit.prevent='submitForm'>
    <div class="mt-5 space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
        <div class="lg:col-span-1 mt-2 ml-5">
            <x-label for="date_of_election">Date of Election</x-label>
            <x-form-input wire:model='date_of_election' type="date" />
            @error('date_of_election')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="lg:col-span-1 mt-2 ml-5">
            <x-label for="time_limit">Time Limit (In hours)</x-label>
            <x-form-input wire:model="time_limit" type="number" min="1"  />
            @error('time_limit')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="lg:col-span-1 mt-2 ml-5">
            <x-label for="number_of_months_behind_dues">Number of Months behind dues <span
                    class="font-light text-gray-300">requirement to be a voter</span></x-label></label>
            <x-form-input wire:model="number_of_months_behind_dues" type="number" min="1" />
            @error('number_of_months_behind_dues')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="lg:col-span-1 mt-2 ml-5">
            <x-label for="is_proxy_voting_allowed">Is Proxy Voting Allowed?</x-label>
            <x-form-select wire:model='is_proxy_voting_allowed' >
                <option value="1" {{ "1"===$status? 'selected' : 'Select one' }}>
                    Yes
                </option>
                <option value="0" {{ "0"===$status? 'selected' : 'Select one' }}>
                    No
                </option>
            </x-form-select>
            @error('is_proxy_voting_allowed')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="lg:col-span-2 mt-2 ml-5">
            <x-label for="other_policies">Other Policies </x-label>
            <x-form-input wire:model="other_policies" type="text" />
            @error('other_policies')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="flex justify-end mt-10">

        <x-button class="bg-red-500" onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election'">
            Cancel
        </x-button>

        <x-button type="submit">
            Next
        </x-button>

    </div>
    </form>
</div>
