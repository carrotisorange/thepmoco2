<div class="mb-3 mt-5">
    <span>{{ Str::plural('Leasing Contract', $enrollees->count())}} ({{
        $enrollees->count()
        }})</span>
</div>
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

    <table class="min-w-full divide-y divide-gray-200">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Owner</x-th>
                <x-th>Contract Period</x-th>
                <x-th>Agreed Rent/mo</x-th>
                <x-th>Status</x-th>
               
                <x-th></x-th>
            </tr>
        </thead>
        @forelse ($enrollees as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <a href="/owner/{{ $item->owner_uuid }}">
                                <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->owner->photo_id }}"
                                    alt=""></a>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{
                                $item->owner->owner }}
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
                        Carbon\Carbon::parse($item->end)->diffForHumans($item->start)
                        }}
                    </div>
                </x-td>
                <x-td>
                    {{ number_format($item->rent, 2) }}
                </x-td>
                <x-td>
                    @if($item->status === 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $item->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $item->status }}
                        </span>
                        @endif
                </x-td>

                <x-td>
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="dropdownDivider.{{ $item->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">

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
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspUnenroll</a>
                        </div>
                        @endif
                    </div>
                </x-td>
                @empty
                <x-td>No data found!</x-td>
                @endforelse
            </tr>
        </tbody>
    </table>

</div>