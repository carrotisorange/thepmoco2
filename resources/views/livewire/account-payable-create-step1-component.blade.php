<div>
    <div class=" mt-5 px-4 sm:px-6 lg:px-8">
        {{-- <div class="flex justify-end">
            <button type="button" wire:click="exportStep1()"
                class="mb-4 bg-white py-2 px-4 underline rounded-md text-sm font-medium text-gray-700 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Export</button>
        </div> --}}
        {{-- start-step-1-form --}}
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">

            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="sm:col-span-7">
                    <label for="" class="block text-sm font-medium text-gray-700"></label>

                </div>

                {{-- request for purchase --}}
                <div class="sm:col-span-2">
                    <label for="request_for" class="block text-sm font-medium text-gray-700">Request for: </label>
                    <select wire:model="request_for"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">

                        <option value="{{ $request_for }}">{{ $request_for }}</option>
                    </select>
                    @error('request_for')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- creation date --}}
                <div class="sm:col-span-2">
                    <label for="creation-date" class="block text-sm font-medium text-gray-700">Creation Date:</label>
                    <input type="date" wire:model="created_at" name="creation-date"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- requester's name --}}
                <div class="sm:col-span-2">
                    <label for="requester" class="block text-sm font-medium text-gray-700">Requester's Name:</label>
                    <select id="requester_id" wire:model="requester_id"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                        <option value="{{ $requester_id }}">{{ auth()->user()->name }}</option>
                    </select>
                    @error('requester_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-6">
                    <label for="particular" class="block text-sm font-medium text-gray-700"><b>Please add the particulars</b></label>
                </div>

                <div class="sm:col-span-6">
                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                        <form class="mt-5 sm:pb-6 xl:pb-8">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>

                                        <x-th>ITEM </x-th>
                                        <x-th>QUANTITY</x-th>
                                        <x-th></x-th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <x-td>
                                            <input type="text" wire:model="particular" rows="3"
                                                class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                            @error('particular')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </x-td>
                                        <x-td>
                                            <input type="number" step="0.001" min="1" wire:model="quantity" rows="3"
                                                class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                            @error('quantity')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </x-td>
                                        <x-td>
                                            {{-- <button type="button" wire:click="addParticular()"
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">


                                                Add
                                            </button> --}}
                                        </x-td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                {{--
                <div class="sm:col-span-2">
                    <label for="particular" class="block text-sm font-medium text-gray-700">Item:</label>
                    <input type="text" wire:model="particular" rows="3"
                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('particular')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="sm:col-span-2">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                    <input type="number" step="0.001" min="1" wire:model="quantity" rows="3"
                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('quantity')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                --}}


                {{-- cancel, next button --}}
                <div class="col-start-6 flex items-center justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/{{ Session::get('property') }}/accountpayable">
                        Cancel
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
                        Next
                    </button>
                </div>

            </div>
        </form>
        {{-- end-step-1-form --}}
    </div>
</div>