<x-new-layout>
    @section('title','Step 3 of Step 6 | Account Payables')
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
        {{-- stepper --}}
            

            {{-- start-step-3-form --}}
            <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
            
                <div class="md:grid md:grid-cols-6 md:gap-6">

                     {{-- material/service details --}}
                     <div class="sm:col-span-3">
                        <label for="service_details" class="block text-sm font-medium text-gray-700">Material/Service Details:</label>
                            <textarea id="service_details" name="service_details" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                    </div>

                    {{-- quantity --}}
                    <div class="sm:col-span-3">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                            <textarea id="quantity" name="quantity" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                    </div>


                    {{-- price --}}
                    <div class="sm:col-span-3">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                            <textarea id="price" name="price" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                    </div>


                    {{-- vendor details --}}
                    <div class="sm:col-span-3">
                        <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor Detail:</label>
                            <textarea id="vendor-details" name="vendor-details" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                    </div>

                    {{-- quotation picture --}}
                    <div class="sm:col-span-3">
                        <label for="quotation" class="block text-sm font-medium text-gray-700">Quotation</label>
                            <textarea id="quotation" name="quotation" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                    </div>

                    {{-- cancel, next button --}}
                    <div class="col-start-6 flex items-center justify-end">
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button type="submit" class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="accountspayables2">Next</a></button>
                    </div>

                </div>
            </form>
            {{-- end-step-3-form --}}
        </div>          
    </div>
</x-new-layout>
