
<x-hoa-layout>

<div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Homeowners</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
             
        
                <a href=""target="_blank"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    Export Masterlist
                </a>
         


            </div>

            


        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

        
        <div class="sm:col-span-3">

                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative w-full mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search" wire:model="search"
                            class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for name" required>

                    </div>

                </div>
            <div class="sm:col-span-3 -mt-2">
                <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                <select id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Filter by Status</option>
                </select>
            </div>

           

            
        </div>

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="mb-5 mt-2 relative overflow-hidden">

                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>Name</x-th>
                                        <x-th>Status</x-th>
                                        <x-th>House</x-th>
                                        <x-th>Contact No.</x-th>
                                        <x-th>Address</x-th>
                                        <x-th>Authorized Representative</x-th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                            
                                    <tr>
                                        
                                        <x-td>1</x-td>
                                        <x-td>Juan Dela Cruz</x-td>
                                        <x-td>Active</x-td>
                                        <x-td>House 234</x-td>
                                        <x-td>097645321</x-td>
                                        <x-td>Baguio City</x-td>
                                        <x-td>Lily Cruz</x-td>
                                    
                                    
                                    </tr>

                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
</div>
</x-hoa-layout>