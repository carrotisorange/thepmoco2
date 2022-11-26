<form class="mt-5 sm:pb-6 xl:pb-8" wire:submit.prevent="">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <x-th>#</x-th>
                {{-- <x-th></x-th> --}}
                <x-th>UNIT # </x-th>
                <x-th>START DATE</x-th>
                <x-th>END DATE </x-th>
                <x-th>PREVIOUS READING</x-th>
                <x-th>CURRENT READING</x-th>
                {{-- <x-th>CONSUMPTION</x-th> --}}
                <x-th>KW/H</x-th>
                <x-th>MIN CHARGE</x-th>
                {{-- <x-th>AMOUNT DUE</x-th> --}}
                {{-- <x-th></x-th> --}}
                <x-th></x-th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($utilities as $index => $item)
            <div wire:key="utility-field-{{ $item->id }}">
                <tr>
                    <x-th>
                        {{ $index+1 }}
                    </x-th>
                    {{-- <x-td>
                        <div class="flex items-center">
                            <x-input type="checkbox" wire:model="selectedUtilities.{{ $item->id }}" />
                        </div>
                    </x-td> --}}
                    <x-td>
                        <x-table-input form="edit-form" type="text" value="{{ $item->unit->unit }}" readonly />

                        {{-- <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                            href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/bills">
                            {{ $item->unit_uuid }}
                        </a> --}}
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="utilities.{{ $index }}.start_date"
                            wire:change="updateUtilities" />
                        @error('utilities.{{ $index }}.start_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="date" wire:model="utilities.{{ $index }}.end_date" 
                        wire:change="updateUtilities" />
                        @error('utilities.{{ $index }}.end_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.previous_reading" 
                            wire:change="updateUtilities"/>
                        @error('utilities.{{ $index }}.previous_reading')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.current_reading" 
                            wire:change="updateUtilities"/>
                        @error('utilities.{{ $index }}.current_reading')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    {{-- <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.current_consumption" 
                            readonly />
                        @error('utilities.{{ $index }}.current_consumption')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td> --}}
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.kwh" wire:change="updateUtilities" />
                        @error('utilities.{{ $index }}.kwh')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.min_charge" wire:change="updateUtilities"/>
                        @error('utilities.{{ $index }}.min_charge')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    {{-- <x-td>
                        <x-table-input form="edit-form" type="number" step="0.001"
                            wire:model="utilities.{{ $index }}.total_amount_due" readonly />
                        @error('utilities.{{ $index }}.total_amount_due')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td> --}}
                 
                    <x-td>
                        <a wire:loading wire:target="updateUtilities" class="text-green-500 text-decoration-line: underline" href="#/">
                            Saving...
                        </a>
                        
                        <button type="submit" wire:click="removeUtilities({{ $item->id }})"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                            <svg wire:loading wire:target="removeUtilities"
                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </x-td>
                </tr>
            </div>
            @endforeach
        </tbody>
    </table>
</form>