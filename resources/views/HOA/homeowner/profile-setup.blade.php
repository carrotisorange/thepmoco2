
<x-house-owner-layout>
    @section('title','Welcome | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">


        <div class="sm:flex-auto">
                <h1 class="text-3xl  text-gray-500 text-center">Set Up your Profile</h1>
            </div>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
 
                            <div class="lg:col-span-1 mt-2">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-base font-medium text-gray-900">Name</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
                            </div>
                            <div class="lg:col-span-1 mt-2">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-base font-medium text-gray-900">Address</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
                            </div>
                            <div class="lg:col-span-1 mt-2">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-base font-medium text-gray-900">Email Address</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
                            </div>
                            <div class="lg:col-span-1 mt-2">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-base font-medium text-gray-900">Mobile Number</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
                            </div>
                            <div class="lg:col-span-1 mt-2">
                                <div
                                    class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                    <label for="floor_id" class="block text-base font-medium text-gray-900">Gender</label>
                                        <input
                                            class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                        </input>
                                </div>           
                            </div>
                            <div class="lg:col-span-1 mt-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="floor_id" class="block text-base font-medium text-gray-900">Profile Picture</label>
                                        <div class="flex text-base text-gray-600">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="file-upload" type="file" wire:model="contract" class="sr-only">
                                                </label>
                                            </div>
                                    </div>           
                            </div>
                        </div>

                        <div class="flex justify-end mt-5">
                                <a class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                href="{{ url()->previous() }}">
                                Do this Later
                                </a>
                            
                                <button type="button" wire:click="create"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                                </button>
                            
                            </div>

                            

</x-house-owner-layout>