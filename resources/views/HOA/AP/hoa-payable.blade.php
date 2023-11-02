<x-hoa-layout>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Accounts Payable</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <!-- view summary will show if view receipts is clicked -->
                <x-button wire:click="clearFilters"> View Receipts
                </x-button>

                <a href="" target="_blank"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    Export All
                </a>
                <a href="/property/{{ Session::get('property_uuid') }}/rfp/{{ 'purchase' }}/{{ Str::random(3) }}/store"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    New Request
                </a>



            </div>




        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter
                    by</label>
                <select id="small"
                    class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Daily</option>
                    <option value="">Quarterly</option>
                    <option value="">Annually</option>
                    <option value="">March</option>
                    <option value="">April</option>
                </select>
            </div>

            <div class="sm:col-span-3">
                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter by
                    Month</label>
                <select id="small"
                    class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Select Month</option>
                    <option value="">January</option>
                    <option value="">February</option>
                    <option value="">March</option>
                    <option value="">April</option>
                </select>
            </div>


        </div>

        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>
                                <x-th>#</x-th>
                                <x-th>REQUESTED ON</x-th>
                                <x-th>BATCH NO</x-th>
                                <x-th>REQUESTER</x-th>
                                <x-th>STATUS</x-th>
                                <x-th>HOUSE</x-th>
                                <x-th>PARTICULARS</x-th>
                                <x-th>AMOUNT</x-th>
                                <x-th></x-th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            <tr>

                                <x-td>1</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>House 1256</x-td>
                                <x-td>Electrical</x-td>
                                <x-td>15,000</x-td>
                                <x-td>
                                    <button type="button"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Export
                                    </button>
                                </x-td>


                            </tr>

                            <tr>

                                <x-td>2</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>House 1256</x-td>
                                <x-td>Electrical</x-td>
                                <x-td>15,000</x-td>
                                <x-td>
                                    <button type="button"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Export
                                    </button>
                                </x-td>


                            </tr>

                            <tr>

                                <x-td>3</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>House 1256</x-td>
                                <x-td>Electrical</x-td>
                                <x-td>15,000</x-td>
                                <x-td>
                                    <button type="button"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Export
                                    </button>
                                </x-td>


                            </tr>

                            <tr>

                                <x-td>4</x-td>
                                <x-td>September 21, 2023</x-td>
                                <x-td>432356</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>Released</x-td>
                                <x-td>House 1256</x-td>
                                <x-td>Electrical</x-td>
                                <x-td>15,000</x-td>
                                <x-td>
                                    <button type="button"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Export
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
