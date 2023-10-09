<x-house-owner-layout>
    @section('title','Election | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex-auto">

            </div>



    <!-- show this if there is no election  -->
    <div class="text-lg mt-10 text-center mb-10">
        <p>Notice: This Election allows Proxy Voting</p>
        <p>If you are not voting please fill out the proxy details below. Click proceed to voting if you are voting as yourself.</p>

    </div> 
        <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            <div class="lg:col-span-1 mt-2 ml-5">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-sm font-medium text-gray-900">Name of Proxy</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-sm font-medium text-gray-900">Contact Number</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-sm font-medium text-gray-900">Email Address</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
            </div>

            <div class="lg:col-span-1 mt-2 ml-5">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-sm font-medium text-gray-900">Valid ID</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
            </div>

        </div>

        <div class="flex justify-end mt-5">
        <button type="button" wire:click="create"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                        </button>
                    
                        <button type="button" wire:click="create"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Proceed to Voting
                        </button>
                    
                    </div>

    




</x-house-owner-layout>

