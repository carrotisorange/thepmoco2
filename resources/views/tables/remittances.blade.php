<style>
.div1 {
    width: 1280px;
    height: 400px;
    overflow: scroll;
    border: 1px solid #777777;
}

.div1 table {
    border-spacing: 0;
}

.div1 th {
    border-left: none;
    border-right: 1px solid #bbbbbb;
    padding: 5px;
    width: 80px;
    min-width: 80px;
    position: sticky;
    top: 0;
    font-weight: normal;
}

.div1 td {
    border-left: none;
    border-right: 1px solid #bbbbbb;
    border-bottom: 1px solid #bbbbbb;
    padding: 5px;
    width: 80px;
    min-width: 80px;
}

.div1 th:nth-child(1),
.div1 td:nth-child(1) {
    position: sticky;
    left: 0;
    width: 50px;
    min-width: 50px;
}

.div1 th:nth-child(2),
.div1 td:nth-child(2) {
    position: sticky;

    left:50px;
    width: 100px;
    min-width: 100px;
}

.div1 th:nth-child(3),
.div1 td:nth-child(3) {
    position: sticky;
    left:150px;
    width: 100px;
    min-width: 100px;
}

.div1 th:nth-child(4),
.div1 td:nth-child(4) {
    position: sticky;
    left:250px;
    width: 100px;
    min-width: 100px;
}

.div1 th:nth-child(5),
.div1 td:nth-child(5) {
    position: sticky;
    left:350px;
    width: 250px;
    min-width: 250px;
}

.div1 th:nth-child(6),
.div1 td:nth-child(6) {
    position: sticky;
    left:550px;
    width: 100px;
    min-width: 100px;
}

.div1 td:nth-child(1),
.div1 td:nth-child(2),
.div1 td:nth-child(3),
.div1 td:nth-child(4),
.div1 td:nth-child(5),
.div1 td:nth-child(6) {
    background: #ececec;
}


.div1 th:nth-child(1),
.div1 th:nth-child(2),
.div1 th:nth-child(3),
.div1 th:nth-child(4),
.div1 th:nth-child(5),
.div1 th:nth-child(6), {
    z-index: 2;
}
</style>

