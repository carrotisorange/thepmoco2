<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                #</th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">TENANT</th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">BUILDING
            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">UNIT</th>

            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">DURATION
            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">RENT/MO</th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">STATUS</th>
            {{-- <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">INTERACTION
            </th> --}}
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">MOVEOUT REASON
            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">MOVEOUT DATE
            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900"></th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900"></th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900"></th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900"></th>
        </tr>
    </thead>
    @forelse ($contracts as $index => $item)
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{-- <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                {{ $index+1 }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="text-sm text-gray-900">
                    @if(auth()->user()->role_id == '8')
                    {{ $item->tenant->tenant }}
                    @else
                    <a class="text-blue-500 text-decoration-line: underline"
                        href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}">
                        {{ $item->tenant->tenant }}
                    </a>
                    @endif
                </div>
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $item->unit->building->building }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if(auth()->user()->role_id == '8')
                {{ $item->unit->unit }}
                @else
                <div class="text-sm text-gray-900">
                    <a class="text-blue-500 text-decoration-line: underline"
                        href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">
                        {{ $item->unit->unit }}
                    </a>

                </div>
                @endif
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
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{number_format($item->rent, 2)}}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
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
            </td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->interaction->interaction }}</td> --}}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->moveout_reason }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($item->moveout_at)
{{ Carbon\Carbon::parse($item->moveou_at)->format('M d, Y') }}
                @else
                NA
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($item->contract)
                <a href="{{ asset('/storage/'.$item->contract) }}" target="_blank"
                    class="text-indigo-600 hover:text-indigo-900">View Contract</a>
                @else
                @can('admin')
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/edit"
                    class="text-indigo-600 hover:text-indigo-900">Attach a contract</a>
                @endif
                @endif

            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                    class="text-indigo-600 hover:text-indigo-900">Renew</a>
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/transfer"
                    class="text-indigo-600 hover:text-indigo-900">Transfer</a>
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($item->status == 'active' || $item->status == 'pendingmovein' || $item->status == 'pendingmoveout')
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                    class="text-indigo-600 hover:text-indigo-900">Moveout</a>
                @endif

            </td>



        </tr>
        @empty
        <tr>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">No data found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@include('modals.popup-error-modal')