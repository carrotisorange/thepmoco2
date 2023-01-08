<div>

    <div>
        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">Bills / Drafts</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button onclick="window.location.href='{{ url()->previous() }}'"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        type="button">Back
                    </button>
                    <button type="submit" wire:click="postBills"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        <svg wire:loading wire:target="postBills" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Post Bills
                    </button>

                </div>
            </div>


            <div class="mt-5 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="bill_to">To whom do you want the bill to be posted?</label>

                    <select id="bill_to" wire:model="bill_to"
                        class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Please select one</option>
                        <option value="owner">owner</option>
                        <option value="tenant">tenant</option>
                    
                    </select>

                </div>

                {{-- @if($bill_to === 'tenant')
                <div class="sm:col-span-3">
                    <label for="isBillSplit">Do you want to split the bills?</label>
                  <select id="isBillSplit" wire:model="isBillSplit"
                    class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    <option value="">Please select one</option>
                    <option value="yes">yes</option>
                    <option value="no">no</option>
                
                </select>

                </div>
                @endif --}}
  
                

            </div>


            @if($bill_to)
            <div class="mt-3 -my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>
                        <div>
                            <p class="mt-3 text-sm text-center text-gray-500">
                                Showing
                                <span class="font-medium">{{ $bills->count() }}</span>

                                {{Str::plural('bill', $bills->count())}}

                            <p class="text-center">
                                <a wire:loading wire:target="updateParameters"
                                    class="text-green-500 text-decoration-line: underline" href="#/">
                                    Saving...
                                </a>
                            </p>
                            </p>
                        </div>


                        <form class="mt-5 sm:pb-6 xl:pb-8" wire:submit.prevent="">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>UNIT # </x-th>
                                        <x-th>START</x-th>
                                        <x-th>END </x-th>
                                        <x-th>PARTICULAR</x-th>
                                        <x-th>AMOUNT</x-th>
                                        @if($isBillSplit === 'yes')
                                        <x-th>SPLITTED AMOUNT</x-th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($bills as $index => $item)
                                    <div wire:key="bill-field-{{ $item->id }}">
                                        <tr>
                                            <x-th>
                                                {{ $index+1 }}
                                            </x-th>

                                            <x-td>
                                                <x-table-input form="edit-form" type="text"
                                                    value="{{ $item->unit->unit }}" readonly />
                                            </x-td>

                                            <x-td>
                                                <x-table-input form="edit-form" type="date"
                                                    wire:model="bills.{{ $index }}.start" readonly />

                                                @error('bills.{{ $index }}.start')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>

                                            <x-td>
                                                <x-table-input form="edit-form" type="date"
                                                    wire:model="bills.{{ $index }}.end" readonly />

                                                @error('bills.{{ $index }}.end')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>

                                            <x-td>
                                                <x-table-input form="edit-form" type="text"
                                                    value="{{ $item->particular->particular }}" readonly />
                                            </x-td>

                                            <x-td>
                                                <x-table-input form="edit-form" type="number" step="0.001"
                                                    wire:model="bills.{{ $index }}.bill" readonly />

                                                @error('bills.{{ $index }}.bill')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            @if($isBillSplit === 'yes')
                                           <x-td>
                                            
                                            <?php 
                                                $active_contracts = $item->unit->contracts->where('status', 'active')->count();

                                                if($active_contracts <= 0 ){
                                                    $active_contracts = 1;
                                                }

                                            ?>
                                            <x-table-input form="edit-form" type="text" value="{{ $item->bill/$active_contracts }}" readonly />
                                        
                                           
                                           </x-td>
                                           @endif
                                        </tr>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>


                    </div>
                    {{-- {{ $utilities->links() }} --}}
                </div>
            </div>
            @endif
        </div>
        @include('layouts.notifications')
    </div>
</div>