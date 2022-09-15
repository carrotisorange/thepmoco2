<x-new-layout>

    <div class="mt-5 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-700 mt-5">Concerns</h1>
                <h1 class="text-3xl font-bold text-gray-700 ">Reference #:</h1>
            </div>
        </div>

        <form class="space-y-6" action="#" method="POST">



            <div class=" px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-6 md:gap-6">


                    <div class="col-span-3 sm:col-span-2">
                        <label for="first-name" class="block text-sm font-medium text-gray-700">Date:</label>
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    <div class="col-span-3 sm:col-span-2">
                        <label for="last-name" class="block text-sm font-medium text-gray-700">Name of
                            Tenant</label>
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    <div class="col-span-3 sm:col-span-2">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">Unit
                            No.</label>
                        <input type="text" name="email-address" id="email-address" autocomplete="email"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="subject" class="block text-sm font-medium text-gray-700"> Subject
                            (required) </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input id="subject" name="subject" type="subject"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="concern" class="block text-sm font-medium text-gray-700">Category:
                        </label>

                        <select id="concern" name="concern"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                            <option>Billing</option>
                            <option>Payment</option>
                            <option>Contract</option>
                            <option>Maintenance</option>
                            <option>Housekeeping</option>
                            <option>Others</option>


                        </select>

                    </div>


                    <div class="sm:col-span-6">
                        <label for="concern" class="block text-sm font-medium text-gray-700"> Concern
                            (required)</label>
                        <div class="mt-1">
                            <textarea id="concern" name="concern" rows="3"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md"></textarea>
                        </div>

                    </div>



                    <div class="col-span-3 sm:col-span-2">
                        <fieldset>
                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Image
                                    Uploaded:
                                </label>
                                <div class="mt-1">

                                </div>

                            </div>
                        </fieldset>
                    </div>


                    <div class="col-span-3 sm:col-span-2">
                        <fieldset>
                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Course of action
                                    taken/Remarks:
                                </label>
                                <div class="mt-1">
                                    <textarea id="about" name="about" rows="3"
                                        class="h-16 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                        placeholder=""></textarea>
                                </div>

                            </div>
                        </fieldset>
                    </div>

                    <div class="col-span-3 sm:col-span-2">
                        <fieldset>
                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">Resolved by:
                                </label>
                                <div class="mt-1">
                                    <textarea id="about" name="about" rows="3"
                                        class="h-5 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                        placeholder=""></textarea>
                                </div>


                            </div>
                        </fieldset>
                        <div class="mt-2 grid grid-cols-1 gap-y-6  sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <div class=" pl-2" id="filter-section-0">
                                    <div class="">


                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-0" name="category[]" value="tees"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-0"
                                                class="ml-3 text-sm text-gray-500">Concern
                                                Closed</label>

                                        </div>


                                        <div class="flex items-center">
                                            <input id="filter-mobile-category-1" name="category[]" value="crewnecks"
                                                type="checkbox"
                                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-mobile-category-1"
                                                class="ml-3 text-sm text-gray-500">Concern
                                                Pending</label>

                                        </div>

                                    </div>
                                </div>
                            </div>




                        </div>

                    </div>



                </div>
            </div>
    </div>

    <div class="flex justify-end">
        <button type="button"
            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
        <button type="submit"
            class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Respond</button>
    </div>
</x-new-layout>