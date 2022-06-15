<x-index-layout>
    @section('title', $owner->owner)
    <x-slot name="labels">
        {{ $owner->owner }} / Units
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/owner/{{ $owner->uuid }}/edit'">Go back to owner
        </x-button>
    </x-slot>

    <div class="bg-white border-b border-gray-200">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="text-sm min-w-full divide-y divide-gray-200">
                                <?php $ctr =1; ?>
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>Unit</x-th>
                                        <x-th>Date of turnover</x-th>
                                        <x-th>Price</x-th>
                                        <x-th>Classification</x-th>
                                        <x-th>Status</x-th>
                                        <x-th></x-th>
                                    </tr>
                                </thead>
                                @forelse ($deed_of_sales as $item)
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

                                        <x-td>{{ Carbon\Carbon::parse($item->turnover_at)->format('M d, Y') }}
                                        </x-td>
                                        <x-td>{{ number_format($item->price, 2) }}</x-td>
                                        <x-td>{{ $item->classification }}</x-td>
                                        <x-td>
                                            @if($item->status === 'active')
                                            <span
                                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                <i class="fa-solid fa-circle-check"></i> {{
                                                $item->status }}
                                                @else
                                                <span
                                                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                    <i class="fa-solid fa-clock"></i> {{
                                                    $item->status }}
                                                </span>
                                                @endif
                                        </x-td>
                                        <x-td>
                                            <x-button id="dropdownDividerButton"
                                                data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}" type="button">
                                                Actions
                                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7">
                                                    </path>
                                                </svg>
                                            </x-button>

                                            <div id="dropdownDivider.{{ $item->uuid }}"
                                                class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                    <li>
                                                        <a href="/unit/{{ $item->unit->uuid }}/"
                                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                class="fa-solid fa-house"></i>&nbspShow
                                                            Unit</a>
                                                    </li>

                                                </ul>

                                            </div>
                                        </x-td>
                                        @empty
                                        <x-td>No data found</x-td>
                                        @endforelse
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-index-layout>