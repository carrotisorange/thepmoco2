<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

    <thead class="bg-gray-50">
        <tr>
            <x-th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

            </x-th>
            <x-th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                SPOUSE
            </x-th>
            <x-th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                EMAIL
            </x-th>
            <x-th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                MOBILE
            </x-th>

        </tr>
    </thead>

    @forelse ($spouses as $item)


   <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <x-td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{-- <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </x-td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <x-td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $item->spouse }}
            </x-td>
            <x-td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $item->email }}
            </x-td>
            <x-td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $item->mobile_number }}
            </x-td>




        </tr>

    </tbody>

    @empty
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <tr>
            <x-td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                No spouses found.
            </x-td>
        </tr>
    </tbody>

    @endforelse

</table>