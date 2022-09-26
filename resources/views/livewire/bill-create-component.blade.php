<div>

    <form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="post"
        action="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/bill/store">
        @csrf
        <div>
            <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3">
                    <x-label for="particular_id">
                        Select a bill particular
                    </x-label>
                    <x-form-select wire:model="particular_id" id="particular_id" name="particular_id">
                        <option value="">Select one</option>
                        @foreach ($particulars as $particular)
                        <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                            particular_id?
                            'selected': 'Select one'
                            }}>{{ $particular->particular }}</option>
                        @endforeach
                    </x-form-select>

                    @error('particular_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <x-form-input wire:model="unit_uuid" id="grid-last-name" type="hidden" value="{{ $unit_uuid }}"
                name="unit_uuid" />

            <x-label>Period Covered</x-label>
            <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3">
                    <x-label for="start">
                        Start
                    </x-label>
                    <x-form-input wire:model="start" id="grid-last-name" type="date"
                        value="{{ old('start', Carbon\Carbon::now()->startOfMonth()->format('Y-m-d')) }}"
                        name="start" />

                    @error('start')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <x-label for="end">
                        End
                    </x-label>
                    <x-form-input wire:model="end" id="grid-last-name" type="date"
                        value="{{ old('end', Carbon\Carbon::now()->addMonth()->endOfMonth()->format('Y-m-d')) }}"
                        name="end" />

                    @error('end')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


            </div>

            <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-full px-3">
                    <x-label for="bill">
                        Amount
                    </x-label>
                    <x-form-input wire:model="bill" id="grid-last-name" type="number" step="0.001"
                        value="{{ old('bill') }}" name="bill" min="0" />

                    @error('bill')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-5">

                <p class="text-right">
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'"
                        class="ml-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Finish
                    </button>
                    <x-form-button>Create</x-form-button>
                </p>
            </div>
    </form>
</div>
</form>
</div>
@if($bills->count())
<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">BILL #
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DATE
                POSTED</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">UNIT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PERIOD
                COVERED</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PARTICULAR
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">AMOUNT DUE
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">AMOUNT
                PAID</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">BALANCE

        </tr>
    </thead>
    @forelse ($bills as $item)
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->
                {{--
                <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                {{ $item->bill_no}}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-purple-700">
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}/bills">
                    {{ $item->tenant->tenant}}
                </a>
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-purple-700">
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}/bills">
                    {{ $item->unit->unit}}
                </a>
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($item->start)->format('M d,
                y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $item->particular->particular}}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ number_format($item->bill, 2) }}

                @if($item->status === 'paid')
                <span title="paid"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                @elseif($item->status === 'partially_paid')
                <span title="partially_paid"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-clock"></i>
                </span>
                @else
                <span title="unpaid" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                @endif

                @if($item->description === 'movein charges' && $item->status==='unpaid')
                <span title="urgent"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-bolt"></i>
                </span>
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">
                {{ number_format($item->initial_payment, 2) }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">
                {{ number_format(($item->bill-$item->initial_payment), 2) }}
            </td>
        </tr>
        @empty
        <tr>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">No bills found!</td>
        </tr>

        <!-- More people... -->
    </tbody>
    @endforelse


    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <tr>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                number_format($bills->sum('bill'), 2) }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                number_format($bills->sum('initial_payment'), 2) }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }}</td>
        </tr>
    </tbody>
</table>
@endif