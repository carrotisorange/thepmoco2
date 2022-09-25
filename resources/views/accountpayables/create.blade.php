<x-new-layout>
    @section('title','Account Payables | '. Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">Request Account Payable</h1>
                </div>

                <button type="button" data-modal-toggle="create-particular-modal"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                    Particular</a></button>
            </div>

            <form class="space-y-6" action="#" method="POST">



                <div class=" px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-6 md:gap-6">




                        <div class="sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Request for:
                            </label>

                            <select id="concern" name="concern"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">

                                <option>Payment</option>
                                <option>Purchase</option>
                                <option>Fund Transfer</option>
                                <option>Refund</option>




                            </select>

                        </div>

                        <div class="sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Particular:</label>

                            <select id="concern" name="concern"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">

                                <option>Rent</option>
                                <option>Electricity</option>
                                <option>Water</option>
                                <option>Remittance</option>
                                <option>Salary</option>
                                <option>Wages</option>




                            </select>

                        </div>



                        <div class="sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Requester's
                                Name:</label>
                            <div class="mt-1">
                                <textarea id="concern" name="concern" rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                            </div>
                            <a href="newunits_detail" class="text-sm text-purple-700">Add Requester</a>
                        </div>


                        <div class="sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Pay to: (Biller's
                                Name)</label>
                            <div class="mt-1">
                                <textarea id="concern" name="concern" rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                            </div>

                            <a href="newunits_detail" class="text-sm text-purple-700">Add Biller</a>

                        </div>

                        <div class="sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Amount
                                Requested:</label>
                            <div class="mt-1">
                                <textarea id="concern" name="concern" rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                            </div>

                        </div>

                        <div class="sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Source of
                                Fund:</label>
                            <div class="mt-1">
                                <textarea id="concern" name="concern" rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                            </div>

                        </div>



                        <div class="sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700"> Upload Bills/Quotation </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">

                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>




                            </div>
                        </div>



                        <div class="mt-3 sm:col-span-6">
                            <input id="filter-mobile-category-0" name="category[]" value="tees" type="checkbox"
                                class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-category-0" class="ml-3 text-sm text-gray-500">Send email to
                                manager</label>
                        </div>


                    </div>
                    <div class="flex justify-end">
                        <button type="button"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button type="submit"
                            class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a
                                href="accountspayables2">Create</a></button>
                    </div>
            </form>
            @include('modals.create-particular-modal')
</x-new-layout>