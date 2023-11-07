<table style="overflow: scroll;">
    <tbody>
        <tr>
            <td class="sticky-col first-col"><b>Total</b></td>
            <td class="sticky-col second-col"></td>
            <td class="sticky-col third-col"></td>
            <td class="sticky-col fourth-col"></td>
            <td class="sticky-col fifth-col"></td>
            <td class="sticky-col sixth-col"> </td>
            <td class="sticky-col seventh-col"> </td>
            <td class="sticky-col eight-col"> </td>
            <td class="sticky-col ninth-col"> </td>
            <td class="sticky-col tenth-col"> </td>
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
        <th>Particular</th>
        <th>Owner</th>
        <th>Bank Name</th>
        <th>Account Name</th>
        <th>Account Number</th>
        <th>Tenant</th>
        <th>Guest</th>
        <th>Rent</th> <!-- AUTO COMPUTE -->
        <th>Net Rent </th> <!-- MANAGEMENT FEE + NET RENT -->
        <th>Management Fee</th> <!-- FROM COLLECTION -->
        <th>Marketing Fee</th>
        <th class="bg-yellow-300">BANK TRANSFER FEE</th>
        <th class="bg-yellow-300">PURCHASED MATERIALS/UNIT REPAIRS/ETC</th>
        <th class="bg-yellow-300">MEMBERSHIP FEE </th>
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
        {{-- <th>CV NO.</th> --}}
        <th>Check No</th>
    </thead>
    <tbody>
        @foreach ($remittances as $index => $remittance)
        <div wire:key="remittance-field-{{ $remittance->id }}">
        <tr>
            <td class="sticky-col first-col">
                @if($remittance->unit_uuid)
                    <x-link-component link="/property/{{ $remittance->property_uuid }}/unit/{{ $remittance->unit_uuid }}/remittances">
                        {{ Str::limit(App\Models\Unit::find($remittance->unit_uuid)->unit,20) }}
                    </x-link-component>
                @endif
            </td>
            <td class="sticky-col second-col">{{ Carbon\Carbon::parse($remittance->created_at)->format('M d, Y') }}</td>
            <td class="sticky-col third-col">{{ $remittance->ar_no }}</td>
            <td class="sticky-col fourth-col">{{ $remittance->particular->particular }}</td>

            <td class="sticky-col fifth-col">
                @if($remittance->owner_uuid)
                    <x-link-component link="/property/{{ $remittance->property_uuid }}/owner/{{ $remittance->owner_uuid }}">
                        {{ Str::limit(App\Models\Owner::find($remittance->owner_uuid)->owner,20) }}
                    </x-link-component>
                @else
                    NA
                @endif
            </td>
            <td class="sticky-col sixth-col"> {{ $remittance->bank_name }}</td>
            <td class="sticky-col seventh-col"> {{ $remittance->account_name }}</td>
            <td class="sticky-col eight-col"> {{ $remittance->account_number }}</td>
            <td class="sticky-col ninth-col">
                @if($remittance->tenant_uuid)
               <a target="_blank" title="tenant" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $remittance->property_uuid }}/tenant/{{ $remittance->tenant_uuid }}">
                  {{ Str::limit(App\Models\Tenant::find($remittance->tenant_uuid)->tenant,20) }} </a>
                @else
                NA
                @endif
            </td>
            <td class="sticky-col tenth-col">
                @if($remittance->guest_uuid)
                    <x-link-component link="/property/{{ $remittance->property_uuid }}/guest/{{ $remittance->guest_uuid }}">
                       {{ Str::limit(App\Models\Guest::find($remittance->guest_uuid)->guest,20) }}
                    </x-link-component>
                @else
                    NA
                @endif
            </td>
            <td>{{ number_format($remittance->monthly_rent, 2) }}</td>
            <td>{{ number_format($remittance->net_rent, 2) }}</td>
            <td>{{ number_format($remittance->management_fee, 2) }}</td>
            <td>{{ number_format($remittance->marketing_fee, 2) }}</td>
            <td><x-table-input wire:model="remittances.{{ $index }}.bank_transfer_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.miscellaneous_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.membership_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.condo_dues" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.parking_dues" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.water" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.electricity" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.generator_share" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.surcharges" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.building_insurance" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.real_property_tax" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.housekeeping_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.laundry_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.complimentary" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.internet" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.special_assessment" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
             <td><x-table-input wire:model="remittances.{{ $index }}.materials_recovery_facility" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.recharge_of_fire_extinguisher" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.environmental_fee" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.bladder_tank" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td><x-table-input wire:model="remittances.{{ $index }}.cause_of_magnet" wire:change="updateRemittance({{ $remittance->id }})" type="number" step="0.001"/></td>
            <td>{{ number_format($remittance->total_deductions, 2) }}</td>
            <td>{{ number_format($remittance->remittance, 2) }}</td>
            {{-- <td><x-table-input wire:model="remittances.{{ $index }}.cv_no" wire:change="updateRemittance({{ $remittance->id }})" type="text"/></td> --}}
            <td><x-table-input wire:model="remittances.{{ $index }}.check_no" wire:change="updateRemittance({{ $remittance->id }})" type="text"/></td>
        </tr>
        </div>
        @endforeach
    </tbody>
</table>
