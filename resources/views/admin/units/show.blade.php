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
                                <li><a href="/property/{{ Session::get('property') }}/units"
                                        class="text-blue-600 hover:text-blue-700">Units</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $unit->unit }}</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/units'">Back
                    </x-button>
                    @can('manager')
                    <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/edit'">
                        Edit</x-button>
                    @endcan
                    {{--<x-button
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/contract/{{ Str::random(10) }}/create'">
                        Add Contract</x-button> --}}
                    <x-button id="dropdownButton" data-dropdown-toggle="dropdown" type="button">Add <svg
                            class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></x-button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            @can('admin')
                            {{-- <li>
                                <a href="/unit/{{ $unit->uuid }}/tenant/{{ Str::random(10) }}/new_create"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">New
                                    Tenant
                                </a>
                            </li> --}}
                            <li>
                                <a href="/unit/{{ $unit->uuid }}/tenant/{{ Str::random(10) }}/old_create"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Old
                                    Tenant
                                </a>
                            </li>
                            @endcan
                            @can('manager')
                            <li>
                                <a href="/unit/{{ $unit->uuid }}/owner/{{ Str::random(10) }}/create"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Owner
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <div class="flex justify-center">
                        <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white">

                            <img src="/storage/{{ $unit->thumbnail }}"
                                class="p-2 bg-white border rounded max-w-md mt-5 mx-5 ml-5 mr-5" alt="..." />
                        </div>
                        <div class="flex flex-col md:flex-row md:max-w-xl">

                            <div class="p-6 flex flex-col justify-start">
                                <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $unit->unit }}</h5>
                                <hr>
                                <p class="mt-5 text-gray-700 text-base mb-4">
                                    Category: {{ $unit->category->category }}
                                </p>
                                <p class="mt-5 text-gray-700 text-base mb-4">
                                    Enrolled in Leasing: 
                                    @if($unit->is_enrolled = 1)
                                    Enrolled
                                    @else
                                    Unenrolled
                                    @endif
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Building: {{ $unit->building->building }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Floor: {{ $unit->floor->floor }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Status: {{ $unit->status->status }}
                                </p>

                                <p class="text-gray-700 text-base mb-4">
                                    Rent: ₱{{ number_format($unit->rent, 2) }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Discount: ₱{{ number_format($unit->discount, 2) }}
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Size: {{ $unit->size }} sqm
                                </p>
                                <p class="text-gray-700 text-base mb-4">
                                    Created: {{ $unit->created_at->diffForHumans() }}
                                </p>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <span>{{ Str::plural('Tenant', $contracts->count())}} ({{ $contracts->count()
                                    }})</span>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tenant</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Duration</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Contact</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Rent</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Reason for moveout</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>

                                            </tr>
                                        </thead>
                                        @forelse ($contracts as $contract)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="/storage/{{ $contract->tenant->photo_id }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900"><b>{{
                                                                    $contract->tenant->tenant }}</b>
                                                            </div>
                                                            <div class="text-sm text-gray-500">{{
                                                                $contract->tenant->type
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{
                                                        Carbon\Carbon::parse($contract->start)->format('M d, Y').' -
                                                        '.Carbon\Carbon::parse($contract->end)->format('M d, Y') }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        Carbon\Carbon::parse($contract->end)->diffForHumans($contract->start)
                                                        }}
                                                    </div>
                                                </td>


                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $contract->tenant->email }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        $contract->tenant->mobile_number }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{number_format($contract->rent, 2)}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($contract->status === 'active')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $contract->status }}
                                                    </span>
                                                    @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $contract->status }}
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $contract->moveout_reason }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button id="dropdownDividerButton"
                                                        data-dropdown-toggle="dropdownDivider"
                                                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                        type="button">Select your action <svg class="ml-2 w-4 h-4"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg></button>

                                                    <div id="dropdownDivider"
                                                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                            <li>
                                                                <a href="/contract/{{ $contract->uuid }}/edit"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Show</a>
                                                            </li>

                                                            <li>
                                                                <a href="/contract/{{ $contract->uuid }}/transfer"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Transfer</a>
                                                            </li>
                                                            <li>
                                                                <a href="/contract/{{ $contract->uuid }}/renew"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Renew</a>
                                                            </li>

                                                        </ul>
                                                        @if($contract->status == 'active')
                                                        <div class="py-1">
                                                            <a href="/contract/{{ $contract->uuid }}/moveout/bills"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                Moveout</a>
                                                        </div>
                                                        @endif
                                                    </div>

                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <span>No tenants found!</span>
                                            </tr>
                                        </tbody>
                                        @endforelse
                                    </table>

                                </div>


                                <br>
                                <span>{{ Str::plural('Owner', $deed_of_sales->count())}} ({{ $deed_of_sales->count()
                                    }})</span>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Owner</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Price</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Contact</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Classification</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>

                                            </tr>
                                        </thead>
                                        @forelse ($deed_of_sales as $deed_of_sale)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <a href="/owner/{{ $deed_of_sale->owner_uuid }}">
                                                                <img class="h-10 w-10 rounded-full"
                                                                    src="/storage/{{ $deed_of_sale->owner->photo_id }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">{{
                                                                $deed_of_sale->owner->owner }}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ number_format($deed_of_sale->price, 2) }}
                                                </td>


                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $deed_of_sale->owner->email }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        $deed_of_sale->owner->mobile_number }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $deed_of_sale->classification }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($deed_of_sale->status === 'active')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $deed_of_sale->status }}
                                                    </span>
                                                    @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $deed_of_sale->status }}
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <i class="fa-solid fa-down"></i>
                                                </td>

                                            </tr>


                                            @empty
                                            <tr>
                                                <span>No owners found!</span>
                                            </tr>

                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>

                                <br>
                                <br>
                                <span>{{ Str::plural('Leasing Enrollment History', $enrollees->count())}} ({{
                                    $enrollees->count()
                                    }})</span>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Owner</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Contact</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Contract Period</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Agreed Rent/mo</th>


                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Reason for unenrollment</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Contract</th>

                                            </tr>
                                        </thead>
                                        @forelse ($enrollees as $enrollee)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <a href="/owner/{{ $enrollee->owner_uuid }}">
                                                                <img class="h-10 w-10 rounded-full"
                                                                    src="/storage/{{ $enrollee->owner->photo_id }}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">{{
                                                                $enrollee->owner->owner }}
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $enrollee->owner->email }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        $enrollee->owner->mobile_number }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{
                                                        Carbon\Carbon::parse($enrollee->start)->format('M d, Y').' -
                                                        '.Carbon\Carbon::parse($enrollee->end)->format('M d, Y') }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{
                                                        Carbon\Carbon::parse($enrollee->end)->diffForHumans($enrollee->start)
                                                        }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ number_format($enrollee->rent, 2) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($enrollee->status === 'active')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $enrollee->status }}
                                                    </span>
                                                    @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $enrollee->status }}
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $enrollee->unenrollment_reason }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">

                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <span>No enrollment histories found!</span>
                                            </tr>

                                            @endforelse
                                        </tbody>
                                    </table>

                                </div>

                                <br>
                                <span>{{ Str::plural('Bill', $bills->count())}} ({{ $bills->count()
                                    }})</span>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tenant</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Bill No</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Reference No</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Particular</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Bill</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>

                                            </tr>
                                        </thead>
                                        @forelse ($bills as $bill)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $bill->tenant}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $bill->bill_no}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $bill->reference_no}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $bill->particular}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ number_format($bill->bill, 2) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($bill->bill_status === 'paid')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $bill->bill_status }}
                                                    </span>
                                                    @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $bill->bill_status }}
                                                    </span>
                                                    @endif
                                                </td>

                                            </tr>


                                            @empty
                                            <tr>
                                                <span>No bills found!</span>
                                            </tr>

                                            @endforelse
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
</x-app-layout>