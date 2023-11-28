<x-modal-component>
    <x-slot name="id">
        export-remittance-modal
    </x-slot>
    <h1 class="text-center font-medium">Export Remittances</h1>
    <div class="p-5">
        <form wire:submit.prevent="exportRemittance">
            <div class="mt-5 sm:mt-6">
                <x-label for="">Choose the columns that you wish to export with.</x-label>

                <fieldset class="border-b border-t mt-5 border-gray-200">
                    <legend class="sr-only">Notifications</legend>
                    <div class="divide-y divide-gray-200">

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="bank_transfer_fee" class="font-medium text-gray-900">Bank Transfer Fee</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="bank_transfer_fee" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="miscellaneous_fee" class="font-medium text-gray-900">Miscellaneous Fee</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input  wire:model="miscellaneous_fee"
                                    type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="membership_fee" class="font-medium text-gray-900">Membership Fee</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="membership_fee" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="condo_dues" class="font-medium text-gray-900">Condo Dues</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="condo_dues" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="parking_dues" class="font-medium text-gray-900">Parking Dues</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="parking_dues" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="water" class="font-medium text-gray-900">Water</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="water" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="electricity" class="font-medium text-gray-900">Electric</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="electricity" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="generator_share" class="font-medium text-gray-900">Generator Share</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="generator_share" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="surcharges" class="font-medium text-gray-900">Surcharges</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="surcharges" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="building_insurance" class="font-medium text-gray-900">Building Insurance</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="building_insurance" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="real_property_tax" class="font-medium text-gray-900">Real Property Tax</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="real_property_tax" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="housekeeping_fee" class="font-medium text-gray-900">Housekeeping Fee</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="housekeeping_fee" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="laundry_fee" class="font-medium text-gray-900">Laundry Fee</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="laundry_fee" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="complimentary" class="font-medium text-gray-900">Complimentary</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="complimentary" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="internet" class="font-medium text-gray-900">Internet</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="internet" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="special_assessment" class="font-medium text-gray-900">Special Assessment</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="special_assessment" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="materials_recovery_facility" class="font-medium text-gray-900">Materials Recovery Facility</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="materials_recovery_facility" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="recharge_of_fire_extinguisher" class="font-medium text-gray-900">Recharge of Fire Extinguisher</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="recharge_of_fire_extinguisher" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="environmental_fee" class="font-medium text-gray-900">Environmental Fee</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="environmental_fee" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="bladder_tank" class="font-medium text-gray-900">Bladder Tank</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="bladder_tank" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>

                        <div class="relative flex items-start pb-4 pt-3.5">
                            <div class="min-w-0 flex-1 text-sm leading-6">
                                <label for="cause_of_magnet" class="font-medium text-gray-900">Cause of Magnet</label>
                                {{-- <p id="comments-description" class="text-gray-500">Get notified when someones posts a comment on a
                                    posting.</p> --}}
                            </div>
                            <div class="ml-3 flex h-6 items-center">
                                <input wire:model="cause_of_magnet" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                        </div>


                    </div>
                </fieldset>
            </div>

            <div class="mt-5 sm:mt-6">
                 <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </div>
        </form>
    </div>
</x-modal-component>
