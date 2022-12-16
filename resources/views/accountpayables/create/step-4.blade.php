<x-new-layout>
    @section('title','Step 4 of Step 6 | Account Payables')
    <div class="mx-auto px-4 sm:px-6 lg:px-8 xl:px-20 xl:py-10">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
        {{-- stepper --}}
            

            {{-- start-step-1-form --}}
            <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
            
                <div class="md:grid md:grid-cols-6 md:gap-6">

                     {{-- request for purchase --}}
                    <div class="sm:col-span-3">
                        <label for="request" class="block text-sm font-medium text-gray-700">Request for: </label>
                            <select id="purchase" name="purchase" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                <option value="">Purchase</option>
                            </select>
                    </div>

                    {{-- creation date --}}
                    <div class="sm:col-span-3">
                        <label for="creation-date" class="block text-sm font-medium text-gray-700">Creation Date:</label>
                            <input type="text" id="creation-date" name="creation-date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    </div>

                    {{-- particular --}}
                    <div class="sm:col-span-3">
                        <label for="particular" class="block text-sm font-medium text-gray-700">Particular:</label>
                            <select id="particular" name="particular" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                <option value="">Rent</option>
                                <option value="">Rent</option>
                                <option value="">Rent</option>
                                <option value="">Rent</option>
                            </select>
                    </div>

                    {{-- requester's name --}}
                    <div class="sm:col-span-3">
                        <label for="requester" class="block text-sm font-medium text-gray-700">Requester's Name:</label>
                            <input type="text" id="requester" name="requester" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    {{-- quantity --}}
                    <div class="sm:col-span-3">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                            <input type="text" id="quantity" name="quantity" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    </div>


                    {{-- price --}}
                    <div class="sm:col-span-3">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                            <input type="text" id="price" name="price" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    </div>


                    {{-- vendor details --}}
                    <div class="sm:col-span-3">
                        <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor Details:</label>
                            <input type="text" id="vendor-details" name="vendor-details" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    {{-- delivery date --}}
                    <div class="sm:col-span-3">
                        <label for="delivery-date" class="block text-sm font-medium text-gray-700">Delivery Date:</label>
                            <input type="text" id="delivery-date" name="delivery-date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    </div>

                    {{-- cancel & next button --}}
                    <div class="col-start-6 flex items-center justify-end">
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button type="submit" class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="accountspayables2">Next</a></button>
                    </div>
                </div>
            </form>
            {{-- end-step-4-form --}}
        </div>          
    </div>
</x-new-layout>