<div class="">
    <x-search placeholder="Search for reference no..."></x-search>
    <div class="mt-2 mb-2">
        {{ $ars->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>AR #</x-th>
                    <x-th>Date of Payment</x-th>
                    <x-th>Tenant</x-th>
                    {{-- <x-th>Reference #</x-th> --}}

                    <x-th>Mode of Payment</x-th>
                    <x-th>Amount Paid</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            @forelse ($ars as $ar)
            <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <tr>
                    <x-td>{{ $ar->ar_no }}</x-td>
                    {{-- <x-td><a href="/tenant/{{ $ar->tenant->uuid }}/ars"><b class="text-blue-600">{{
                                $ar->tenant->bill_reference_no}}</b></a></x-td> --}}
                    <?php
                                $tenant = App\Models\Tenant::find($ar->tenant_uuid)->tenant;
                                //$unit = App\Models\Unit::find($ar->unit_uuid)->unit
                            ?>
                    <x-td>{{ Carbon\Carbon::parse($ar->created_at)->format('M d, Y') }}
                        <x-td><a href="/tenant/{{ $ar->tenant->uuid }}/ars"><b class="text-blue-600">{{ $tenant
                                    }}</b></a>
                        </x-td>

                    </x-td>
                    <x-td>{{ $ar->mode_of_payment }}</x-td>
                    <?php
                                $collections_count = App\Models\Collection::where('batch_no', $ar->collection_batch_no)->count();
                            ?>
                    <x-td>{{ number_format($ar->amount,2) }} ({{ $collections_count }})</x-td>
                    <x-td>
                        <x-button
                            onclick="window.location.href='tenant/{{ $ar->tenant_uuid }}/ar/{{ $ar->id }}/export'">
                            Export
                        </x-button>
                    </x-td>
                    @empty
                    <x-td>No data found!</x-td>
                </tr>
                @endforelse
                <tr>
                    <x-td>Total</x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <?php
                                $property_collections_count = App\Models\Collection::where('property_uuid', Session::get('property'))->count();
                            ?>
                    <x-td>{{ number_format($ars->sum('amount'), 2) }} ({{ $property_collections_count }})</x-td>
                    <x-td></x-td>

                </tr>
            </tbody>

        </table>
    </div>
</div>


{{-- @section('title', '| Payments')
<x-slot name="labels">
    Payments
</x-slot>

<x-slot name="options">
    @if($start || $end)
    <x-button class="text-black-600 cursor-pointer" wire:click="resetFilters"><i
            class="fa-solid fa-circle-xmark"></i>&nbsp
        Clear filters</x-button>
    @endif
</x-slot>

<x-slot name="search">
    <x-search placeholder="Search for name, mobile, or email"></x-search>
</x-slot>

<x-slot name="paginate">
    {{ $ars->links() }}
</x-slot>

<x-slot name="table">
    @if($ars->count())
    @include('utilities.show-ars-results')
    @endif
</x-slot> --}}