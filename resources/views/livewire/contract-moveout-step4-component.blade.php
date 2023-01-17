<div>
    @if(!$wallets->count())
    <form action="#" method="POST" wire:submit.prevent="submitForm">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-2 gap-6">

                    <div class="col-span-2">
                        <label for="tenant" class="block text-sm font-medium text-gray-700">
                            Tenant</label>
                        <input type="text" value="{{ $contract->tenant->tenant }}" readonly
                            class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    <div class="col-span-2">
                        <label for="moveout_at" class="block text-sm font-medium text-gray-700">Amount to be
                            refunded</label>
                        <input type="number" value="{{ $wallets->sum('amount') }}" readonly
                            class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    <div class="col-span-2">
                        <label for="moveout_reason" class="block text-sm font-medium text-gray-700">Options</label>
                        <div class="mt-1">
                            <select
                                class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md"
                                name="moveout_reason" id="moveout_reason" required>
                                <option value="" selected>Select one</option>
                                <option value="pickup">Pickup</option>
                                <option value="deposit">Deposit</option>
                            </select>

                            @error('moveout_reason')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="col-span-1">
                        <label for="moveout_at" class="block text-sm font-medium text-gray-700">Bank Name</label>
                        <input type="text" value="" readonly
                            class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    <div class="col-span-1">
                        <label for="moveout_at" class="block text-sm font-medium text-gray-700">Account Number</label>
                        <input type="text" value="" readonly
                            class="mt-1 focus:ring-purple-500 focus:border-purple-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>
                </div>
                <div class="px-4 py-3 text-right sm:px-6">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                        href="{{ url()->previous() }}">
                        Back
                    </a>
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Finish
                    </button>
                </div>
            </div>
    </form>
    @else
    <div class="mt-10 text-center mb-10">
        <i class="fa-solid fa-circle-check"></i>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No amount to be refunded.</h3>
        {{-- <p class="mt-1 text-sm text-gray-500">Tenant is now ready to moveout.</p> --}}
        <div class="mt-6">
            <button type="button" wire:click="submitForm()"
                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Finish
            </button>

        </div>
    </div>
    @endif


</div>