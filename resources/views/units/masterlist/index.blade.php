<x-app-layout>
    @section('title', '| Units')
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
                                <li class="text-gray-500">
                                    Units
                                </li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button
                        onclick="window.location.href='/property/{{ Session::get('property') }}/units/'"><i class="fa-solid fa-table-cells-large"></i>&nbsp Units   
                    </x-button>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="">
                <x-search placeholder="search for name, mobile, or email"></x-search>
            </div> --}}
            <div class="mt-5">
                {{ $units->links() }}
            </div>
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
                                                <x-th>Status</x-th>
                                                <x-th>Tenant</x-th>
                                                {{-- <x-th>Owner</x-th> --}}
                                                <x-th>Rent/mo</x-th>
                                                <x-th>Contract Period</x-th>
                                                <x-th></x-th>
                                                
                                            </tr>
                                        </thead>
                                        @foreach ($units as $index => $unit)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <x-td>{{ $index  }}</x-td>
                                                <x-td><a class="text-blue-600" href="/unit/{{ $unit->unit->uuid }}/contracts">{{ $unit->unit->building->building.' '.$unit->unit->unit }}</a></x-td>
                                                <x-td>
                                                    @if($unit->unit->status->status === 'occupied')
                                                    <span title="occupied" class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <i class="fa-solid fa-circle-check"></i> {{ $unit->unit->status->status }}
                                                    </span>
                                                    @elseif($unit->unit->status->status === 'reserved')
                                                    <span title="reserved" class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                        <i class="fa-solid fa-clock"></i> {{ $unit->unit->status->status }}
                                                    </span>
                                                    @else
                                                    <span title="inactive" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        <i class="fa-solid fa-circle-xmark"></i>
                                                    </span>
                                                    @endif
                                                </x-td>
                                                <x-td><a class="text-blue-600" href="/tenant/{{ $unit->tenant->uuid }}/contracts">{{ $unit->tenant->tenant }}</a> 
                                                    @if($unit->status === 'active')
                                                    <span title="active" class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <i class="fa-solid fa-circle-check"></i> 
                                                    </span>
                                                    @elseif($unit->status === 'pending')
                                                    <span title="pending" class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                        <i class="fa-solid fa-clock"></i> 
                                                    </span>
                                                    @else
                                                    <span title="inactive" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        <i class="fa-solid fa-circle-xmark"></i>
                                                    </span>
                                                    @endif
                                                </x-td>
                                                <?php
                                                   $owner = App\Models\Enrollee::where('unit_uuid', $unit->unit->uuid)->pluck('owner_uuid')->first();              
                                             
                                                ?>
                                                {{-- <x-td>{{ App\Models\Owner::find($owner) }}</x-td> --}}
                                                <x-td>{{ number_format($unit->rent, 2) }}</x-td>
                                                <x-td>
                                                    <div class="text-sm text-gray-900">{{
                                                        Carbon\Carbon::parse($unit->start)->format('M d, Y').' -
                                                        '.Carbon\Carbon::parse($unit->end)->format('M d, Y') }}
                                                    </div>
                                                    
                                                    <div class="text-sm text-gray-500">{{
                                                        Carbon\Carbon::parse($unit->end)->diffInMonths($unit->start)
                                                        }} months
                                                    </div>
                                                </x-td>
                                                <x-td>
                                                    <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $unit->uuid }}" type="button"><i
                                                            class="fa-solid fa-list-check"></i>&nbspOptions<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                                            </path>
                                                        </svg></x-button>
                                                
                                                    <div id="dropdownDivider.{{ $unit->uuid }}"
                                                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                
                                                            <li>
                                                                <a href="/contract/{{ $unit->uuid }}/export"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-file-contract"></i>&nbspExport
                                                                </a>
                                                            </li>
                                                
                                                            <li>
                                                                <a href="/contract/{{ $unit->uuid }}/transfer"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/contract/{{ $unit->uuid }}/renew"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                        class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                                                </a>
                                                            </li>
                                                
                                                        </ul>
                                                        @if($unit->status == 'active')
                                                        <div class="py-1">
                                                            <a href="/contract/{{ $unit->uuid }}/moveout/bills"
                                                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </x-td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>