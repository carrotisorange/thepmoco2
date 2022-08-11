<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <?php $ctr =1; ?>
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Unit</x-th>
            <x-th>Status</x-th>
            <x-th>Tenant</x-th>
            {{-- <x-th>Owner</x-th> --}}
            <x-th>Rent/mo</x-th>
            <x-th>Contract Period</x-th>
            <x-th></x-th>

        </tr>
    </thead>
    @forelse ($units as $index => $unit)
    <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <tr>
            <x-td>{{ $index }}</x-td>
            <x-td><a class="text-blue-600" href="/unit/{{ $unit->unit->uuid }}/contracts">{{
                    $unit->unit->building->building.' '.$unit->unit->unit }}</a>
            </x-td>
            <x-td>
                @if($unit->unit->status->status === 'occupied')
                <span title="occupied"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i> {{
                    $unit->unit->status->status }}
                </span>
                @elseif($unit->unit->status->status === 'reserved')
                <span title="reserved"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-clock"></i> {{ $unit->unit->status->status
                    }}
                </span>
                @else
                <span title="inactive"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                @endif
            </x-td>
            <x-td><a class="text-blue-600" href="/tenant/{{ $unit->tenant->uuid }}/contracts">{{
                    $unit->tenant->tenant }}</a>
                @if($unit->status === 'active')
                <span title="active"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                @elseif($unit->status === 'pending')
                <span title="pending"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-clock"></i>
                </span>
                @else
                <span title="inactive"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                @endif
            </x-td>
            <?php
                                                               $owner = App\Models\Enrollee::where('unit_uuid', $unit->unit->uuid)->pluck('owner_uuid')->first();              
                                                         
                                                            ?>
            {{-- <x-td>{{ App\Models\Owner::find($owner) }}</x-td> --}}
            <x-td>{{ number_format($unit->rent, 2) }}</x-td>
            <x-td>
                <div class="text-sm text-gray-900">{{
                    Carbon\Carbon::parse($unit->start)->format('M d, Y').' -
                    '.Carbon\Carbon::parse($unit->end)->format('M d, Y') }}
                </div>

                <div class="text-sm text-gray-500">{{
                    Carbon\Carbon::parse($unit->end)->diffInMonths($unit->start)
                    }} months
                </div>
            </x-td>
            <x-td>
                <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $unit->uuid }}"
                    type="button">Actions<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg></x-button>

                <div id="dropdownDivider.{{ $unit->uuid }}"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1" aria-labelledby="dropdownDividerButton">

                        <li>
                            <a href="/contract/{{ $unit->uuid }}/export"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                    class="fa-solid fa-file-contract"></i>&nbspExport
                            </a>
                        </li>

                        <li>
                            <a href="/contract/{{ $unit->uuid }}/transfer"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                    class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                            </a>
                        </li>
                        <li>
                            <a href="/contract/{{ $unit->uuid }}/renew"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                    class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                            </a>
                        </li>

                    </ul>
                    @if($unit->status == 'active')
                    <div class="py-1">
                        <a href="/contract/{{ $unit->uuid }}/moveout/bills"
                            class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                    </div>
                    @endif
                </div>
            </x-td>
            @empty
            <x-td>
                No data found!
            </x-td>
        </tr>
    </tbody>
    @endforelse
</table>