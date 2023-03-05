<form class="mt-5 sm:pb-6 xl:pb-8">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                <x-th>UNIT </x-th>
                <x-th>PREVIOUS READING</x-th>
                <x-th>CURRENT READING </x-th>
                <x-th>CONSUMPTION</x-th>
                <x-th>RATE</x-th>
                <x-th>MIN CHARGE</x-th>
                <x-th>AMOUNT DUE</x-th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <x-td>TOTAL </x-td>
                <x-td>{{ number_format($utilities->sum('previous_reading'), 2) }}</x-td>
                <x-td>{{ number_format($utilities->sum('current_reading'), 2) }}</x-td>
                <x-td>{{ number_format($utilities->sum('current_consumption'), 2) }}</x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td>{{ number_format($utilities->sum('total_amount_due'), 2) }}</x-td>

            </tr>
        </tbody>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($utilities as $index => $item)
            <div wire:key="utility-field-{{ $item->id }}">
                <tr>
                    <x-td>
                        <x-table-input form="edit-form" type="text" value="{{ $item->unit }}" readonly />
                    </x-td>
                    {{-- <x-td> --}}
                        <x-table-input form="edit-form" type="hidden" wire:change="updateUtilities({{ $item->id }})"
                            wire:model="utilities.{{ $index }}.start_date" readonly />
                        @error('utilities.{{ $index }}.start_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        {{--
                    </x-td> --}}
                    {{-- <x-td> --}}
                        <x-table-input form="edit-form" type="hidden" wire:model="utilities.{{ $index }}.end_date"
                            wire:change="updateUtilities({{ $item->id }})" readonly />
                        @error('utilities.{{ $index }}.end_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        {{--
                    </x-td> --}}
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:keyup="updateUtilities({{ $item->id }})" 
                            wire:model.debounce.500ms="utilities.{{ $index }}.previous_reading" />
                        @error('utilities.{{ $index }}.previous_reading')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:keyup="updateUtilities({{ $item->id }})" 
                            wire:model.debounce.500ms="utilities.{{ $index }}.current_reading" />
                        @error('utilities.{{ $index }}.current_reading')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.current_consumption" readonly />

                        @error('utilities.{{ $index }}.current_consumption')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:keyup="updateUtilities({{ $item->id }})" 
                            wire:model.debounce.500ms="utilities.{{ $index }}.kwh" />
                 
                        @error('utilities.{{ $index }}.kwh')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                          wire:keyup="updateUtilities({{ $item->id }})" 
                        wire:model.debounce.500ms="utilities.{{ $index }}.min_charge" />
                        
                        @error('utilities.{{ $index }}.min_charge')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    

                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.total_amount_due" readonly />

                        @error('utilities.{{ $index }}.total_amount_due')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>

                </tr>

            </div>
            @endforeach

        </tbody>
    </table>
</form>