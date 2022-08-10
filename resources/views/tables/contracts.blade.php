<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <?php $ctr =1; ?>
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Tenant</x-th>
            <x-th>Unit</x-th>
            <x-th>Duration</x-th>
            <x-th>Rent/Mo</x-th>
            <x-th>Status</x-th>
            <x-th>Interaction</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @forelse ($contracts as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $ctr++ }}</x-td>
            <x-td>
                <div class="text-sm text-gray-900"><a class="text-blue-800 font-bold"
                        href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}">{{
                        $item->tenant->tenant }}</a>
                </div>

                <div class="text-sm text-gray-500">{{
                    $item->tenant->type}}
                </div>

            </x-td>
            <x-td>
                <div class="text-sm text-gray-900"><a class="text-blue-800 font-bold"
                        href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">{{
                        $item->unit->unit }}</a>
                </div>

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
            <x-td>

                <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/view'"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    View
                </button>

                <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                    type="button">Actions<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg></x-button>

                <div id="dropdownDivider.{{ $item->uuid }}"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1" aria-labelledby="dropdownDividerButton">

                        <li>
                            <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/export"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                    class="fa-solid fa-file-contract"></i>&nbspExport
                            </a>
                        </li>

                        <li>
                            <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/transfer"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                    class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                            </a>
                        </li>
                        <li>
                            <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                    class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                            </a>
                        </li>

                    </ul>
                    <?php
                                                                    $unpaid_bills = App\Models\Tenant::find($item->tenant_uuid)->bills->where('status', '!=', 'paid');
                                                                ?>
                    @if($item->status == 'active')
                    <div class="py-1">
                        @if($unpaid_bills->count()<=0) <a
                            href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                            class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                            @else
                            <a data-modal-toggle="popup-error-modal" href="#/"
                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                            @endif

                    </div>
                    @endif
                </div>
            </x-td>
            @empty
            <x-td>No data found!</x-td>
        </tr>
    </tbody>
    @endforelse
</table>