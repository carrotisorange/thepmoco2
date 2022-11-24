<form class="mt-5 sm:pb-6 xl:pb-8" id="edit-form" wire:submit.prevent="updateForm()">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <x-th>#</x-th>
                <x-th></x-th>
                <x-th>UNIT # </x-th>
                <x-th>START DATE</x-th>
                <x-th>END DATE </x-th>
                <x-th>PREVIOUS READING</x-th>
                <x-th>CURRENT READING</x-th>
                <x-th>CURRENT CONSUMPTION</x-th>
                <x-th>KW/H</x-th>
                <x-th>MIN CHARGE</x-th>
                <x-th>AMOUNT DUE</x-th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($utilities as $index => $item)
            <div wire:key="utility-field-{{ $item->id }}">
                <tr>
                    <x-th>
                        {{ $index+1 }}
                    </x-th>
                    <x-td>
                        {{-- <div class="flex items-center">
                            <x-input type="checkbox" wire:model="selectedUtilities.{{ $item->id }}" />
                        </div> --}}
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="text" value="{{ $item->unit_uuid }}" readonly />

                        {{-- <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                            href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/bills">
                            {{ $item->unit_uuid }}
                        </a> --}}
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="utilities.{{ $index }}.start_date" />
                        @error('utilities.{{ $index }}.start_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="utilities.{{ $index }}.end_date" />
                        @error('utilities.{{ $index }}.end_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.previous_reading" />
                        @error('utilities.{{ $index }}.previous_reading')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001" wire:model="utilities.{{ $index }}.current_reading" />
                        @error('utilities.{{ $index }}.current_reading')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001" wire:model="utilities.{{ $index }}.current_consumption" />
                        @error('utilities.{{ $index }}.current_consumption')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001" wire:model="utilities.{{ $index }}.kwh" />
                        @error('utilities.{{ $index }}.kwh')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001" wire:model="utilities.{{ $index }}.min_charge" />
                        @error('utilities.{{ $index }}.min_charge')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001" wire:model="utilities.{{ $index }}.total_amount_due"
                            readonly />
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