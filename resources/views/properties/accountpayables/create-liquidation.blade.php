<x-new-layout>
    @section('title','Account Payables | '. $property->property)
<div class="mx-10">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-500">Liquidation Form</h1>
        </div>

        <div class="mt-8">
            <div class="max-full mx-auto sm:px-6">
                <button type="button" wire:click="" wire:loading.remove
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    Go back to Account Payables
                </button>
            </div>

        </div>

    </div>      

    <div>
        <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Name</label>
            <div class="mt-2 sm:col-start-3 sm:mt-0">
              <input id="name" name="name" type="name" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="department" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Department/Section</label>
            <div class="mt-2 sm:col-start-3 sm:mt-0">
              <input id="department" name="department" type="department" autocomplete="department" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="date-liquidation" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Date of Liquidation</label>
            <div class="mt-2 sm:col-start-3 sm:mt-0">
              <input id="date-liquidation" name="date-liquidation" type="date-liquidation" autocomplete="date-liquidation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="unit" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Unit</label>
            <div class="mt-2 sm:col-start-3 sm:mt-0">
              <input id="unit" name="unit" type="unit" autocomplete="unit" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="batch-no" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Batch #</label>
            <div class="mt-2 sm:col-start-3 sm:mt-0">
              <input id="batch-no" name="batch-no" type="batch-no" autocomplete="batch-no" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            </div>
          </div>
    </div>
          


    <div class="px-6 pt-5 flex justify-end items-center">
        <button type="button" wire:click="" wire:loading.remove
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
            New Item
        </button>

        <button type="button" wire:loading disabled
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
            Loading...
        </button>
    </div>
            
    <!-- table -->
    <div class="sm:col-span-8 ">
        <div class="mb-5 mt-2 relative overflow-x-auto ring-opacity-5 md:rounded-lg">
            <form class="mt-5 sm:pb-6 xl:pb-8">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-th>#</x-th>
                            <x-th>DATE</x-th>
                            <x-th>OR NUMBER </x-th>
                            <x-th>ITEM</x-th> 
                            <x-th>QUANTITY</x-th> 
                            <x-th>AMOUNT</x-th>
                            <x-th>TOTAL</x-th>
                            
                            <x-th></x-th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        <div wire:key="">
                            <tr>
                                <x-td></x-td>
                                <x-td>
                                     <input type="text" wire:model.debounce.500ms=""
                                        wire:keyup=""
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                   
                                    <p class="text-red-500 text-xs mt-2"></p>
                                </x-td>
                                <x-td>
                                     <input type="text" wire:model.debounce.500ms=""
                                        wire:keyup=""
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                   
                                    <p class="text-red-500 text-xs mt-2"></p>
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model.debounce.500ms=""
                                        wire:keyup=""
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                   
                                    <p class="text-red-500 text-xs mt-2"></p>
                                 
                                </x-td>
                                <x-td>
                                    <input type="number" step="0.001" min="1"
                                        wire:model.debounce.500ms=""
                                        wire:keyup=""
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                   
                                    <p class="text-red-500 text-xs mt-2"></p>
                                    
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model.debounce.500ms=""
                                        wire:keyup=""
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                  
                                    <p class="text-red-500 text-xs mt-2"></p>
                                
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model.debounce.500ms=""
                                        wire:keyup=""
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                   
                                    <p class="text-red-500 text-xs mt-2"></p>
                                </x-td>
                                <x-td>
                                    <button type="button" wire:click=""
                                        wire:loading.remove
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Remove
                                    </button>
                                    
                                    <button type="button" wire:loading disabled wire:target=""
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Loading...
                                    </button>
                                    @include('layouts.notifications')
                                </x-td>
                            </tr>
                        </div>
            
                    </tbody>
                </table>
            </form>

        </div>
    </div>

    <!-- /table -->

    <div>
        <div class="cols-start-3 mt-10 space-y-3 0 pb-3 sm:space-y-0 sm:divide-y sm:pb-0">
          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-3">
            <label for="name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Total</label>
            <div class="mt-2 sm:col-start-3 sm:mt-0">
              <input id="name" name="name" type="name" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="department" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Cash Advance</label>
            <input id="department" name="department" type="department" placeholder="CV NUMBER" autocomplete="department" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            <div class="mt-2 sm:col-start-3 sm:mt-0">
              <input id="department" name="department" type="department" autocomplete="department" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
            <label for="date-liquidation" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Total</label>
                <select name="return-refund" id="return-refund" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6">
                    <option value="select">Select</option>
                    <option value="refund">Refund</option>
                    <option value="return">Return</option>
                </select>
                          
                <div class="mt-2 sm:col-start-3 sm:mt-0">
                  <input id="date-liquidation" name="date-liquidation" type="date-liquidation" autocomplete="date-liquidation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                </div>
        </div>
    </div>

    <div>
        <p class="px-6 text-right">

            <button type="button" wire:click="" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                Save
            </button>

            <button type="button" wire:loading disabled wire:target=""
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                Loading...
            </button>
        </p>
    </div>

    <!-- approval section -->
    <div class="mt-5 p-5 border flex justify-between text-sm">
        <div>
            Prepared by:
            <input id="date-liquidation" name="date-liquidation" type="date-liquidation" autocomplete="date-liquidation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
        </div>

        <div>
            Noted by:
            <input id="date-liquidation" name="date-liquidation" type="date-liquidation" autocomplete="date-liquidation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
        </div>

        <div>
            Approved by:
            <input id="date-liquidation" name="date-liquidation" type="date-liquidation" autocomplete="date-liquidation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
        </div>


    </div>



    <!-- /approval section -->


</div>

</x-new-layout>