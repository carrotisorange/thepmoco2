@if($banks->count())
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Account Name</x-th>
            <x-th>Bank</x-th>
            <x-th>Account Number</x-th>
        </tr>
    </thead>
    @foreach ($banks as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $item->account_name }}</x-td>
            <x-td>{{ $item->bank_name }}</x-td>
            <x-td>{{ $item->account_number }}</x-td>
        </tr>
    </tbody>
    @endforeach
</table>
@else
<div class=" mt-10 text-center mb-10 ">
   <i class="fa-solid fa-circle-plus"></i>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No banks</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/bank/create'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

            New bank
        </button>
    </div>
</div>
@endif
