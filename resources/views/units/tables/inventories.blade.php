@if($inventories->count())
<div class="p-4">
    <button type="button" wire:loading.remove wire:click="redirectToTheCreateUnitInventoryPage"
        class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

        Update Inventory
    </button>
    <button type="button" wire:loading disabled
        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Loading...
    </button>
</div>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Item</x-th>

            <x-th>Quantity</x-th>
            <x-th>Remarks</x-th>
            <x-th>Added on</x-th>
            <x-th>Last Updated on</x-th>
        </tr>
    </thead>
    @foreach ($inventories as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $item->item }}</x-td>
            <x-td>{{ $item->quantity }}</x-td>
            <x-td>{{ $item->remarks }}</x-td>
            <x-td>{{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</x-td>
            <x-td>{{Carbon\Carbon::parse($item->updated_at)->format('M d, Y')}}</x-td>
        </tr>
    </tbody>
    @endforeach
</table>
@else
<div class="mt-10 text-center mb-10">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No inventories</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button" wire:loading.remove wire:click="redirectToTheCreateUnitInventoryPage"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <!-- Heroicon name: mini/plus -->
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path
                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Add your first inventory
        </button>
        <button type="button" wire:loading disabled
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Loading...
        </button>
    </div>
</div>
@endif