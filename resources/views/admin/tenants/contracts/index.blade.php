<div class="mb-3">
    <span class="text-center text-red">{{ Str::plural('Contract', $contracts->count())}}
        ({{ $contracts->count() }})</span>
</div>
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Unit</x-th>
                <x-th>Contract period</x-th>
                <x-th>Rent/mo</x-th>
                <x-th>Status</x-th>
                <x-th>Interactions</x-th>
                <x-th></x-th>
            </tr>
        </thead>
        @forelse ($contracts as $contract)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>{{ $contract->unit->unit }}</x-td>
                <x-td>{{$contract->unit->building->building}}</x-td>
                <x-td>
                    <div class="text-sm text-gray-900">{{
                        Carbon\Carbon::parse($contract->start)->format('M d, Y').' -
                        '.Carbon\Carbon::parse($contract->end)->format('M d, Y') }}
                    </div>
                    <div class="text-sm text-gray-500">{{
                        Carbon\Carbon::parse($contract->end)->diffInMonths($contract->start)
                        }}
                    </div>
                    @if($contract->end <= Carbon\Carbon::now()->addMonth())
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-300">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            expiring
                        </span>
                        @endif
                </x-td>
                <x-td>{{number_format($contract->rent, 2)}}</x-td>
                <x-td>
                    @if($contract->status === 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $contract->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-circle-xmark"></i> {{
                            $contract->status }}
                        </span>
                        @endif
                </x-td>
                <x-td>
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $contract->uuid }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="dropdownDivider.{{ $contract->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                            <li>
                                <a href="/contract/{{ $contract->uuid }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-file-contract"></i>&nbspShow
                                    Contract</a>
                            </li>
                            <li>
                                <a href="/unit/{{ $contract->unit_uuid }}"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-house"></i>&nbspShow
                                    Unit</a>
                            </li>

                            <li>
                                <a href="/contract/{{ $contract->uuid }}/transfer"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                    Contract</a>
                            </li>
                            <li>
                                <a href="/contract/{{ $contract->uuid }}/renew"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                    Contract</a>
                            </li>

                        </ul>
                        @if($contract->status === 'active')
                        <div class="py-1">
                            <a href="/contract/{{ $contract->uuid }}/moveout/bills"
                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                        </div>
                        @endif
                    </div>
                </x-td>

            </tr>
        </tbody>
        @empty
        <span class="text-center text-red">No contracts found!</span>
        @endforelse
    </table>
</div>