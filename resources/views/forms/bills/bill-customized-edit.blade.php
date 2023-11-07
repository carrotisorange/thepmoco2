<form wire:submit.prevent="updateForm()">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                <x-th># </x-th>
                <x-th>Reference #</x-th>
                <x-th>Tenant</x-th>
                <x-th>Unit</x-th>
                <x-th>Start</x-th>
                <x-th>End</x-th>
                <x-th>Particular</x-th>
                <x-th>Amount</x-th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($bills as $index => $bill)
            <div wire:key="bill-field-{{ $bill->id }}">
                <tr>
                    <x-td>{{ $index+1 }}</x-td>

                     <?php
                        $tenant = App\Models\Tenant::where('uuid',$bill->tenant_uuid)->pluck('tenant')->first();
                        $unit = App\Models\Unit::where('uuid',$bill->unit_uuid)->pluck('unit')->first();
                    ?>
                    <x-td>{{ $bill->bill_no }}</x-td>

                    <x-td>
                        <x-link-component link="/property/{{ Session::get('property_uuid') }}/tenant/{{ $bill->tenant_uuid }}/bills">
                            {{ $tenant }}
                        </x-link-component>
                    </x-td>
                    <x-td>
                        <x-link-component link="/property/{{ Session::get('property_uuid') }}/unit/{{ $bill->unit_uuid }}/bills">
                            {{ $unit }}
                        </x-link-component>
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="bills.{{ $index }}.start" wire:change="updateBill({{ $bill->id }})" />
                        <x-validation-error-component name='bills.{{ $index }}.start' />
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="bills.{{ $index }}.end" wire:change="updateBill({{ $bill->id }})" />
                       <x-validation-error-component name='bills.{{ $index }}.end' />
                    </x-td>
                    <x-td>
                        <x-table-select form="edit-form">
                            <option value="{{ $bill->particular_id }}" {{ old('particular_id')==$bill->particular_id?'selected':'Select one' }} selected>
                                {{ $bill->particular->particular }}
                            </option>
                        </x-table-select>
                    </x-td>
                    <x-td>
                        <x-table-input min="1" form="edit-form" type="number" wire:model="bills.{{ $index }}.bill" wire:change="updateBill({{ $bill->id }})" />
                        <x-validation-error-component name='bills.{{ $index }}.bill' />
                    </x-td>
                </tr>
                @endforeach
        </tbody>
    </table>
</form>
