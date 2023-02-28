<div>

    <div class="mt-5 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end">
            {{-- <button type="button" 
                class="mb-4 bg-white py-2 px-4 underline rounded-md text-sm font-medium text-gray-700 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Export</button> --}}
        </div>
        {{-- start-step-1-form --}}
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">

            <div class="md:grid md:grid-cols-6 md:gap-6">

                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Particulars</label>

                </div>

                <div class="sm:col-span-6">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>
                                <x-th>#</x-th>
                                <x-th>ITEM </x-th>
                                <x-th>QUANTITY</x-th>
                                @if($accountpayable->request_for === 'payment')
                                <x-th>Price</x-th>
                                <x-th>Total</x-th>
                                @endif

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($particulars as $index => $particular)
                            <div wire:key="particular-field-{{ $particular->id }}">
                                <tr>
                                    <x-td>{{ $index+1 }}</x-td>
                                    <x-td>
                                        {{ $particular->item }}
                                    </x-td>
                                    <x-td>
                                        {{ $particular->quantity }}
                                    </x-td>
                                    @if($accountpayable->request_for === 'payment')
                                    <x-td>
                                        {{ number_format($particular->price, 2) }}
                                    </x-td>
                                    <x-td>
                                        {{ number_format($particular->price * $particular->quantity, 2) }}
                                    </x-td>
                                    @endif

                                </tr>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- request for purchase --}}
                <div class="sm:col-span-6">
                    <label for="request" class="block text-sm font-medium text-gray-700">Request for: </label>
                    <input type="text" value="{{ $accountpayable->request_for }}" readonly
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                </div>


                {{-- creation date --}}
                <div class="sm:col-span-3">
                    <label for="creation-date" class="block text-sm font-medium text-gray-700">Request Date:</label>
                    <input type="text" value="{{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}"
                        readonly
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                </div>

                <div class="sm:col-span-3">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date:</label>
                    <input type="text" value="{{ Carbon\Carbon::parse($accountpayable->due_date)->format('M d, Y') }}"
                        
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                </div>



                {{-- requester's name --}}
                <div class="sm:col-span-3">
                    <label for="requester" class="block text-sm font-medium text-gray-700">Requester's Name:</label>
                    <input type="text" value="{{ App\Models\User::find($accountpayable->requester_id)->name     }}"
                        readonly
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                </div>




                {{-- price --}}
                <div class="sm:col-span-3">
                    <label for="price" class="block text-sm font-medium text-gray-700">Amount:</label>
                    <input type="text" value="{{ number_format($accountpayable->amount, 2) }}" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                </div>


                {{-- vendor details --}}
                <div class="sm:col-span-3">
                    <label for="vendor" class="block text-sm font-medium text-gray-700">Vendor Details:</label>
                    <input type="text" value="{{ $accountpayable->vendor }}" wire:model="vendor"
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                </div>

                {{-- delivery date --}}
                <div class="sm:col-span-3">
                    <label for="delivery-date" class="block text-sm font-medium text-gray-700">Delivery Date:</label>
                    <input type="date" wire:model="delivery_at"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('delivery_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- cancel & next button --}}
                <div class="col-start-6 flex items-center justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/{{ $property_uuid }}/accountpayable/{{ $accountpayable_id }}/step-">
                        Back
                    </a>
                    <button
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