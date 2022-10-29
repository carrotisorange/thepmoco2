<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

            </x-th>
            <x-th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                NAME
            </x-th>
            <x-th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                RELATIONSHIP
            </x-th>
            <x-th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                MOBILE
            </x-th>
            <x-th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                EMAIL
            </x-th>
            <x-th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">

            </x-th>
        </tr>
    </thead>

    @foreach ($representatives as $representative)
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
                {{ $representative->representative }}
            </x-td>
            <x-td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $representative->relationship->relationship }}
            </x-td>
            <x-td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $representative->mobile_number }}
            </x-td>
            <x-td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $representative->email }}
            </x-td>
            <x-td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($representative->valid_id)
                <a href="{{ asset('/storage/'.$representative->valid_id) }}" target="_blank"
                    class="text-indigo-600 hover:text-indigo-900">View
                    Valid ID</a>
                @else
                Valid ID is not available
                @endif
            </x-td>
        </tr>

    </tbody>

    @endforeach

</table>