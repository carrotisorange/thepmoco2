<x-new-layout>
    @section('title','Step 2 of Step 6 | Account Payables')
    <div class="mx-auto px-4 sm:px-6 lg:px-8 xl:px-20 xl:py-10">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
        {{-- stepper --}}
            

            {{-- start-step-2-form --}}
            <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
            
                <div class="md:grid md:grid-cols-6 md:gap-6">

                     {{-- quotation 1 --}}
                     <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700"> Upload Bills/Quotation </label>
                        
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
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700"> Upload Bills/Quotation </label>
                        
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

                    {{-- quotation 1--}}
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700"> Upload Bills/Quotation </label>
                        
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

                    {{-- cancel, next button --}}
                    <div class="col-start-6 flex items-center justify-end">
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button type="submit" class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="accountspayables2">Next</a></button>
                    </div>

                </div>
            </form>
            {{-- end-step-2-form --}}
        </div>          
    </div>
</x-new-layout>

