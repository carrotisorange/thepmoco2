<div>
    @include('layouts.notifications')
    <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
        <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-1 md:gap-6">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="grid grid-cols-2 gap-6">

                        <div class="col-span-6">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Select a bill you
                                want to add</label>
                            <select wire:model.lazy="particular_id" autocomplete="particular_id"
                                class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Select one</option>
                                @foreach ($particulars as $particular)
                                <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                                    particular_id?
                                    'selected': 'Select one'
                                    }}>{{ $particular->particular }}</option>
                                @endforeach
                            </select>
                            @error('particular_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($particular_id)
                        <div class="col-span-1">
                            <label for="start" class="block text-sm font-medium text-gray-700">Bill Starts on</label>
                            <input type="date" wire:model.lazy="start" autocomplete="start"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            @error('start')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="end" class="block text-sm font-medium text-gray-700">Bill Ends on</label>
                            <input type="date" wire:model.lazy="end" autocomplete="end"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            @error('end')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="bill" class="block text-sm font-medium text-gray-700">Amount Due</label>
                            <input type="number" step="0.001" wire:model.lazy="bill" autocomplete="bill"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            @error('bill')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-10">



                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                    <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Save
                </button>

                <button type="button" wire:click="redirectToContractShowPage" wire:loading.remove
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                    Finish
                </button>

                <button type="button" disabled wire:loading
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                
                    Loading...
                </button>

                {{-- <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/contract/{{ $contract->uuid }}">
                    Finish
                </a> --}}
            </div>
        </div>
    </form>
    <div class="mb-10">
        <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            @if($bills->count())
            @include('tables.bills')
            @endif
        </div>
    </div>
</div>