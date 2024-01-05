@component('mail::message')
# Hi, {{ $data['owner'] }}!

Date: {{ Carbon\Carbon::parse($data['date'])->format('M, Y') }}

Unit: {{ $data['unit'] }}

CV No: {{ $data['cv_no'] }}

Cheque No: {{ $data['check_no'] }}

Amount Collected: {{ number_format($data['rent'], 2) }}

{{-- Rent: {{ number_format($data['rent'], 2) }} --}}

Deductions: {{ number_format($data['deductions'], 2) }}

--------------------------------------------------------------

Bank Transfer Fee: {{ number_format($data['bankTransferFee'], 2) }}

Management Fee: {{ number_format($data['managementFee'], 2) }}

Marketing Fee: {{ number_format($data['marketingFee'], 2) }}

Miscellaneous Fee: {{ number_format($data['miscellaneousFee'], 2) }} ({{ $data['miscellaneousFeeDescription'] }})

Membership Fee: {{ number_format($data['membershipFee'], 2) }} ({{ $data['membershipFeeDescription'] }})

Condo Dues: {{ number_format($data['condoDues'], 2) }} ({{ $data['condoDuesDescription'] }})

Parking Dues: {{ number_format($data['parkingDues'], 2) }} ({{ $data['parkingDuesDescription'] }})

Water Bill: {{ number_format($data['water'], 2) }} ({{ $data['waterDescription'] }})

Electric Bill: {{ number_format($data['electricity'], 2) }} ({{ $data['electricityDescription'] }})

Generator Share: {{ number_format($data['generatorShare'], 2) }} ({{ $data['generatorShareDescription'] }})

Surcharges: {{ number_format($data['surcharges'], 2) }} ({{ $data['surchargesDescription'] }})

Building Insurance: {{ number_format($data['buildingInsurance'], 2) }} ({{ $data['buildingInsuranceDescription'] }})

Real Property Tax: {{ number_format($data['realPropertyTax'], 2) }} ({{ $data['realPropertyTaxDescription'] }})

Housekeeping Fee: {{ number_format($data['housekeepingFee'], 2) }} ({{ $data['housekeepingFeeDescription'] }})

Laundry Fee: {{ number_format($data['laundryFee'], 2) }} ({{ $data['laundryFeeDescription'] }})

Complimentary: {{ number_format($data['complimentary'], 2) }} ({{ $data['complimentaryDescription'] }})

Internet Bill: {{ number_format($data['internet'], 2) }} ({{ $data['internetDescription'] }})

Special Assessment: {{ number_format($data['specialAssessment'], 2) }} ({{ $data['specialAssessmentDescription'] }})

Material Recovery Facility: {{ number_format($data['materialRecoveryFacility'], 2) }} ({{ $data['materialRecoveryFacilityDescription'] }})

Recharge oF Fire Extinguisher: {{ number_format($data['rechargeOfFireExtinguisher'], 2) }} ({{ $data['rechargeOfFireExtinguisherDescription'] }})

Environmental Fee: {{ number_format($data['environmentalFee'], 2) }} ({{ $data['environmentalFeeDescription'] }})

{{-- Bladder Tank: {{ number_format($data['bladderTank'], 2) }} ({{ $data['bladderTankDescription'] }})

Cause of Magnet: {{ number_format($data['causeOfMagnet'], 2) }} ({{ $data['causeOfMagnetDescription'] }}) --}}

--------------------------------------------------------------

Remittance: {{ number_format($data['remittance'], 2) }}

Regards,<br>
{{ Session::get('property') }}
<br><br>
For inquiries reach us at: {{ Session::get('property_email') }} / {{ Session::get('property_mobile') }}
<br><br>

@endcomponent
