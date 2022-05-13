<x-app-layout>
    @section('title', '| '.$unit->unit)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $unit->unit }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Owners</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='{{ url()->previous() }}'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbsp Back
                    </x-button>

                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <?php $ctr =1; ?>
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <x-th>#</x-th>
                                                    <x-th>name</x-th>
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
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <a href="/owner/{{ $item->owner_uuid }}">
                                                                    <img class="h-10 w-10 rounded-full"
                                                                        src="/storage/{{ $item->owner->photo_id }}"
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
                                                        {{ Carbon\Carbon::parse($item->turnover_at)->format('M d, Y') }}
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
                                                            data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                                                            type="button"><i
                                                                class="fa-solid fa-list-check"></i>&nbspOptions
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
                                                                    <a href="/owner/{{ $item->owner->uuid }}/"
                                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                            class="fa-solid fa-user"></i>&nbspShow
                                                                        Owner</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </x-td>
                                                    @empty
                                                    <x-td>No data found!</x-td>
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
            </div>
        </div>
    </div>
</x-app-layout>