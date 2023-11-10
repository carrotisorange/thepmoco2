<div>
    <div class="px-4 sm:px-6 lg:px-8">
        <form wire:submit.prevent="storeAccountPayableLiquidation">
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <x-th>Batch No </x-th>
                                    <x-td >{{ $batch_no }}  </x-td>
                                </tr>
                                <tr>
                                    <x-th> Date Requested </x-th>
                                    <x-td >
                                        <x-form-input id="created_at" name="created_at" type="date" wire:model="created_at" />
                                        <x-validation-error-component name='crated_at' />
                                    </x-td>
                                </tr>
                                <tr>
                                    <x-th> Name </x-th>
                                    <x-td>
                                        <x-form-input id="name" name="name" type="name" autocomplete="name" wire:model="name"/>
                                        <x-validation-error-component name='name' />
                                    </x-td>
                                </tr>
                                <tr>
                                    <x-th> Department/Section   </x-th>
                                    <x-td>
                                        <x-form-select wire:model="department">
                                            <option value="" selected>Select a unit</option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->role }}" {{ $department===$department->role?
                                                'selected' : '' }}>
                                                {{ $department->role }}
                                            </option>
                                            @endforeach
                                        </x-form-select>
                                      <x-validation-error-component name='department' />
                                    </x-td>
                                </tr>
                                <tr>
                                    <x-th> Unit </x-th>
                                    <x-td>
                                        <x-form-select wire:model="unit_uuid">
                                            <option value="" selected>Select a unit</option>
                                            @foreach ($units as $unit)
                                            <option value="{{ $unit->uuid }}" {{ 'particulars' .$unit_uuid===$unit->
                                                uuid? 'selected' : '' }}>
                                                {{ $unit->building->building .'-'.$unit->unit }}
                                            </option>
                                            @endforeach
                                        </x-form-select>
                                      <x-validation-error-component name='unit_uuid' />
                                    </x-td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <div class="px-6 pt-5 flex justify-end items-center">
        <x-button  wire:click="storeNewItem">
            New Particular
        </x-button>
    </div>
    <div class="sm:col-span-6">
        <div class="mb-5 mt-2 relative overflow-auto ring-opacity-5 md:rounded-lg">
            <x-table-component>
                <x-table-head-component>
                    <tr>
                        <x-th>#</x-th>
                        <x-th>UNIT</x-th>
                        <x-th>VENDOR</x-th>
                        <x-th>OR NUMBER </x-th>
                        <x-th>ITEM</x-th>
                        <x-th>QUANTITY</x-th>
                        <x-th>AMOUNT</x-th>
                        <x-th>TOTAL</x-th>
                        <x-th></x-th>
                    </tr>
                </x-table-head-component>
                <x-table-body-component>
                    @foreach($particulars as $index => $particular)
                    <div wire:key="particular-field-{{ $particular->id }}">
                        <tr>
                            <x-td>{{ $index+1 }}</x-td>
                            <x-td>
                                <x-table-select wire:model="particulars.{{ $index }}.unit_uuid"
                                    wire:change="updateParticular({{ $particular->id }})">
                                    <option value="" selected>Select a unit</option>
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->uuid }}" {{ 'particulars' .$index.'unit_uuid'===$unit->
                                        uuid? 'selected' : '' }}>
                                        {{ $unit->building->building .'-'.$unit->unit }}
                                    </option>
                                    @endforeach
                                </x-table-select>
                                <x-validation-error-component name='particulars.{{ $index }}.unit_uuid' />
                            </x-td>
                            <x-td>
                                <x-table-select wire:model="particulars.{{ $index }}.vendor_id"
                                    wire:change="updateParticular({{ $particular->id }})">
                                    <option value="" selected>Select a unit</option>
                                    @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}" {{ 'particulars' .$index.'vendor_id'===$vendor->
                                        id? 'selected' : '' }}>{{
                                        $vendor->biller }}
                                    </option>
                                    @endforeach
                                </x-table-select>
                               <x-validation-error-component name='particulars.{{ $index }}.vendor_id' />
                            </x-td>
                            <x-td>
                                <x-table-input type="text" wire:model="particulars.{{ $index }}.or_number" wire:change="updateParticular({{ $particular->id }})" />
                                <x-validation-error-component name='particulars.{{ $index }}.or_number' />
                            </x-td>
                            <x-td>
                                <x-form-input type="text" wire:model="particulars.{{ $index }}.item" wire:change="updateParticular({{ $particular->id }})"/>
                                <x-validation-error-component name='particulars.{{ $index }}.item' />
                            </x-td>
                            <x-td>
                                <x-form-input type="number" wire:model="particulars.{{ $index }}.quantity" wire:change="updateParticular({{ $particular->id }})"/>
                                <x-validation-error-component name='particulars.{{ $index }}.quantity' />
                            </x-td>
                            <x-td>
                                <x-form-input type="number" step="0.001" wire:model="particulars.{{ $index }}.price" wire:change="updateParticular({{ $particular->id }})"/>
                                <x-validation-error-component name='particulars.{{ $index }}.price' />
                            </x-td>
                            <x-td>
                                {{ number_format((double)$particular->quantity * (double)$particular->price, 2) }}
                            </x-td>
                            <x-td>
                                <x-button class="bg-red-500" wire:click="removeParticular({{ $particular->id }})"> Remove </x-button>
                            </x-td>
                        </tr>
                    </div>
                    @endforeach
                </x-table-body-component>
            </x-table-component>
        </div>
    </div>
    <div>
        <div class="cols-start-3 mt-10 space-y-3 0 pb-3 sm:space-y-0 sm:divide-y sm:pb-0">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-3">
                <x-label for="total" >Liquidation Total</x-label>
                <div class="mt-2 sm:col-start-3 sm:mt-0">
                    {{ number_format((double)($total),2) }}
                </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <x-label for="cash_advance" >Cash Advance</x-label>
                CV Number: {{ $accountpayableliquidation }}
                <div class="mt-2 sm:col-start-3 sm:mt-0">
                    <x-form-input id="cash_advance" name="cash_advance" type="number" step="0.001" autocomplete="cash_advance" wire:model="cash_advance" />
                    <x-validation-error-component name='cash_advance' />
                </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                <label for="total_amount" >Total Return</label>
                <div class="mt-2 sm:col-start-3 sm:mt-0">
                    <div class="mt-2 sm:col-start-3 sm:mt-0">
                        {{ number_format(((double)$total-(double)$cash_advance),2) }}
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p class="mt-5 px-6 text-right">
                <x-button wire:click="skipLiquidation">
                    Skip
                </x-button>
                <x-button type="submit">
                    Confirm
                </x-button>
            </p>
        </div>
    </div>
</div>
