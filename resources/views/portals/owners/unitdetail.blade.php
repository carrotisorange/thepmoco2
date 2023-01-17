<x-owner-portal-layout>
<div>

    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
    <h1 class="ml-20 text-3xl font-bold text-gray-900">Unit</h1> 
    <div class="sm:grid grid-col-1 lg:grid-cols-6 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-1 lg:col-span-5">
                <div class="flex justify-between">
                    
                    

                    

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-1 lg:row-start-1 ">
                <h2 class="sr-only">Images</h2>

                <div class="sm:grid grid-cols-1  lg:gap-6">
                    <img src="{{ asset('/brands/door_detail.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md">

                    


                </div>
            </div>

            <div class="mt-8 lg:col-span-4">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="unit-tab"
                                data-tabs-target="#unit" type="button" role="tab" aria-controls="unit"
                                aria-selected="false">Unit</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="tenant-tab" data-tabs-target="#tenant" type="button" role="tab" aria-controls="tenant"
                                aria-selected="false">Tenant</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="document-tab" data-tabs-target="#document" type="button" role="tab"
                                aria-controls="document" aria-selected="false">Document</button>
                        </li>

                    </ul>
                </div>
                <div id="myTabContent">

                        <div class="p-4 purple rounded-lg dark:bg-gray-800" id="unit" role="tabpanel"
                        aria-labelledby="unit-tab">
                        <div>

                        <div class="grid grid-cols-1 gap-y-3 gap-x-4 sm:grid-cols-8 mt-2">
                          <div class="sm:col-span-8 w-full">
                             
                            <p class="font-medium text-xl text-gray-900">Unit Information</p>
                          </div>
                            
                          <div class="sm:col-span-2">
                            <div class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                              <label for="name" class="block text-xs font-medium text-gray-900">Area</label>
                              <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="">
                            </div>
                          </div>

                          <div class="sm:col-span-2">
                            <div class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                              <label for="name" class="block text-xs font-medium text-gray-900">Rent Amount</label>
                              <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="">
                            </div>
                          </div>

                          <div class="sm:col-span-2">
                            <div class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                              <label for="name" class="block text-xs font-medium text-gray-900">Occupancy</label>
                              <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                   
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="tenant" role="tabpanel" aria-labelledby="tenant-tab">
                    <div>

                        <div class="grid grid-cols-1 gap-y-3 gap-x-4 sm:grid-cols-8 mt-2">
                          <div class="sm:col-span-8">
                             
                            <p class="font-medium text-xl text-gray-900">Tenants</p>
                          </div>
                            
                          <div class="sm:col-span-2">
                          <table class="divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr class="divide-x divide-gray-200">
                <th scope="col" class="py-3.5 pl-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Tenant #</th>
                <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Contract</th>
                
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr class="divide-x divide-gray-200">
                <td class="whitespace-nowrap p-4 text-sm font-medium text-gray-900 sm:pl-6">Tenant 01111</td>
                <td class="whitespace-nowrap p-4 text-sm text-gray-500">Date</td>
               

              <!-- More people... -->
            </tbody>
          </table>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="document" role="tabpanel"
                        aria-labelledby="document-tab">
                        <div>

                        <div class="grid grid-cols-1 gap-y-3 gap-x-4 sm:grid-cols-8 mt-2">
                          <div class="sm:col-span-8">
                            <div class="lg:-mt-1 lg:-mb-8 sm:mb-20 sm:mt-2 flex justify-end">
                              <button type="button" class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-400 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Upload</button>
                            </div> 
                            <p class="font-medium text-xl text-gray-900">Documents</p>
                          </div>
                            
                          <div class="sm:col-span-2">
                            <!-- attachment here -->
                            <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Document.pdf here">
                          </div>

                        </div>
                      </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

</div>
</x-owner-portal-layout>