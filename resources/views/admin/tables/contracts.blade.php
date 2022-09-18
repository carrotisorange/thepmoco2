<table class="min-w-full divide-y divide-gray-300">


    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                Name
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Unit
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Status</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Moveout</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Renew</span>
                <span class="sr-only">Moveout</span>
            </th>
        </tr>
    </thead>


    @forelse ($expiring_contracts->get() as $item)
    <tbody class="divide-y divide-gray-200 bg-white">

        <tr>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">

                <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">
                        <img src="{{ asset('/brands/user.png') }}" alt="building"
                            class="w-40 object-center object-cover lg:w-full lg:h-full">
                    </div>

                    <div class="ml-4">
                        <div class="font-medium text-gray-900">
                            {{ $item->tenant->tenant }}
                        </div>
                        <div class="text-gray-500">
                            {{ $item->tenant->email }}
                        </div>
                    </div>
                </div>
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="text-gray-900">{{ $item->unit->unit }}</div>
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($item->status == 'active')
                <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{ $item->status }}</span>
                @else
                <span class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">{{ $item->status }}</span>
                @endif
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($item->end)->format('M d, Y') }}
            </td>

            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                    class="text-indigo-600 hover:text-indigo-900">Moveout<span class="sr-only">, Lindsay
                        Walton</span></a>
            </td>

            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                    class="text-indigo-600 hover:text-indigo-900">Renew<span class="sr-only">, Lindsay
                        Walton</span></a>
            </td>
        </tr>
        @empty
        <tr>
            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                No data found!
            </td>
        </tr>
    </tbody>
    @endforelse

</table>