<div>
    <div class="p-8 bg-white border-b border-gray-200">
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
            <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="mt-1 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label for="particular_id" class="block text-sm font-medium text-gray-700">Particular
                                </label>
                                @if($particular_id == '5')
                                <input type="text" value="water" readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                @else
                                <input type="text" value="electric" readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                @endif


                            </div>

                            <div class="col-span-2">
                                <label for="total_amount_due" class="block text-sm font-medium text-gray-700">Amount
                                    Due</label>
                                <input type="text" wire:model="total_amount_due" readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                @error('total_amount_due')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-span-2">
                                <label for="type" class="block text-sm font-medium text-gray-700">Bill to</label>
                                <input type="text" value="{{ $type }}" readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">

                            </div>

                            @if($type==='tenant')

                            <div class="col-span-2">
                                <label for="" class="block text-sm font-medium text-gray-700">Bill Split (Divide the
                                    bill among the active tenants.)</label>
                                <select wire:model="isBillSplit"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                    <option value="yes" {{ old('isBillSplit',
                                        $isBillSplit)=="yes" ? 'selected' : 'selected' }}>
                                        yes
                                    </option>
                                    <option value="no" {{ old('isBillSplit',
                                        $isBillSplit)=="no" ? 'selected' : 'selected' }}>
                                        no
                                    </option>
                                </select>
                                {{-- <input type="text" value="Yes"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md"> --}}

                            </div>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-10">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="{{ url()->previous() }}">
                        Cancel
                    </a>


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
                        Post Bill to {{ $type }}
                    </button>

                </div>
            </div>




        </form>

    </div>
</div>