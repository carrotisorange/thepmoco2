@extends('layouts.export')
@section('title', 'Remittances')
@section('content')
<p>
    Date: {{ Carbon\Carbon::parse($date)->format('M, Y') }}
</p>
<p>
    Total Count: {{ $remittances->count() }}
</p>
<p>
    Total Amount: {{ number_format($remittances->sum('remittance'), 2) }}
</p>
<p>
<table class="">
    <tr>
        <x-th>#</x-th>
        <x-th>Owner</x-th>
        <x-th>Tenant</x-th>
        <x-th>Guest</x-th>
        <x-th>Unit #</x-th>
        <x-th>AR #</x-th>
        {{-- <x-th>Rent</x-th>


        <x-th>Marketing Fee</x-th> --}}
        <x-th>Rent</x-th>
        <x-th>Management Fee</x-th>
        @if(Session::get('bank_transfer_fee'))
        <x-th>Bank Transfer Fee</x-th>
        @endif
        @if(Session::get('miscellaneous_fee'))
        <x-th>Purchased Materials</x-th>
        @endif
        @if(Session::get('membership_fee'))
        <x-th>Membership Fee</x-th>
        @endif
        @if(Session::get('condo_dues'))
        <x-th>Condo Dues</x-th>
        @endif

        @if(Session::get('parking_dues'))
        <x-th>Parking Dues</x-th>
        @endif
        @if(Session::get('water'))
        <x-th>Water</x-th>
        @endif
        @if(Session::get('electricity'))
        <x-th>Electric</x-th>
        @endif
        @if(Session::get('generator_share'))
        <x-th>Generator Share</x-th>
        @endif

        @if(Session::get('surcharges'))
        <x-th>Surcharges</x-th>
        @endif
        @if(Session::get('building_insurance'))
        <x-th>Building Insurance</x-th>
        @endif
        @if(Session::get('real_property_tax'))
        <x-th>Real Property Tax</x-th>
        @endif
        @if(Session::get('housekeeping_fee'))
        <x-th>Housekeeping Fee</x-th>
        @endif

        @if(Session::get('laundry_fee'))
        <x-th>Laundry Fee</x-th>
        @endif
        @if(Session::get('complimentary'))
        <x-th>Complimentary</x-th>
        @endif
        @if(Session::get('internet'))
        <x-th>Internet</x-th>
        @endif
        @if(Session::get('special_assessment'))
        <x-th>Special Assessment</x-th>
        @endif

        @if(Session::get('materials_recovery_facility'))
        <x-th>Materials Recovery Facility</x-th>
        @endif
        @if(Session::get('recharge_of_fire_extinguisher'))
        <x-th>Recharge of Fire Extinguisher</x-th>
        @endif
        @if(Session::get('environmental_fee'))
        <x-th>Environmental Fee</x-th>
        @endif
        {{-- @if(Session::get('bladder_tank'))
        <x-th>Bladder Tank</x-th>
        @endif
        @if(Session::get('cause_of_magnet'))
        <x-th>Cause of Magnet</x-th>
        @endif --}}
        @if(Session::get('bank_transfer_fee'))
        <x-th>Remittance</x-th>
        @endif
    </tr>
    <tr>
        <x-th>Total</x-th>
        <x-th></x-th>
        <x-th></x-th>
        <x-th></x-th>
        <x-th></x-th>
        <x-th></x-th>
        {{-- <x-td>{{ number_format($remittances->sum('monthly_rent'), 2) }}</x-td>


        <x-td>{{ number_format($remittances->sum('marketing_fee'), 2) }}</x-td> --}}
        <x-td>{{ number_format($remittances->sum('monthly_rent'), 2) }}</x-td>
        <x-td>{{ number_format($remittances->sum('management_fee'), 2) }}</x-td>
        @if(Session::get('bank_transfer_fee'))
        <x-td>{{ number_format($remittances->sum('bank_transfer_fee'), 2) }}</x-td>
        @endif
        @if(Session::get('miscellaneous_fee'))
        <x-td>{{ number_format($remittances->sum('miscellaneous_fee'), 2) }}</x-td>
        @endif
        @if(Session::get('membership_fee'))
        <x-td>{{ number_format($remittances->sum('membership_fee'), 2) }}</x-td>
        @endif
        @if(Session::get('condo_dues'))
        <x-td>{{ number_format($remittances->sum('condo_dues'), 2) }}</x-td>
        @endif

        @if(Session::get('parking_dues'))
        <x-td>{{ number_format($remittances->sum('parking_dues'), 2) }}</x-td>
        @endif
        @if(Session::get('water'))
        <x-td>{{ number_format($remittances->sum('water'), 2) }}</x-td>
        @endif
        @if(Session::get('electricity'))
        <x-td>{{ number_format($remittances->sum('electricity'), 2) }}</x-td>
        @endif
        @if(Session::get('generator_share'))
        <x-td>{{ number_format($remittances->sum('generator_share'), 2) }}</x-td>
        @endif

        @if(Session::get('surcharges'))
        <x-td>{{ number_format($remittances->sum('surcharges'), 2) }}</x-td>
        @endif
        @if(Session::get('building_insurance'))
        <x-td>{{ number_format($remittances->sum('building_insurance'), 2) }}</x-td>
        @endif
        @if(Session::get('real_property_tax'))
        <x-td>{{ number_format($remittances->sum('real_property_tax'), 2) }}</x-td>
        @endif
        @if(Session::get('housekeeping_fee'))
        <x-td>{{ number_format($remittances->sum('housekeeping_fee'), 2) }}</x-td>
        @endif

        @if(Session::get('laundry_fee'))
        <x-td>{{ number_format($remittances->sum('laundry_fee'), 2) }}</x-td>
        @endif
        @if(Session::get('complimentary'))
        <x-td>{{ number_format($remittances->sum('complimentary'), 2) }}</x-td>
        @endif
        @if(Session::get('internet'))
        <x-td>{{ number_format($remittances->sum('internet'), 2) }}</x-td>
        @endif
        @if(Session::get('special_assessment'))
        <x-td>{{ number_format($remittances->sum('special_assessment'), 2) }}</x-td>
        @endif

        @if(Session::get('materials_recovery_facility'))
        <x-td>{{ number_format($remittances->sum('materials_recovery_facility'), 2) }}</x-td>
        @endif
        @if(Session::get('recharge_of_fire_extinguisher'))
        <x-td>{{ number_format($remittances->sum('recharge_of_fire_extinguisher'), 2) }}</x-td>
        @endif
        @if(Session::get('environmental_fee'))
        <x-td>{{ number_format($remittances->sum('environmental_fee'), 2) }}</x-td>
        @endif
        {{-- @if(Session::get('bladder_tank'))
        <x-td>{{ number_format($remittances->sum('bladder_tank'), 2) }}</x-td>
        @endif
        @if(Session::get('cause_of_magnet'))
        <x-td>{{ number_format($remittances->sum('cause_of_magnet'), 2) }}</x-td>
        @endif --}}
        @if(Session::get('bank_transfer_fee'))
        <x-td>{{ number_format($remittances->sum('remittance'), 2) }}</x-td>
        @endif
    </tr>
    @foreach($remittances as $index=> $item)
    <tr>
        <x-td>{{ $index+1 }}</x-td>
        <x-td>{{ Str::limit($item->owner->owner,15) }}</x-td>
        <x-td>{{ Str::limit($item->tenant->tenant,15) }}</x-td>
        <x-td>{{ Str::limit($item->guest->guest,15) }}</x-td>
        <x-td>{{ Str::limit($item->unit->unit, 15) }}</x-td>
        <x-td>{{ $item->ar_no }}</x-td>
        {{-- </x-td>
        <x-td>{{ number_format($item->net_rent, 2) }}</x-td>

        <x-td>{{ number_format($item->marketing_fee, 2) }}</x-td> --}}
        <x-td>{{ number_format($item->monthly_rent, 2) }} </x-td>
        <x-td>{{ number_format($item->management_fee, 2) }}</x-td>
        @if(Session::get('bank_transfer_fee'))
        <x-td>{{ number_format($item->bank_transfer_fee, 2) }}</x-td>
        @endif
        @if(Session::get('miscellaneous_fee'))
        <x-td>{{ number_format($item->miscellaneous_fee, 2) }}</x-td>
        @endif
        @if(Session::get('membership_fee'))
        <x-td>{{ number_format($item->membership_fee, 2) }}</x-td>
        @endif
        @if(Session::get('condo_dues'))
        <x-td>{{ number_format($item->condo_dues, 2) }}</x-td>
        @endif

        @if(Session::get('parking_dues'))
        <x-td>{{ number_format($item->parking_dues, 2) }}</x-td>
        @endif
        @if(Session::get('water'))
        <x-td>{{ number_format($item->water, 2) }}</x-td>
        @endif
        @if(Session::get('electricity'))
        <x-td>{{ number_format($item->electricity, 2) }}</x-td>
        @endif
        @if(Session::get('generator_share'))
        <x-td>{{ number_format($item->generator_share, 2) }}</x-td>
        @endif

        @if(Session::get('surcharges'))
        <x-td>{{ number_format($item->surcharges, 2) }}</x-td>
        @endif
        @if(Session::get('building_insurance'))
        <x-td>{{ number_format($item->building_insurance, 2) }}</x-td>
        @endif
        @if(Session::get('real_property_tax'))
        <x-td>{{ number_format($item->real_property_tax, 2) }}</x-td>
        @endif
        @if(Session::get('housekeeping_fee'))
        <x-td>{{ number_format($item->housekeeping_fee, 2) }}</x-td>
        @endif

        @if(Session::get('laundry_fee'))
        <x-td>{{ number_format($item->laundry_fee, 2) }}</x-td>
        @endif
        @if(Session::get('complimentary'))
        <x-td>{{ number_format($item->complimentary, 2) }}</x-td>
        @endif
        @if(Session::get('internet'))
        <x-td>{{ number_format($item->internet, 2) }}</x-td>
        @endif
        @if(Session::get('special_assessment'))
        <x-td>{{ number_format($item->special_assessment, 2) }}</x-td>
        @endif

        @if(Session::get('materials_recovery_facility'))
        <x-td>{{ number_format($item->materials_recovery_facility, 2) }}</x-td>
        @endif
        @if(Session::get('recharge_of_fire_extinguisher'))
        <x-td>{{ number_format($item->recharge_of_fire_extinguisher, 2) }}</x-td>
        @endif
        @if(Session::get('environmental_fee'))
        <x-td>{{ number_format($item->environmental_fee, 2) }}</x-td>
        @endif
        {{-- @if(Session::get('bladder_tank'))
        <x-td>{{ number_format($item->bladder_tank, 2) }}</x-td>
        @endif
        @if(Session::get('cause_of_magnet'))
        <x-td>{{ number_format($item->cause_of_magnet, 2) }}</x-td>
        @endif --}}
        @if(Session::get('bank_transfer_fee'))
        <x-td>{{ number_format($item->remittance, 2) }}</x-td>
        @endif
    </tr>
    @endforeach
</table>
</p>
@endsection
