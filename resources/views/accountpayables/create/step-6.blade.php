<x-new-layout>
    @section('title','Step 6 of Step 6 | Account Payables')
    <div class="mx-auto px-4 sm:px-6 lg:px-8 xl:px-20 xl:py-10">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
        {{-- stepper --}}
            

            {{-- start-step-6-form --}}
            <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
            
                <div class="md:grid md:grid-cols-6 md:gap-6">

                     {{-- material/service details --}}
                     <div class="sm:col-span-3">
                        <label for="service_details" class="block text-sm font-medium text-gray-700">Material/Service Details:</label>
                            <input type="text" id="service_details" name="service_details" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
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

                    {{-- quotation picture --}}
                    <div class="sm:col-span-3">
                        <label for="quotation" class="block text-sm font-medium text-gray-700">Quotation:</label>
                            <input type="text" id="quotation" name="quotation" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    {{-- quotation 1 --}}
                     <div class="sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Upload Payment </label>
                        
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <div class="flex text-sm text-gray-600">
                                        <label for="quotation_id" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                                <input id="quotation_id" name="image" type="file" class="sr-only" wire:model="quotation_id">
                                        </label>
                                    </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                       
                                </div>
                            </div>
                          
                    </div>

                    {{-- quotation 1 --}}
                     <div class="sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Upload Payment </label>
                        
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <div class="flex text-sm text-gray-600">
                                        <label for="quotation_id" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                                <input id="quotation_id" name="image" type="file" class="sr-only" wire:model="quotation_id">
                                        </label>
                                    </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                       
                                </div>
                            </div>
                            
                    </div>

                    {{-- done button --}}
                    <div class="col-start-6 flex items-center justify-end">
                        <button type="submit" class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="accountspayables2">Done</a></button>
                    </div>

                </div>
            </form>
            {{-- end-step-6-form --}}
        </div>          
    </div>
</x-new-layout>
