<x-index-layout>
    @section('title', '| '.$owner->owner)
    <x-slot name="labels">
        Management Agreements
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/owner/{{ $owner->uuid }}/edit'"><i
                class="fa-solid fa-circle-arrow-left"></i>&nbsp
            Back
        </x-button>
    </x-slot>

    <table class="min-w-full divide-y divide-gray-200">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Unit</x-th>
                <x-th>Contract period</x-th>
                <x-th>Agreed rent/mo</x-th>
                <x-th>Status</x-th>
                <x-th></x-th>
            </tr>
        </thead>
        @forelse ($enrollees as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>
                    <div class="text-sm text-gray-900">{{
                        $item->unit->unit}}
                    </div>
                    <div class="text-sm text-gray-500">{{
                        $item->unit->building->building}}
                    </div>
                </x-td>

                <x-td>
                    <div class="text-sm text-gray-900">
                        {{
                        Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                        '.Carbon\Carbon::parse($item->end)->format('M d, Y')
                        }}
                        @if($item->end <= Carbon\Carbon::now()->addMonth())
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
                    </div>
                    <div class="text-sm text-gray-500">{{
                        Carbon\Carbon::parse($item->end)->diffForHumans($item->start)
                        }}
                    </div>
                </x-td>
                <x-td>{{ number_format($item->rent, 2) }}</x-td>
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
                    <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </x-button>

                    <div id="dropdownDivider.{{ $item->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                            <li>
                                <a href="/leasing/{{ $item->uuid }}/extend"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-rotate-right"></i>&nbspExtend
                                </a>
                            </li>
                        </ul>
                        @if($item->status == 'active')
                        <div class="py-1">
                            <a href="#/" data-modal-toggle="pullout-unit-modal.{{ $item->uuid }}"
                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspPull
                                out</a>
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
    @if($enrollees->count())
    @include('utilities.pullout-unit-modal')
    @endif
</x-index-layout>