<body>
<div class="div1">
    <table>
        <tr>
        <x-th>#</x-th>
        <x-th>Unit #</x-th>
        <x-th>Date Paid</x-th>
        <x-th>AR #</x-th>
        <x-th>Period Covered</x-th>
        <x-th>Owner</x-th>
        <x-th>Bank Name</x-th>
        <x-th>Account Name</x-th>
        <x-th>Account #</x-th>
        <x-th>Tenant</x-th>
        <x-th>Guest</x-th>
        <x-th>Particular</x-th>
        <x-th>Rent</x-th> <!-- AUTO COMPUTE -->
        {{-- <x-th>Net Rent </x-th> <!-- MANAGEMENT FEE + NET RENT --> --}}
   <!-- FROM COLLECTION -->
        <x-th>Marketing Fee</x-th>
        <th class="bg-yellow-300">MANAGEMENT FEE <span title="management fee"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">BANK TRANSFER <span title="bank transfer fee"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">CONDO DUES <span title="condo dues"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">MEMBERSHIP <span title="membership fee"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">PURCHASED MATERIALS <span title="purchase materials"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">PARKING DUES <span title="parking dues"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">WATER <span title="water bill"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">ELECTRIC <span title="electric bill"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">GENERATOR SHARE <span title="generator share"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">SURCHARGES <span title="surcharges of the unit owner"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">BUILDING INSURANCE <span title="building insurance"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">REAL PROPERTY TAX <span title="real property tax - common area"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">HOUSEKEEPING <span title="housekeeping"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">LAUNDRY FEE <span title="laundry fee"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">COMPLIMENTARY <span title="complimentary fee"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">INTERNET <span title="internet bill"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">SPECIAL ASSESSMENT <span title="special assessment"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">MRF <span title="materials recovery facility"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">FIRE EXTINGUISHER <span title="recharge of fire extinguisher"><i class="fa-solid fa-circle-info"></i> </span></th>
        <th class="bg-yellow-300">ENVIRONMENTAL<span title="environmental fee"><i class="fa-solid fa-circle-info"></i> </span></th>
        {{-- <th class="bg-yellow-300">BLADDER TANK</th>
        <th class="bg-yellow-300">CAUSE OF MAGNET</th> --}}
        <x-th>Deductions</x-th>
        <x-th>Remittance</x-th>
        {{-- <th>CV NO.</th> --}}
        <x-th>Check No</x-th>
        </tr>
        <tr>
            <x-td></x-td>
            <x-td class="sticky-col first-col">Total</x-td>
            <x-td class="sticky-col second-col"></x-td>
            <x-td class="sticky-col third-col"></x-td>
            <x-td class="sticky-col fourth-col"></x-td>
            <x-td></x-td>
            <x-td class="sticky-col fifth-col"></x-td>
            <x-td class="sticky-col sixth-col"> </x-td>
            <x-td class="sticky-col seventh-col"> </x-td>
            <x-td class="sticky-col eight-col"> </x-td>
            <x-td class="sticky-col ninth-col"> </x-td>
            <x-td class="sticky-col tenth-col"> </x-td>
            <x-td>{{ number_format($remittances->sum('monthly_rent'), 2) }}</x-td>
            {{-- <x-td>{{ number_format($remittances->sum('net_rent'), 2) }}</x-td> --}}

            <x-td>{{ number_format($remittances->sum('marketing_fee'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('management_fee'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('bank_transfer_fee'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('condo_dues'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('membership_fee'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('miscellaneous_fee'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('parking_dues'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('water'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('electricity'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('generator_share'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('surcharges'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('building_insurance'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('real_property_tax'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('housekeeping_fee'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('laundry_fee'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('complimentary'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('internet'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('special_assessment'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('materials_recovery_facility'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('recharge_of_fire_extinguisher'), 2) }}</x-td>
             <x-td>{{ number_format($remittances->sum('environmental_fee'), 2) }}</x-td>
           {{-- <td>{{ number_format($remittances->sum('bladder_tank'), 2) }}</td>
            <td>{{ number_format($remittances->sum('cause_of_magnet'), 2) }}</td> --}}
            <x-td>{{ number_format($remittances->sum('total_deductions'), 2) }}</x-td>
            <x-td>{{ number_format($remittances->sum('remittance'), 2) }}</x-td>
            <x-td></x-td>
            {{-- <td></td> --}}
        </tr>
        @foreach ($remittances as $index => $remittance)
        <div wire:key="remittance-field-{{ $remittance->id }}">
        <tr>
            <x-th>{{ $index+1 }}</x-th>
            <x-td class="sticky-col first-col">
                <x-link-component link="/property/{{ $remittance->property_uuid }}/unit/{{ $remittance->unit_uuid }}/remittances">
                   {{ $remittance->unit->unit }}
                </x-link-component>
            </x-td>
            <?php
                $collection = App\Models\Collection::where('property_uuid', $remittance->property_uuid)->where('ar_no', $remittance->ar_no);
                $bill  = App\Models\Bill::where('id', $collection->value('bill_id'));
            ;?>
            <x-td class="sticky-col second-col">{{ Carbon\Carbon::parse($collection->value('created_at'))->format('M d, Y') }}</x-td>
            <x-td class="sticky-col third-col">{{ $remittance->ar_no }}</x-td>
            <x-td >{{ Carbon\Carbon::parse($bill->value('start'))->format('M d, Y') }} - {{ Carbon\Carbon::parse($bill->value('end'))->format('M d, Y') }}</x-td>


            <x-td class="sticky-col fifth-col">
                <x-link-component link="/property/{{ $remittance->property_uuid }}/owner/{{ $remittance->owner_uuid }}">
                    {{ $remittance->owner->owner }}
                </x-link-component>
            </x-td>
            <x-td class="sticky-col sixth-col"> {{ $remittance->bank_name }}</x-td>
            <x-td class="sticky-col seventh-col"> {{ Str::limit($remittance->account_name, 20) }}</x-td>
            <x-td class="sticky-col eight-col"> {{ $remittance->account_number }}</x-td>
            <x-td class="sticky-col ninth-col">
                <x-link-component link="/property/{{ $remittance->property_uuid }}/tenant/{{ $remittance->tenant_uuid }}">
                    {{ $remittance->tenant->tenant }}
                </x-link-component>
            </x-td>
            <x-td class="sticky-col tenth-col">
                <x-link-component link="/property/{{ $remittance->property_uuid }}/guest/{{ $remittance->guest_uuid }}">
                   {{ $remittance->guest->guest }}
                </x-link-component>
            </x-td>
            <x-td class="sticky-col fourth-col">{{ $remittance->particular->particular }}</x-td>
            <x-td>{{ number_format($remittance->monthly_rent, 2) }}</x-td>
            {{-- <x-td>{{ number_format($remittance->net_rent, 2) }}</x-td> --}}
            <x-td>{{ number_format($remittance->marketing_fee, 2) }}</x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.management_fee" wire:change="update({{ $remittance->id }})"  type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.bank_transfer_fee" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.condo_dues" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.membership_fee" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.miscellaneous_fee" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.parking_dues" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.water" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.electricity" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.generator_share" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.surcharges" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.building_insurance" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.real_property_tax" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.housekeeping_fee" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.laundry_fee" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.complimentary" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.internet" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.special_assessment" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
             <x-td><x-table-input wire:model="remittances.{{ $index }}.materials_recovery_facility" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.recharge_of_fire_extinguisher" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            <x-td><x-table-input wire:model="remittances.{{ $index }}.environmental_fee" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></x-td>
            {{-- <td><x-table-input wire:model="remittances.{{ $index }}.bladder_tank" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.cause_of_magnet" wire:change="update({{ $remittance->id }})" type="number" step="0.001"/></td> --}}
            <x-td>{{ number_format($remittance->total_deductions, 2) }}</x-td>
            <x-td>{{ number_format($remittance->remittance, 2) }}</x-td>
            {{-- <td><x-table-input wire:model="remittances.{{ $index }}.cv_no" wire:change="update({{ $remittance->id }})" type="text"/></td> --}}
            <x-td><x-table-input wire:model="remittances.{{ $index }}.check_no" wire:change="update({{ $remittance->id }})" type="text"/></x-td>
        </tr>
        </div>
        @endforeach

    </table>
</div>

