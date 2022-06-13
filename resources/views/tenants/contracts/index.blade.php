<x-app-layout>
    @section('title', $tenant->tenant)
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

                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                <li class="text-gray-500">Contracts</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/tenant/{{ $tenant->uuid }}/edit'"> Go back to tenant
                    </x-button>

                    <x-button
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/units'">
                        Create a new contract
                    </x-button>

                    {{-- <x-button data-modal-toggle="create-tenant-contract-modal"><i
                            class="fa-solid fa-circle-plus"></i>&nbsp Contract
                    </x-button> --}}


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
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <x-th>#</x-th>
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
                                                    <div class="text-sm text-gray-900">{{ $item->unit->unit }}
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
                                                    <span
                                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
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
                                                    <x-button id="dropdownDividerButton"
                                                        data-dropdown-toggle="dropdownDivider.{{ $item->uuid }}"
                                                        type="button">Actions<svg class="ml-2 w-4 h-4" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7">
                                                            </path>
                                                        </svg></x-button>

                                                    <div id="dropdownDivider.{{ $item->uuid }}"
                                                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1" aria-labelledby="dropdownDividerButton">

                                                            <li>
                                                                <a href="/contract/{{ $item->uuid }}/export"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-file-contract"></i>&nbspExport
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="/contract/{{ $item->uuid }}/transfer"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/contract/{{ $item->uuid }}/renew"
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
                                                                href="/contract/{{ $item->uuid }}/moveout"
                                                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                <i
                                                                    class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                                                                @else
                                                                <a data-modal-toggle="moveout-error-modal" href="#/"
                                                                    class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                    <i
                                                                        class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('tenants.contracts.create')
    @include('utilities.moveout-error-modal')
</x-app-layout>