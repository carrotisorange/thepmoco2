<div>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Utilities / {{ $option }}</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button class="bg-red-500" wire:click="returnToUtilitiesPage">Cancel
                </x-button>
                <x-button wire:click="postUtilities">Confirm
                </x-button>
            </div>
        </div>

        <div class="mt-3 -my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div>
                    {{-- <p class="mt-3 text-sm text-center text-gray-500">
                        Showing
                        <span class="font-medium">{{ $utilities->count() }}</span>

                        {{Str::plural('utility', $utilities->count())}}

                    </p> --}}
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
                                        <x-table-input form="edit-form" type="text"
                                            value="{{ App\Models\Unit::find($item->unit_uuid)->unit }}" readonly />
                                    </x-td>
                                    {{-- <x-td> --}}
                                        <x-table-input form="edit-form" type="hidden"
                                            wire:model="utilities.{{ $index }}.start_date"
                                            wire:change="updateUtilities({{ $item->id }})" readonly />
                                        @error('utilities.{{ $index }}.start_date')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        {{--
                                    </x-td> --}}
                                    {{-- <x-td> --}}
                                        <x-table-input form="edit-form" type="hidden"
                                            wire:model="utilities.{{ $index }}.end_date"
                                            wire:change="updateUtilities({{ $item->id }})" readonly />
                                        @error('utilities.{{ $index }}.end_date')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        {{--
                                    </x-td> --}}
                                    <x-td>
                                        <x-table-input form="edit-form" type="number" step="0.001"
                                            wire:model="utilities.{{ $index }}.previous_reading"
                                            wire:change="updateUtilities({{ $item->id }})" />
                                        @error('utilities.{{ $index }}.previous_reading')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </x-td>
                                    <x-td>
                                        <x-table-input form="edit-form" type="number" step="0.001"
                                            wire:model="utilities.{{ $index }}.current_reading"
                                            wire:change="updateUtilities({{ $item->id }})" />
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
                                            wire:model="utilities.{{ $index }}.kwh"
                                            wire:change="updateUtilities({{ $item->id }})" />

                                        @error('utilities.{{ $index }}.kwh')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </x-td>
                                    <x-td>
                                        <x-table-input form="edit-form" type="number" step="0.001"
                                            wire:model="utilities.{{ $index }}.min_charge"
                                            wire:change="updateUtilities({{ $item->id }})" />

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
                </div>
            </div>
        </div>
    </div>
    @include('modals.instructions.update-utility-parameter-modal')
</div>