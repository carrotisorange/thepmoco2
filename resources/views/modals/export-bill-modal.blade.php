<div id="export-bill-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="export-bill-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" action="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/bill/export">
                @csrf

                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Download Unpaid Bills</h3>
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3">
                        <x-label for="due_date">
                            Due Date
                        </x-label>
                        <x-form-input id="due_date" type="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                            name="due_date" />

                        @error('due_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3">
                        <x-label for="due_date">
                            Total Unpaid Bills
                        </x-label>
                        {{ number_format($unpaid_bills->sum('bill'), 2) }} ({{ $unpaid_bills->count() }} bills)

                    </div>
                </div>
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3">
                        <x-label for="due_date">
                            Penalty After Due Date
                        </x-label>
                        <x-form-input id="penalty" type="number"
                            value="{{ old('penalty', ($unpaid_bills->sum('bill')*.1)) }}" name="penalty" min="0"
                            step="0.001" />
                        @error('penalty')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3">
                        <x-label for="note_to_bill">
                            Note
                        </x-label>
                        <textarea class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300
appearance-none
dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600
peer" placeholder="Put your notes here."
                            name="note_to_bill">{{ $note_to_bill }}</textarea>
                        @error('note_to_bill')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- @if($tenant->email)
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3">
                        <div class="form-check">
                            <input
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" name="sendBills" id="flexCheckChecked" checked>
                            <label class="form-check-label inline-block text-gray-700" for="flexCheckChecked">
                                Send unpaid bills to {{ $tenant->email }}.
                            </label>
                        </div>
                    </div>
                </div>
                @endif --}}
                <div class="mt-5">
                    <p class="text-right">
                        <x-form-button>Export</x-form-button>
                    </p>
                </div>
            </form>

        </div>
        </form>

    </div>
</div>
</div>