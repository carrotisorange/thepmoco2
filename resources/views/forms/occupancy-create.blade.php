<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="mt-3 col-span-4">

                    <div class="form-check">

                        <input wire:model="is_the_unit_for_rent_to_tenant"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="{{ old('is_the_unit_for_rent_to_tenant'), $is_the_unit_for_rent_to_tenant }}"
                            id="flexCheckChecked">
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                            Is the unit for rent to tenant?
                        </label>
                        <p class="mt-1 text-sm text-gray-500">If checked, the admin is going to allow tenants to rent out to the unit.</p>

                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">
            <button type="submit"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

               
                Finish
            </button>
        </div>
    </div>




</form>