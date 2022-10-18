 <table class="min-w-full divide-y divide-gray-300 text-sm text-left">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                #</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                TENANT</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                CONTRACT</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                RENT/MO</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                STATUS</th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Renew</span>
                                                <span class="sr-only">Moveout</span>
                                            </th>

                                        </tr>
                                        </thead>

                                        @foreach ($contracts as $index => $item)
                                        <tbody class="divide-y divide-gray-200 bg-white">

                                            <tr>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{$index + 1}}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <a class="text-blue-500 text-decoration-line: underline"
                                                        href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant->uuid }}">{{
                                                        $item->tenant->tenant }}</a>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <div class="text-sm text-gray-900">{{
                                                        Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                                                        '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                                                    </div>

                                                    <div class="text-sm text-gray-500">{{
                                                        Carbon\Carbon::parse($item->end)->diffInMonths($item->start)
                                                        }} months
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{number_format($item->rent, 2)}}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    @if($item->status === 'active')
                                                    <span
                                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <i class="fa-solid fa-circle-check"></i> {{ $item->status }}
                                                    </span>
                                                    @else

                                                    <span
                                                        class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                                    bg-orange-100 text-orange-800">
                                                        <i class="fa-solid fa-clock"></i> {{
                                                        $item->status }}
                                                    </span>
                                                    @endif
                                                    @if($item->end <= Carbon\Carbon::now()->addMonth() && $item->status
                                                        == 'active')
                                                        <span
                                                            class="px-2 text-sm leading-5 font-semibold rounded-full
                                                            bg-orange-100 text-orange-800">
                                                            <i class="fa-solid fa-clock"></i> expiring
                                                        </span>
                                                        @endif
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                                                        class="text-blue-500 text-decoration-line: underline">Renew</a>
                                                </td>

                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    @if($item->status == 'active' || $item->status=='pendingmovein')
                                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                                                        class="text-blue-500 text-decoration-line: underline">Moveout</a>
                                                    @endif
                                                </td>



                                            </tr>

                                        </tbody>
                                        @endforeach

                                    </table>
{{-- <table class="min-w-full divide-y divide-gray-300">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Tenant</x-th>
            <x-th>Unit</x-th>
            <x-th>Duration</x-th>
            <x-th>Rent/Mo</x-th>
            <x-th>Status</x-th>
            <x-th>Interaction</x-th>
            <x-th>Moveout Reason</x-th>
            <x-th></x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @forelse ($contracts as $item)
    <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <tr>
            <x-td>
                <div class="text-sm text-gray-900">
                    @if(auth()->user()->role_id == '8')
                    {{ $item->tenant->tenant }}
                    @else
                    <a class="text-blue-800 font-bold"
                        href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}">
                        {{ $item->tenant->tenant }}
                    </a>
                    @endif

                </div>

                <div class="text-sm text-gray-500">{{
                    $item->tenant->type}}
                </div>

            </x-td>
            <x-td>
                @if(auth()->user()->role_id == '8')
                {{ $item->unit->unit }}
                @else
                <div class="text-sm text-gray-900">
                    <a class="text-blue-800 font-bold"
                        href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">
                        {{ $item->unit->unit }}
                    </a>
                </div>
                @endif

                <div class="text-sm text-gray-500">{{
                    $item->unit->building->building}}
                </div>

            </x-td>
            <x-td>
                <div class="text-sm text-gray-900">{{
                    Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                    '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                </div>

                <div class="text-sm text-gray-500">{{
                    Carbon\Carbon::parse($item->end)->diffInMonths($item->start)
                    }} months
                </div>

            </x-td>
            <x-td>{{number_format($item->rent, 2)}}</x-td>
            <x-td>
                @if($item->status === 'active')
                <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i> {{ $item->status }}
                </span>
                @else

                <span class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-clock"></i> {{
                    $item->status }}
                </span>
                @endif
                @if($item->end <= Carbon\Carbon::now()->addMonth() && $item->status
                    == 'active')
                    <span
                        class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                                        bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-clock"></i> expiring
                    </span>
                    @endif
            </x-td>
            <x-td>{{ $item->interaction->interaction }}</x-td>
            <x-td>{{ $item->moveout_reason }}</x-td>
            <x-td>
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                    class="text-indigo-600 hover:text-indigo-900">Renew</a>
            </x-td>
            <x-td>
                @if($item->status == 'active')
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                    class="text-indigo-600 hover:text-indigo-900">Moveout</a>
                @endif

            </x-td>
            @empty
            <x-td>No data found.</x-td>
        </tr>
        @endforelse
    </tbody>
</table> --}}

@include('modals.popup-error-modal')