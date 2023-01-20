<form wire:submit.prevent="updateForm()">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                <x-th>
                </x-th>
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
                    <x-td>
                        <div class="flex items-center">
                            <x-input type="checkbox" wire:model="selectedBills.{{ $bill->id }}" />
                        </div>
                    </x-td>
                    <x-td>{{ $bill->unit->unit.'-'.$bill->bill_no }}</x-td>
                    <?php
                        $tenant = App\Models\Tenant::find($bill->tenant_uuid)->tenant;
                        $unit = App\Models\Unit::find($bill->unit_uuid)->unit
                    ?>
                    <x-td>
                        <a class="text-blue-500 text-decoration-line: underline"
                            href="/property/{{ Session::get('property') }}/tenant/{{ $bill->tenant_uuid }}/bills"
                            target="_blank">
                            {{ $tenant }}
                        </a>
                    </x-td>
                    <x-td>
                        <a class="text-blue-500 text-decoration-line: underline"
                            href="/property/{{ Session::get('property') }}/unit/{{ $bill->unit_uuid }}/bills">
                            {{ $unit }}
                        </a>
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="bills.{{ $index }}.start" wire:change="updateBill({{ $bill->id }})"/>
                        @error('bills.{{ $index }}.start')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="bills.{{ $index }}.end" wire:change="updateBill({{ $bill->id }})" />
                        @error('bills.{{ $index }}.end')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-select form="edit-form">
                            <option value="{{ $bill->particular_id }}" {{ old('particular_id')==$bill->particular_id
                                ?
                                'selected'
                                :
                                'Select one' }} selected>{{
                                $bill->particular->particular }}
                            </option>
                        </x-table-select>
                    </x-td>
                    <x-td>
                        <x-table-input min="1" form="edit-form" type="number" wire:model="bills.{{ $index }}.bill" wire:change="updateBill({{ $bill->id }})"/>
                        @error('bills.{{ $index }}.bill')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                </tr>
                @endforeach
        </tbody>
    </table>
</form>