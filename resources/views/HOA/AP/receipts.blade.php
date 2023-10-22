<x-hoa-layout>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Accounts Payable</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <!-- view receipts will show if view summary is clicked -->
                <button type="button" wire:click="clearFilters"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    View Summary
                </button>

                <a href="/property/{{ Session::get('property_uuid') }}/accountpayable/{{ 'purchase' }}/{{ Str::random(3) }}/store"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    New Request
                </a>



            </div>

        </div>














        <div class="">
            <!-- Main modal -->
            <div id="default-modal" data-modal-show="false" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">

                <!-- Modal content -->
                <div class=" rounded-lg shadow relative">

                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div>
                            <img src="{{ asset('/brands/receipt-sample.jpg') }}" alt="election vector" class="w-full" />
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-toggle="default-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Cancel</button>
                        <button data-modal-toggle="default-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Export</button>
                        <button data-modal-toggle="default-modal" type="button"
                            class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update</button>

                    </div>
                </div>

            </div>

        </div>

        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>



        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>
                                <x-th>#</x-th>
                                <x-th>DATE UPLOADED</x-th>
                                <x-th>BATCH NO</x-th>
                                <x-th>REQUESTER</x-th>
                                <x-th>STATUS</x-th>
                                <x-th>PARTICULAR</x-th>
                                <x-th>AMOUNT</x-th>
                                <x-th>IMAGE</x-th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            <tr>

                                <x-td>1</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>Particular</x-td>
                                <x-td>1200</x-td>
                                <x-td>
                                    <button type="button" data-modal-toggle="default-modal"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">

                                        <img src="{{ asset('/brands/receipt-sample.jpg') }}" alt="election vector"
                                            class="w-36" />
                                    </button>

                                </x-td>



                            </tr>

                            <tr>

                                <x-td>1</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>Particular</x-td>
                                <x-td>1200</x-td>
                                <x-td>
                                    <button type="button" data-modal-toggle="default-modal"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">

                                        <img src="{{ asset('/brands/receipt-sample.jpg') }}" alt="election vector"
                                            class="w-36" />
                                    </button>

                                </x-td>



                            </tr>

                            <tr>

                                <x-td>1</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>Particular</x-td>
                                <x-td>1200</x-td>
                                <x-td>
                                    <button type="button" data-modal-toggle="default-modal"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">

                                        <img src="{{ asset('/brands/receipt-sample.jpg') }}" alt="election vector"
                                            class="w-36" />
                                    </button>

                                </x-td>



                            </tr>

                            <tr>

                                <x-td>1</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>Particular</x-td>
                                <x-td>1200</x-td>
                                <x-td>
                                    <button type="button" data-modal-toggle="default-modal"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">

                                        <img src="{{ asset('/brands/receipt-sample.jpg') }}" alt="election vector"
                                            class="w-36" />
                                    </button>

                                </x-td>



                            </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-hoa-layout>