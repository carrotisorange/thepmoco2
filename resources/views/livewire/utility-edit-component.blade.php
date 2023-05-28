<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Utilities / {{ $option }}</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button wire:click="returnToUtilitiesPage" wire:loading.remove
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">Go back and delete utilities
                </button>
      
                <button type="submit" wire:click="postUtilities" wire:loading.remove
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Post Utilities
                </button>
              
                <button type="button" wire:loading disabled
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Loading...
                </button>
            
            </div>
        </div>
        {{-- @if(!$this->min_charge) --}}

        {{-- <div class="mt-5 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="sm:col-span-2">
                <label for="">Start date</label>
                <input type="date" id="start_date" wire:model="start_date"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>

            </div>
            <div class="sm:col-span-2">
                <label for="">End date</label>
                <input type="date" id="end_date" wire:model="end_date"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>

            </div>
            <div class="sm:col-span-1">
                <label for="">
                    Rate
                </label>
                <input type="text" id="kwh" wire:model="kwh"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>

            </div>
            <div class="sm:col-span-1">
                <label for="">Mininum Charge</label>
                <input type="text" id="min_charge" wire:model="min_charge"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>

            </div>
            <div class="sm:col-span-6">

                <p class="text-right">
                    <button type="button" data-modal-toggle="instructions-update-utility-parameter-modal"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Parameters
                    </button>
                    <button type="button" wire:loading disabled wire:target="updateParameters"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Loading...
                    </button>
                </p>
            </div>

        </div> --}}

        <div class="mt-3 -my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div>
                    <p class="mt-3 text-sm text-center text-gray-500">
                        Showing
                        <span class="font-medium">{{ $utilities->count() }}</span>

                        {{Str::plural('utility', $utilities->count())}}

                    </p>

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

                </div>
               
            </div>
        </div>
    </div>
    @include('layouts.notifications')
    @include('modals.instructions.update-utility-parameter-modal')
</div>