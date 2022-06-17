<x-index-layout>
    @section('title', '| '.$owner_details->owner)
    <x-slot name="labels">
        {{ $owner_details->owner }}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back
        </x-button>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Owner Details</h1>
        @livewire('owner-edit-component', ['owner_details' => $owner_details])
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Representatives</h1>
        @include('owners.representatives.index')
        <div class="mt-5">
            <span>Showing the last 5 representatives</span>
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/owner/{{ $owner_details->uuid }}/representative/{{ Str::random(8) }}/create'">
                    Create a representative
                </x-button>

            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Banks</h1>
        @include('owners.banks.index')
        <div class="mt-5">
            <span>Showing the last 5 Banks</span>
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/owner/{{ $owner_details->uuid }}/bank/{{ Str::random(8) }}/create'">
                    Create a bank
                </x-button>

            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Deed Of Sales</h1>
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
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
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

                    @empty
                    <x-td>No data found</x-td>
                    @endforelse
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <span>Showing the last 5 Deed of sales</span>
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/units'">
                    Create a Deed of sale
                </x-button>
                <x-button onclick="window.location.href='/owner/{{ $owner_details->uuid }}/deed_of_sales/'">
                    See more Deed of sale
                </x-button>

            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Management Agreements</h1>
        <table class="min-w-full divide-y divide-gray-200">
            <?php $ctr =1; ?>
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Unit</x-th>
                    <x-th>Contract period</x-th>
                    <x-th>Agreed rent/mo</x-th>
                    <x-th>Status</x-th>

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

                    @empty
                    <x-td>No data found!</x-td>
                    @endforelse
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <span>Showing the last 5 management agreements</span>
            <p class="text-right">
                {{-- <x-button onclick="window.location.href='/owner/{{ $owner_details->uuid }}/enrollee/{{ Str::random(8) }}/create'">
                    Add to lease
                </x-button> --}}
                <x-button onclick="window.location.href='/owner/{{ $owner_details->uuid }}/enrollees/'">
                    See more management agreements
                </x-button>

            </p>
        </div>
    </div>

</x-index-layout>