<div>
    @section('styles')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    @endsection
    @include('layouts.notifications')
    <div class=" mt-5 px-4 sm:px-6 lg:px-8">

        {{-- start-step-1-form --}}
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">

            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="sm:col-span-7">
                    <label for="" class="block text-sm font-medium text-gray-700"></label>

                </div>

                {{-- request for purchase --}}
                <div class="sm:col-span-6">
                    <label for="request_for" class="block text-sm font-medium text-gray-700">Request for</label>
                    <select wire:model="request_for"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">

                        <option value="payment" {{ old('request_for', $request_for)=='payment' ? 'selected' : 'selected'
                            }}>
                            payment
                        </option>
                        <option value="purchase" {{ old('request_for', $request_for)=='purchase' ? 'selected'
                            : 'selected' }}>
                            purchase
                        </option>
                    </select>
                    @error('request_for')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- creation date --}}
                <div class="sm:col-span-2">
                    <label for="created_at" class="block text-sm font-medium text-gray-700">Request Date</label>
                    <input type="date" wire:model="created_at" name="created_at"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                    <input type="date" wire:model="due_date" name="due_date"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('due_date')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- requester's name --}}
                <div class="sm:col-span-2">
                    <label for="requester" class="block text-sm font-medium text-gray-700">Requester's Name</label>
                    <select id="requester_id" wire:model="requester_id"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                        <option value="{{ $requester_id }}">{{ App\Models\User::find($requester_id)->name }}</option>
                    </select>
                    @error('requester_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @if($particulars->count())
                <div class="sm:col-span-6">
                    {{-- <label for="particular" class="block text-sm font-medium text-gray-700"><b>Add all the
                            particulars here</b></label> --}}
                    <button type="button" wire:loading.remove wire:click="addNewParticular"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                        Add new particular
                    </button>

                    <button type="button" data-modal-toggle="instructions-create-vendor-modal" wire:loading.remove
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                        Add new vendor
                    </button>
                    <button type="button" wire:loading disabled
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                        Loading...
                    </button>
                </div>
                @endif

                <div class="sm:col-span-6">
                    <div class="flex justify-end">

                    </div>
                    <div class="mb-5 mt-2 relative overflow-hidden ring-opacity-5 md:rounded-lg">

                        <form class="mt-5 sm:pb-6 xl:pb-8">
                            @if($particulars->count())
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>UNIT</x-th>
                                        <x-th>VENDOR</x-th>
                                        <x-th>ITEM </x-th>
                                        <x-th>QUANTITY</x-th>
                                        {{-- @if($request_for === 'payment') --}}
                                        <x-th>Price</x-th>
                                        <x-th>Total</x-th>
                                        {{-- <x-th>Upload file</x-th> --}}
                                        {{-- @endif --}}
                                        <x-th></x-th>
                                        <x-th></x-th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($particulars as $index => $particular)
                                    <div wire:key="particular-field-{{ $particular->id }}">
                                        <tr>
                                            <x-td>{{ $index+1 }}</x-td>
                                            <x-td>
                                                <select wire:model="particulars.{{ $index }}.unit_uuid"
                                                    wire:change="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                    <option value="" selected>Select a unit</option>
                                                    @foreach ($units as $unit)
                                                    <option value="{{ $unit->uuid }}" {{ 'particulars'
                                                        .$index.'unit_uuid'===$unit->uuid? 'selected' : '' }}>
                                                        {{ $unit->building->building .'-'.$unit->unit }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('particulars.{{ $index }}.unit_uuid')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            <x-td>
                                                <select wire:model="particulars.{{ $index }}.vendor_id"
                                                    wire:change="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                    <option value="" selected>Select a unit</option>
                                                    @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}" {{ 'particulars'
                                                        .$index.'vendor_id'===$vendor->id? 'selected' : '' }}>{{
                                                        $vendor->biller }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('particulars.{{ $index }}.unit_uuid')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            <x-td>
                                                <input type="text" wire:model="particulars.{{ $index }}.item"
                                                    wire:keyup="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                @error('particulars.{{ $index }}.item')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            <x-td>
                                                <input type="number" wire:model="particulars.{{ $index }}.quantity"
                                                    wire:keyup="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                @error('particulars.{{ $index }}.quantity')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            {{-- @if($request_for === 'payment') --}}
                                            <x-td>
                                                <input type="number" step="0.001"
                                                    wire:model="particulars.{{ $index }}.price"
                                                    wire:keyup="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                @error('particulars.{{ $index }}.price')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            <x-td>
                                                <input type="number"
                                                    value="{{ $particular->quantity * $particular->price }}" readonly
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">

                                            </x-td>
                                            <x-td>
                                                {{-- <button type="button"
                                                    wire:click="updateParticular({{ $particular->id }})"
                                                    wire:loading.remove wire:target="updateParticular"
                                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                                    Save
                                                </button>
                                                <button type="button" wire:loading disabled
                                                    wire:target="updateParticular"
                                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                                    Loading...
                                                </button> --}}
                                            </x-td>

                                            {{-- @endif --}}
                                            <x-td>
                                                <button type="button"
                                                    wire:click="removeParticular({{ $particular->id }})"
                                                    wire:loading.remove wire:target="removeParticular"
                                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                                    Remove
                                                </button>
                                                <button type="button" wire:loading disabled
                                                    wire:target="removeParticular" wire:target="removeParticular"
                                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                                    Loading...
                                                </button>
                                                @include('layouts.notifications')
                                            </x-td>
                                        </tr>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-semibold text-gray-900">No particulars</h3>
                                <p class="mt-1 text-sm text-gray-500">Get started by adding a new particular.</p>
                                <div class="mt-6">
                                    <button type="button" wire:loading.remove wire:click="addNewParticular"
                                        class="inline-flex items-center rounded-md bg-purple-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path
                                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                        </svg>
                                        New particular
                                    </button>
                                    <button type="button" wire:loading disabled wire:target="addNewParticular" disabled
                                        class="inline-flex items-center rounded-md bg-purple-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">

                                        Loading...
                                    </button>
                                </div>
                            </div>
                            @endif
                        </form>

                    </div>
                </div>


                <div class="sm:col-span-6">
                    <label for="vendor" class="block text-sm font-medium text-gray-700">Bank Details</label>
                </div>

                <div class="sm:col-span-2">
                    <label for="bank" class="block text-sm font-medium text-gray-700">Bank</label>
                    <input type="text" wire:model="bank"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('bank')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name</label>
                    <input type="text" wire:model="bank_name"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('bank_name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="bank_account" class="block text-sm font-medium text-gray-700">Bank Account</label>
                    <input type="text" wire:model="bank_account"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('bank_account')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="sm:col-span-7">
                    <label for="" class="block text-sm font-medium text-gray-700">Please upload the
                        quotations/bills</label>

                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation/Bill 1</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation1"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span wire:loading.remove>Upload a file</span>
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation1" wire:model="quotation1" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation1)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation1')">Remove the attachment
                                            .</a></span>
                                    @endif

                                </label>

                            </div>

                            @error('quotation1')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($quotation1)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation/Bill 2 </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation2"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span wire:loading.remove>Upload a file</span>
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation2" wire:model="quotation2" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation2)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation2')">Remove the attachment
                                            .</a></span>
                                    @endif

                                </label>

                            </div>

                            @error('quotation2')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($quotation2)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation/Bill 3</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation3"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span wire:loading.remove>Upload a file</span>
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation3" wire:model="quotation3" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation3)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation3')">Remove the attachment
                                            .</a></span>
                                    @endif

                                </label>

                            </div>

                            @error('quotation3')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($quotation3)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-7">
                    <label for="" class="block text-sm font-medium text-gray-700">Selected Vendor Details:</label>

                </div>

                <div class="sm:col-span-6">
                    <label for="vendor" class="block text-sm font-medium text-gray-700">Select a quotation:</label>
                    <select id="selected_quotation" wire:model="selected_quotation"
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                        @if($quotation1 && !$quotation2 && !$quotation3)
                        <option value="quotation1">Quotation 1</option>
                        @elseif($quotation1 && $quotation2 && !$quotation3)
                        <option value="quotation1">Quotation 1</option>
                        <option value="quotation2">Quotation 2</option>
                        @elseif($quotation1 && $quotation2 && $quotation3)
                        <option value="quotation1">Quotation 1</option>
                        <option value="quotation2">Quotation 2</option>
                        <option value="quotation3">Quotation 3</option>
                        @else
                        <option value="">Please select one</option>
                        @endif

                    </select>
                    @error('selected_quotation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="vendor" class="block text-sm font-medium text-gray-700">Name of the vendor</label>
                    <input type="text" wire:model="vendor" rows="3"
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('vendor')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="delivery-date" class="block text-sm font-medium text-gray-700">Delivery Date</label>
                    <input type="date" wire:model="delivery_at"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('delivery_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-start-6 flex items-center justify-end">
                    <button type="submit" wire:loading.remove wire:click="cancelRequest" wire:target="cancelRequest"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Cancel
                    </button>
                    <button type="submit" wire:loading wire:target="cancelRequest" disabled
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        Loading...
                    </button>
                    <button type="submit" wire:loading wire:target="submitForm" disabled
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        Loading...
                    </button>
                    <button type="submit" wire:loading.remove wire:target="submitForm"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        Next
                    </button>
                </div>

            </div>
            @include('modals.instructions.create-vendor-modal')
        </form>
       
    </div>

</div>
