<x-new-layout>


<div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8 overflow-x-auto">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">Liquidations</h1>
                </div>
              

                <button type="button"
                    class="ml-5 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"><a
                        href="">
                        Create Liquidation</a></button>
            </div>


<table class=" w-full mb-10 text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>BATCH NO</x-th>
            <x-th>DATE CREATED</x-th>
            <x-th>PREPARED BY</x-th>         
            <x-th>NAME</x-th>
            <x-th>DEPARTMENT/SECTION</x-th>
            <x-th>UNIT</x-th>
            <x-th>APPROVED BY</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      
        <tr>        
            <x-td>Value</x-td>  
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Approved</x-td>
            <x-th><button class="border bg-purple-500 text-sm text-white rounded-lg px-2 py-1">View</button></x-th>  
        </tr>    

        <tr>        
            <x-td>Value</x-td>  
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Value</x-td>
            <x-td>Pending</x-td>
            <x-th><button class="border bg-purple-500 text-sm text-white rounded-lg px-2 py-1">Edit</button></x-th> 
        </tr>    

    </tbody>
</table>

    </div>
</div>

</x-new-layout>