<div>

        <div class="mt-5 space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="date_of_election">Date of Election</x-label>
                <x-form-input type="date"
                    name="date_of_election" />
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="time_limit">Time Limit (In hours)</x-label>
                <x-form-input type="number" min="1" name="time_limit" />
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="number_of_months_behind_dues">Number of Months behind dues <span
                        class="font-light text-gray-300">requirement to be a voter</span></x-label></label>
                <x-form-input type="number" min="1"
                    name="number_of_months_behind_dues" />
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                <x-label for="is_proxy_voting_allowed">Is Proxy Voting Allowed?</x-label>
                <x-form-select id="is_proxy_voting_allowed" name="is_proxy_voting_allowed">
                    <option value="1" >yes</option>
                    <option value="0" >no</option>
                </x-form-select>
            </div>

            <div class="lg:col-span-2 mt-2 ml-5">
                <x-label for="other_policies">Other Policies </x-label>
                <x-form-input name="text" name="other_policies"  />
            </div>

        </div>

        <div class="flex justify-end mt-10">

            <x-button class="bg-red-500" onclick="window.location.href='{{ url()->previous() }}'">
                Cancel
            </x-button>

            <x-button type="submit" wire:click="create"> Next
            </x-button>

        </div>
</div>
