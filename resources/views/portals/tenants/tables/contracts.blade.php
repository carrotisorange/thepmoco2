<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>

            <x-th>
                #</x-th>
            <x-th>UNIT</x-th>
            <x-th>TENANT</x-th>
            <x-th>CATEGORY</x-th>
            <x-th>START </x-th>
            <x-th>END </x-th>
            <x-th>RENT/MO</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            {{-- <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                INTERACTION
                </x-th> --}}
                {{--
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">MOVEOUT
                REASON
                </x-th>
                <x-th>MOVEOUT DATE
                </x-th> --}}
                {{-- <x-th></x-th> --}}
                <x-th></x-th>
                <x-th></x-th>
                {{-- <x-th></x-th>
                <x-th></x-th>
                <x-th></x-th>
                <x-th></x-th> --}}
                {{-- <x-th></x-th> --}}

        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($contracts as $index => $item)
        <tr>

            <x-td>
                {{ $index+1 }}
            </x-td>
            <x-td>
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
            </x-td>
            <x-td>
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
            </x-td>
            <x-td>{{ $item->tenant->category }}</x-td>

            <x-td>
                {{Carbon\Carbon::parse($item->start)->format('M d, Y')}}</x-td>
            <x-td>{{Carbon\Carbon::parse($item->end)->format('M
                d, Y')}}</x-td>


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
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->interaction->interaction }}
                </x-td> --}}
                {{--
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->moveout_reason }}</x-td>
                <x-td>
                    @if($item->moveout_at)
                    {{ Carbon\Carbon::parse($item->moveout_at)->format('M d, Y') }}
                    @else
                    NA
                    @endif
                </x-td> --}}
                {{-- <x-td>
                    @if($item->contract)
                    <a href="{{ asset('/storage/'.$item->contract) }}" target="_blank"
                        class="text-indigo-500 text-decoration-line: underline">View
                        Contract</a>
                    @else
                    @can('admin')
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/edit"
                        class="text-indigo-500 text-decoration-line: underline">Attach a contract</a>
                    @endif
                    @endif
                </x-td> --}}
                <x-td>
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/edit"
                        class="text-indigo-500 text-decoration-line: underline">
                        Edit</a>
                </x-td>
                {{-- <x-td>
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/edit"
                        class="text-indigo-500 text-decoration-line: underline">Edit</a>


                </x-td> --}}
                <x-td>
                    @if($item->status != 'pendingmovein')
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                        class="text-indigo-500 text-decoration-line: underline">Renew</a>
                    @endif
                </x-td>
                <x-td>
                    @if($item->status != 'pendingmovein')
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/transfer"
                        class="text-indigo-500 text-decoration-line: underline">Transfer</a>
                    @endif
                </x-td>
                <x-td>
                    @if($item->status == 'active' || $item->status == 'pendingmovein')
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout/step-1"
                        class="text-indigo-500 text-decoration-line: underline">Moveout</a>
                    @elseif($item->status == 'reserved')
                    <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/movein/{{ Str::random(8) }}/create"
                        class="text-purple-500 text-decoration-line: underline">Movein</a>
                    @elseif($item->status == 'pendingmoveout')
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout/step-2"
                        class="text-indigo-500 text-decoration-line: underline">Moveout</a>
                    @elseif($item->status == 'cleared')
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout/step-3"
                        class="text-indigo-500 text-decoration-line: underline">Moveout</a>
                    @endif
                </x-td>
                <x-td>
                    @if($item->status == 'pendingmovein')
                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/bills"
                        class="text-indigo-500 text-decoration-line: underline">Pay Bills</a>
                    @endif

                </x-td>
                {{-- <x-td>
                    @if($item->unit->occupancy > $item->unit->contracts()->where('status',
                    'active')->count() && ($item->status != 'pendingmovein' && $item->status != 'pending'))
                    <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/tenant/{{ Str::random(8) }}/create"
                        class="text-indigo-500 text-decoration-line: underline">New</a>
                    @else

                    @endif

                </x-td> --}}





        </tr>

        @endforeach
    </tbody>
</table>

@include('modals.popup-error')