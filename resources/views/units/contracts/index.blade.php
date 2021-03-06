<x-index-layout>
    @section('title', '| Contracts')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Contracts</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back to unit </x-button>
    </x-slot>

    <table class="min-w-full divide-y divide-gray-200">

        <thead class="bg-gray-50">
            <tr>
           
                <x-th>Tenant</x-th>
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
             
                <x-td>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->tenant->photo_id }}">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900"><b>{{
                                    $item->tenant->tenant }}</b>
                            </div>
                            <div class="text-sm text-gray-500">{{
                                $item->tenant->type
                                }}
                            </div>
                        </div>
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
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-circle-xmark"></i> {{
                        $item->status }}
                    </span>
                    @endif
                    @if($item->end <= Carbon\Carbon::now()->addMonth())
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-circle-xmark"></i> expiring
                        </span>
                        @endif
                </x-td>
                <x-td>{{ $item->interaction->interaction }}</x-td>
                <x-td>
                    <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions<svg class="ml-2 w-4 h-4"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></x-button>

                    <div id="dropdownDivider.{{ $item->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                            <li>
                                <a href="/tenant/{{ $item->tenant->uuid }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-user"></i>&nbspShow
                                    Tenant</a>
                            </li>
                            <li>
                                <a href="/contract/{{ $item->uuid }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-file-contract"></i>&nbspShow
                                    Contract</a>
                            </li>

                            <li>
                                <a href="/contract/{{ $item->uuid }}/transfer"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                    Contract</a>
                            </li>
                            <li>
                                <a href="/contract/{{ $item->uuid }}/renew"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                    Contract</a>
                            </li>

                        </ul>
                        @if($item->status == 'active')
                        <div class="py-1">
                            <a href="/contract/{{ $item->uuid }}/moveout/bills"
                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
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

</x-index-layout>