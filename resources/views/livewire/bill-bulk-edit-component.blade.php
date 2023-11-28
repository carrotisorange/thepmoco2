<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto" wire:ignore>
                <h1 class="text-3xl font-bold text-gray-500">{{ucfirst(Route::current()->getName())}}</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @if($bills->count())
                <form wire:submit.prevent="postBills">
                <x-button type="submit">
                    Post Bills
                </x-button>
                </form>
                @endif
            </div>
        </div>
        <div class="mt-3">
            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="mb-5 mt-2 relative overflow-hidden ring-opacity-5">
                            <x-table-component>
                                <x-table-head-component>
                                    <tr>
                                        <x-th># </x-th>
                                        <x-th>Reference #</x-th>
                                        <x-th>Tenant</x-th>
                                        <x-th>Owner</x-th>
                                        <x-th>Unit</x-th>
                                        <x-th>Start</x-th>
                                        <x-th>End</x-th>
                                        <x-th>Particular</x-th>
                                        <x-th>Amount</x-th>
                                    </tr>
                                </x-table-head-component>
                                <x-table-body-component>
                                    @forelse ($bills as $index => $bill)
                                    <div wire:key="bill-field-{{ $bill->id }}">
                                        <tr>
                                            <x-td>{{ $index+1 }}</x-td>
                                            <x-td>{{ $bill->bill_no }}</x-td>
                                            <x-td>
                                                <x-link-component
                                                    link="/property/{{ Session::get('property_uuid') }}/tenant/{{ $bill->tenant_uuid }}/bills">
                                                    {{ $bill->tenant->tenant }}
                                                </x-link-component>
                                            </x-td>
                                            <x-td>
                                                <x-link-component
                                                    link="/property/{{ Session::get('property_uuid') }}/owner/{{ $bill->owner_uuid }}/bills">
                                                    {{ $bill->owner->owner }}
                                                </x-link-component>
                                            </x-td>
                                            <x-td>
                                                <x-link-component
                                                    link="/property/{{ Session::get('property_uuid') }}/unit/{{ $bill->unit_uuid }}/bills">
                                                    {{ $bill->unit->unit }}
                                                </x-link-component>
                                            </x-td>

                                            <x-td>
                                                <x-table-input  type="date" wire:model="bills.{{ $index }}.start"
                                                    wire:change="updateBill({{ $bill->id }})" />
                                                <x-validation-error-component name='bills.{{ $index }}.start' />
                                            </x-td>
                                            <x-td>
                                                <x-table-input type="date" wire:model="bills.{{ $index }}.end"
                                                    wire:change="updateBill({{ $bill->id }})" />
                                                <x-validation-error-component name='bills.{{ $index }}.end' />
                                            </x-td>
                                            <x-td>
                                                <x-table-select >
                                                    <option value="{{ $bill->particular_id }}" {{ old('particular_id')==$bill->
                                                        particular_id?'selected':'Select one' }} selected>
                                                        {{ $bill->particular->particular }}
                                                    </option>
                                                </x-table-select>
                                            </x-td>
                                            <x-td>
                                                <x-table-input min="1"  type="number" wire:model="bills.{{ $index }}.bill"
                                                    wire:change="updateBill({{ $bill->id }})" />
                                                <x-validation-error-component name='bills.{{ $index }}.bill' />
                                            </x-td>
                                        </tr>
                                        @endforeach
                                </x-table-head-component>
                            </x-table-body-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
