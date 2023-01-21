<div>


    {{-- <p>Security Deposit: <b>{{ number_format($deposits,2) }}</b></p> --}}
    @if($unpaid_bills->count())
    <p class="text-center mb-5 text-red-800"><i class="fa-solid fa-triangle-exclamation"></i> Unpaid bills have to be
        settled to proceed.</p>

    @can('admin')
    <div class="mt-10 text-center mb-10">
        <button type="button" data-modal-toggle="create-particular-modal"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Force Moveout
        </button>
    </div>
    @endcan
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                <x-th></x-th>
                {{-- <x-th></x-th> --}}
                <x-th>BILL # </x-th>
                <x-th>DATE POSTED</x-th>
                <x-th>NAME</x-th>
                <x-th>UNIT</x-th>
                <x-th>PERIOD COVERED</x-th>
                <x-th>PARTICULAR</x-th>
                <x-th>AMOUNT DUE</x-th>
                <x-th>AMOUNT PAID</x-th>
                <x-th>BALANCE </x-th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($unpaid_bills as $index => $item)
            <tr>
                <x-td>{{ $index+1 }}</x-td>
                {{-- <x-td>
                    @if($item->status != 'paid')
                    <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                    @endif
                </x-td> --}}
                <x-td>
                    {{ $item->bill_no}}
                </x-td>
                <x-td>
                    {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
                </x-td>
                <x-td>
                    @if($item->tenant_uuid)
                    <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                        href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/bills">{{
                        $item->tenant->tenant}}</a>
                    @elseif($item->owner_uuid)
                    <a class="text-blue-500 text-decoration-line: underline"
                        href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}/bills">{{
                        $item->owner->owner}}</a>
                    @endif
                </x-td>
                <x-td>
                    <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                        href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}/bills">
                        {{ $item->unit->unit}}
                    </a>
                </x-td>
                <x-td>
                    {{ Carbon\Carbon::parse($item->start)->format('M d,
                    y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}
                </x-td>
                <x-td>
                    {{ $item->particular->particular}}
                </x-td>
                <x-td>
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
                    <span title="unpaid"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </span>
                    @endif

                    @if($item->description === 'movein charges' && $item->status==='unpaid')
                    <span title="urgent"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-bolt"></i>
                    </span>
                    @endif
                </x-td>
                <x-td>
                    {{ number_format($item->initial_payment, 2) }}
                </x-td>
                <x-td>
                    {{ number_format(($item->bill-$item->initial_payment), 2) }}
                </x-td>
            </tr>
            @endforeach
        </tbody>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td> </x-td>
                <x-td> </x-td>
                <x-td> </x-td>
                <x-td> </x-td>
                <x-td> </x-td>
                <x-td> </x-td>
                <x-td>{{
                    number_format($unpaid_bills->sum('bill'), 2) }} </x-td>
                <x-td>{{
                    number_format($unpaid_bills->sum('initial_payment'), 2) }} </x-td>
                <x-td>{{
                    number_format(($unpaid_bills->sum('bill')-$unpaid_bills->sum('initial_payment')), 2) }} </x-td>
            </tr>
        </tbody>
    </table>
    @else
    <div class="mt-10 text-center mb-10">
        <i class="fa-solid fa-circle-check"></i>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No bills found.</h3>
        <p class="mt-1 text-sm text-gray-500">Tenant is now ready to moveout.</p>
        <div class="mt-6">
            <button type="button" wire:click="submitForm()"
                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Go to step 3
            </button>

        </div>
    </div>
    @endif
@include('modals.moveout-force')
</div>