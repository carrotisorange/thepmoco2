<div>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
    
    

            <div class=" p-4 purple" id="remittance-summary" role="tabpanel" aria-labelledby="remittance-summary-tab">
    
                <div class="sm:flex sm:items-center justify-between space-x-6 pb-8">
                    <div class="underline text-sm text-purple-500">Go back to Unit</div>
                    <div class="px-8 text-xl font-medium">
                        Unit <b>{{ $unit->unit }}</b> Remittance
                    </div>
    
                    <div class="flex justify-end w-full px-10">
                        <p class="text-sm font-light">Filter by Month:</p>
    
                        <select id="small" wire:model="remittanceDate"
                            class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
    
                          @foreach ($dates as $date)
                            {{-- @if(Carbon\Carbon::parse($date->created_at)->format('M, Y') != Carbon\Carbon::parse($remittance_date)->format('M, Y')) --}}

                            <option value="{{ $date->created_at }}">{{ Carbon\Carbon::parse($date->created_at)->format('M, Y') }}</option>
                            {{-- @endif --}}
                            @endforeach
                        </select>
                    </div>
    
                    <button class="px-2 py-1 rounded-full text-sm text-center w-56 text-white bg-purple-500">Send to
                        Owner</button>
    
                </div>
    
    
    
                <div>
                
    
                    <div class="flex items-center px-8 py-5 border-b">
                        <div class="w-0 flex-1 pt-0.5">
                            <div class="grid grid-cols-2">
                                <p class="text-sm font-medium text-gray-900">Total Amount Collected
                                </p>
                                <p class="mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->monthly_rent+ $remittance->marketing_fee+ $remittance->management_fee, 2)}}
                                </p>
                            </div>
                        </div>
                    </div>
    
                    <div class="flex items-center px-8 py-5 border-b">
                        <div class="w-0 flex-1 pt-0.5">
                            <div class="grid grid-cols-2">
                                <p class="text-sm font-medium text-gray-900">Total Rent
                                </p>
                                <p class="mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->monthly_rent, 2)}}
                                </p>
                            </div>
                        </div>
                    </div>
    
                    <div class="flex items-center px-8 py-5 border-b">
                        <div class="w-0 flex-1 pt-0.5">
                            <div class="grid grid-cols-2">
                                <p class="text-sm font-medium text-gray-900">Total Deductions
                                </p>
                                <p class="mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->total_deductions, 2)}}
                                </p>
                            </div>
                        </div>
                    </div>
    
                    <div class="flex items-center px-8 py-5 border-b">
                        <div class="w-0 flex-1 pt-0.5">
                            <p class="flex-col mt-1 text-sm font-base text-gray-500">
    
                            </p>
                            <div class="grid grid-cols-3 space-x-5">
    
                                <p class="ml-5 flex-col mt-1 text-sm font-base text-gray-500">
                                    Bank Transfer Fee
                                </p>
    
                                <input class="w-full text-xs border border-gray-400 py-2 my-2" disabled/>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->bank_transfer_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Management Fee
                                </p>

                                <input class="w-full text-xs border border-gray-400 py-2 my-2" disabled/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->management_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Marketing Fee
                                </p>

                                <input class="w-full text-xs border border-gray-400 py-2 my-2" disabled/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->marketing_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Purchased Materials/Unit Repairs/Etc
                                </p>

                                <input wire:model="miscellaneousFeeDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->miscellaneous_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Membership Fee
                                </p>

                                <input wire:model="membershipFeeDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->membership_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Condo Dues
                                </p>

                                <input wire:model="condoDuesDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->condo_dues, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Parking Dues
                                </p>

                                <input wire:model="parkingDuesDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->parking_dues, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Water
                                </p>

                                <input wire:model="waterDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->water, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Electricity
                                </p>

                                <input wire:model="electricityDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->electricity, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Generator Share
                                </p>
                                
                                <input wire:model="generatorShareDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->generator_share, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Surcharges
                                </p>

                                <input wire:model="surchargesDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->surcharges, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Building Insurance
                                </p>

                                <input wire:model="buildingInsuranceDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->building_insurance, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Real Property Tax
                                </p>

                                <input wire:model="realPropertyTaxDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->real_property_tax, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Housekeeping Fee
                                </p>

                                <input wire:model="housekeepingFeeDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->housekeeping_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Laundry Fee
                                </p>

                                <input wire:model="laundryFeeDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->laundry_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Complimentary
                                </p>

                                <input wire:model="complimentaryDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                               <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->complimentary, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Internet
                                </p>
                                <input wire:model="internetDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->internet, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Special Assessment
                                </p>

                                <input wire:model="specialAssessmentDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->special_assessment, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Materials Recovery Facility
                                </p>

                                <input wire:model="materialRecoveryFacilityDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->materials_recovery_facility, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Recharge of Fire Extinguisher
                                </p>

                                <input wire:model="rechargeOfFireExtinguisherDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->recharge_of_fire_extinguisher, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Environmental Fee
                                </p>

                                <input wire:model="environmentalFeeDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->environmental_fee, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Bladder Tank
                                </p>

                                <input wire:model="bladderTankDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->bladder_tank, 2)}}
                                </p>
    
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    Cause of Magnet
                                </p>

                                <input wire:model="causeOfMagnetDescription" wire:change='updateRemittance({{ $remittance->id }})' class="w-full text-xs border border-gray-400 py-2 my-2"/>
                                <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->cause_of_magnet, 2)}}
                                </p>         
    
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center px-8 py-5">
                        <div class="w-0 flex-1 pt-0.5">
                            <div class="grid grid-cols-2">
                                <p class="text-sm font-medium text-gray-900">Total Remittance
                                </p>
                                <p class="mt-1 text-sm font-base text-gray-500">
                                    {{ number_format($remittance->remittance,2) }}
                                </p>
                            </div>
                        </div>
                    </div>
    
    
    
                </div>
            </div>
    
        </div>
    </div>
    @include('layouts.notifications')
</div>
