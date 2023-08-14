
<table style="overflow: scroll;">
    <tbody>
        <tr>
            <td class="sticky-col first-col"><b>Total</b></td>
            <td class="sticky-col second-col"></td>
            <td class="sticky-col third-col"></td>
            <td class="sticky-col fourth-col"></td>
            <td class="sticky-col fifth-col"></td>
            <td class="sticky-col sixth-col"> </td>
            <td><b>{{ number_format($remittances->sum('monthly_rent'), 2) }}</b></td>
            <td><b>{{ number_format($remittances->sum('net_rent'), 2) }}</b></td>
            <td><b>{{ number_format($remittances->sum('management_fee'), 2) }}</b></td>
            <td><b>{{ number_format($remittances->sum('marketing_fee'), 2) }}</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td><b>{{ number_format($remittances->sum('total_deductions'), 2) }}</b></td>
            <td><b>{{ number_format($remittances->sum('remittance'), 2) }}</b></td>
            <td></td>
            <td></td>

        </tr>

    </tbody>
    <thead>

        <th>Unit #</th>
        <th>Date Paid</th>
        <th>AR #</th>
        <th>Particulars</th>

        <th>Owner Name</th>
        <th>Payee Name</th>
        <th>Monthly Rent</th> <!-- AUTO COMPUTE -->
        <th>Net Rent </th> <!-- MANAGEMENT FEE + NET RENT -->
        <th>Management Fee</th> <!-- FROM COLLECTION -->
        <th>Marketing Fee</th>
        <th class="bg-yellow-300">Bank Transfer Fee</th>
        <th class="bg-yellow-300">Purchased Materials/Unit Repairs/Others</th>
        <th class="bg-yellow-300">Unit Owner Membership Fee </th>
        <th class="bg-yellow-300">CONDO DUES</th>
        <th class="bg-yellow-300">PARKING DUES</th>
        <th class="bg-yellow-300">WATER</th>
        <th class="bg-yellow-300">ELECTRICITY</th>
        <th class="bg-yellow-300">GENERATOR SHARE</th>
        <th class="bg-yellow-300">SURCHARGES OF UNIT OWNER</th>
        <th class="bg-yellow-300">BUILDING INSURANCE</th>
        <th class="bg-yellow-300">REAL PROPERTY TAX - COMMON AREA</th>
        <th class="bg-yellow-300">HOUSEKEEPING FEE</th>
        <th class="bg-yellow-300">LAUNDRY FEE</th>
        <th class="bg-yellow-300">COMPLIMENTARY</th>
        <th class="bg-yellow-300">INTERNET</th>
        <th class="bg-yellow-300">SPECIAL ASSESSMENT</th>
        <th class="bg-yellow-300">MATERIALS RECOVERY FACILITY</th>
        <th class="bg-yellow-300">RECHARGE OF FIRE EXTINGUISHER</th>
        <th class="bg-yellow-300">ENVIRONMENTAL FEE</th>
        <th class="bg-yellow-300">BLADDER TANK</th>
        <th class="bg-yellow-300">CAUSE OF MAGNET</th>
        <th>TOTAL DEDUCTIONS</th>
        <th>REMITTANCE</th>
        <th>CV NO.</th>
        <th>Check No</th>
    </thead>
    <tbody>
        @foreach ($remittances as $index => $remittance)
        <div wire:key="remittance-field-{{ $remittance->id }}">
        <tr>

            <td class="sticky-col first-col">{{ $remittance->unit->unit }}</td>
            <td class="sticky-col second-col">{{ Carbon\Carbon::parse($remittance->created_at)->format('M d, Y') }}</td>
            <td class="sticky-col third-col">{{ $remittance->ar_no }}</td>
            <td class="sticky-col fourth-col">{{ $remittance->particular->particular }}</td>
            <td class="sticky-col fifth-col">
                @if($remittance->owner_uuid)
                    {{ $remittance->owner->owner }}
                @endif
            </td>
            <td class="sticky-col sixth-col">
                @if($remittance->payee_uuid)
                {{ $remittance->payee->tenant }}
                @endif
            </td>
            <td>{{ number_format($remittance->monthly_rent, 2) }}</td>
            <td>{{ number_format($remittance->net_rent, 2) }}</td>
            <td>{{ number_format($remittance->management_fee, 2) }}</td>
            <td>{{ number_format($remittance->marketing_fee, 2) }}</td>
            <td><input wire:model="remittances.{{ $index }}.bank_transfer_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.miscellaneous_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.membership_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.condo_dues" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.parking_dues" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.water" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.electricity" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.generator_share" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.surcharges" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.building_insurance" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.real_property_tax" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.housekeeping_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.laundry_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.complimentary" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.internet" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.special_assessment" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><input wire:model="remittances.{{ $index }}.materials_recovery_facility" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.recharge_of_fire_extinguisher" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.environmental_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.bladder_tank" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><input wire:model="remittances.{{ $index }}.cause_of_magnet" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td>{{ number_format($remittance->total_deductions, 2) }}</td>
            <td>{{ number_format($remittance->remittance, 2) }}</td>
            <td><input wire:model="remittances.{{ $index }}.cv_no" wire:change="updateRemittance({{ $remittance->id }})" type="text"/></td>
            <td><input wire:model="remittances.{{ $index }}.check_no" wire:change="updateRemittance({{ $remittance->id }})" type="text"/></td>
        </tr>
        </div>
        @endforeach
    </tbody>
</table>