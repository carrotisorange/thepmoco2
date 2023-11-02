<div>
    <form wire:submit.prevent='submitForm'>
        <div class="mt-5 space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="date_of_election">Date of Election</x-label>
                <x-form-input wire:model='date_of_election' type="date" name="date_of_election" />
               <x-validation-error-component name='date_of_election' />
            </div>


            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="time_limit">Time Limit (In hours)</x-label>
                <x-form-input wire:model="time_limit" type="number" min="1" name="time_limit" />
           <x-validation-error-component name='time_limit' />
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="number_of_months_behind_dues">Number of Months behind dues <span
                        class="font-light text-gray-300">requirement to be a voter</span></x-label></label>
                <x-form-input wire:model="number_of_months_behind_dues" type="number" min="1"
                    name="number_of_months_behind_dues" />
               <x-validation-error-component name='number_of_months_behind_dues' />
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="is_proxy_voting_allowed">Is Proxy Voting Allowed?</x-label>
                <x-form-select wire:model='is_proxy_voting_allowed' id="is_proxy_voting_allowed"
                    name="is_proxy_voting_allowed">
                    <option value="1">yes</option>
                    <option value="0">no</option>
                </x-form-select>
              <x-validation-error-component name='is_proxy_voting_allowed' />
            </div>

            <div class="lg:col-span-2 mt-2 ml-5">
                <x-label for="other_policies">Other Policies </x-label>
                <x-form-input wire:model="other_policies" name="text" name="other_policies" />
                    <x-validation-error-component name='other_policies' />
            </div>

        </div>

        <div class="flex justify-end mt-10">

            <x-button class="bg-red-500"
                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election'">
                Cancel
            </x-button>

            <x-button type="submit">
                Next
            </x-button>

        </div>
    </form>
</div>
