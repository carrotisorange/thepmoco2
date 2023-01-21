<main class="flex-1 pb-8 h-screen y-screen overflow-y-scroll">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            {{-- <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">Concerns</h1>
                    <a href="#"
                        class="flex justify-end text-sm font-medium text-purple-500 hover:text-purple-700">Change to
                        request</a>
                </div>
            </div> --}}

            <div>
                <div class="flex justify-center mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                    <div class="mt-5 md:mt-0 md:col-span-6">
                        <form action="#" method="POST">
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">

                                        <div class="sm:col-span-2">
                                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                                Subject (required) </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input id="subject" name="subject" type="subject"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="concern"
                                                class="block text-sm font-medium text-gray-700">Category: </label>

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
                                            <label for="concern" class="block text-sm font-medium text-gray-700">
                                                Concern (required)</label>
                                            <div class="mt-1">
                                                <textarea id="concern" name="concern" rows="3"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Please share your concern in detail.
                                            </p>
                                        </div>



                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700"> Upload an image
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                        fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="file-upload"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span>Upload a file</span>
                                                            <input id="file-upload" name="file-upload" type="file"
                                                                class="sr-only">
                                                        </label>
                                                       
                                                    </div>
                                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit
                                            Form</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

</main>