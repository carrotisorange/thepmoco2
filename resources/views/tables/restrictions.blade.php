<table class="min-w-full table-fixed divide-y divide-gray-300">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                Features
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Create
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Read
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Update
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Delete
            </th>

        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
        @foreach ($features as $item)
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
            
                <div class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600">
                </div>

             
            </td>
          
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                {{ $item->feature }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <input type="checkbox" wire:model="is_{{ $item->alias }}_create_allowed"
                    class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">

            </td>
            @error('is_{{ $item->alias }}_create_allowed')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <input type="checkbox" wire:model="is_{{ $item->alias }}_read_allowed"
                    class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
            </td>
            @error('is_{{ $item->alias }}_read_allowed')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <input type="checkbox" wire:model="is_{{ $item->alias }}_update_allowed"
                    class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
            </td>
            @error('is_{{ $item->alias }}_update_allowed')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <input type="checkbox" wire:model="is_{{ $item->alias }}_delete_allowed"
                    class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
            </td>

            @error('is_{{ $item->alias }}_delete_allowed')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        </tr>

        @endforeach
    </tbody>
</table>