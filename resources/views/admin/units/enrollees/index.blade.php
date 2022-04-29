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
                <x-th>Contract</x-th>
                <x-th>Contract</x-th>
            </tr>
        </thead>
        @forelse ($enrollees as $enrollee)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <a href="/owner/{{ $enrollee->owner_uuid }}">
                                <img class="h-10 w-10 rounded-full" src="/storage/{{ $enrollee->owner->photo_id }}"
                                    alt=""></a>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{
                                $enrollee->owner->owner }}
                            </div>

                        </div>
                    </div>
                </x-td>
                <x-td>
                    <div class="text-sm text-gray-900">{{
                        Carbon\Carbon::parse($enrollee->start)->format('M d, Y').' -
                        '.Carbon\Carbon::parse($enrollee->end)->format('M d, Y') }}
                    </div>
                    <div class="text-sm text-gray-500">{{
                        Carbon\Carbon::parse($enrollee->end)->diffForHumans($enrollee->start)
                        }}
                    </div>
                </x-td>
                <x-td>
                    {{ number_format($enrollee->rent, 2) }}
                </x-td>
                <x-td>
                    @if($enrollee->status === 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $enrollee->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $enrollee->status }}
                        </span>
                        @endif
                </x-td>

                <x-td>
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $enrollee->uuid }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="dropdownDivider.{{ $enrollee->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">

                            <li>
                                <a href="/contract/{{ $enrollee->uuid }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-file-contract"></i>&nbspShow
                                    Contract</a>
                            </li>

                            <li>
                                <a href="/contract/{{ $enrollee->uuid }}/transfer"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                    Contract</a>
                            </li>
                            <li>
                                <a href="/contract/{{ $enrollee->uuid }}/renew"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                    Contract</a>
                            </li>

                        </ul>
                        @if($enrollee->status == 'active')
                        <div class="py-1">
                            <a href="/contract/{{ $enrollee->uuid }}/moveout/bills"
                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspUnenroll</a>
                        </div>
                        @endif
                    </div>
                </x-td>
            </tr>
            @empty
            <tr>
                <span>No enrollment histories found!</span>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>