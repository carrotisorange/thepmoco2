<div>
    <div class=" mt-5 px-4 sm:px-6 lg:px-8">
        <form class="space-y-6" wire:submit.prevent="submitForm">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="sm:col-span-6">
                    <x-label for="request_for" >Request for</x-label>
                    <x-form-input type="text" wire:model="request_for" name="request_for" readonly />
                    <x-validation-error-component name='request_for' />
                </div>
                <div class="sm:col-span-3">
                    <x-label for="created_at" >Request Date</x-label>
                    <x-form-input type="date" wire:model="created_at" name="created_at" />
                    <x-validation-error-component name='created_at' />
                </div>
                <div class="sm:col-span-3">
                    <x-label for="due_date" >Due Date</x-label>
                    <x-form-input type="date" wire:model="due_date" name="due_date" />
                    <x-validation-error-component name='due_date' />
                </div>
                <div class="sm:col-span-2">
                    <x-label for="requester" >Requester</x-label>
                    <x-form-select id="requester_id" name="requester_id" wire:model="requester_id" >
                        <option value="{{ $requester_id }}">{{ App\Models\User::find($requester_id)->name }}</option>
                    </x-form-select>
                    <x-validation-error-component name='requester_id' />
                </div>
                <div class="sm:col-span-2">
                    <x-label for="first_approver" >1st Approver
                        (Manager)</x-label>
                    <x-form-select id="first_approver" name="first_approver" wire:model="first_approver" >
                        <option value="">Select one</option>
                        @foreach ($firstApprovers as $firstApprover)
                        <option value="{{ $firstApprover->user_id }}">{{ $firstApprover->user->name }}</option>
                        @endforeach
                    </x-form-select>
                    <x-validation-error-component name='first_approver' />
                </div>
                <div class="sm:col-span-2">
                    <x-label for="requester" >2nd Approver (Account
                        Payable)</x-label>
                    <x-form-select id="second_approver" name="second_approver" wire:model="second_approver" >
                        <option value="">Select one</option>
                        @foreach ($secondApprovers as $secondApprover)
                        <option value="{{ $secondApprover->user_id }}">{{ $secondApprover->user->name }}</option>
                        @endforeach
                    </x-form-select>
                    <x-validation-error-component name='second_approver' />
                </div>
                @if($particulars->count())
                <div class="sm:col-span-6">
                    <p class="text-right">
                        <x-button data-modal-toggle="instructions-create-vendor-modal">
                            New vendor
                        </x-button>
                        <x-button wire:click="addNewParticular">
                            New Item
                        </x-button>
                    </p>
                </div>
                @endif
                <div class="sm:col-span-6">
                    <div class="mb-5 mt-2 relative overflow-auto ring-opacity-5 md:rounded-lg">
                        @if($particulars->count())
                            <x-table-component>
                                <x-table-head-component>
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>UNIT</x-th>
                                        <x-th>VENDOR</x-th>
                                        <x-th>ITEM </x-th>
                                        <x-th>QUANTITY</x-th>
                                        <x-th>PRICE</x-th>
                                        <x-th>TOTAL</x-th>
                                        <x-th></x-th>
                                    </tr>
                                </x-table-head-component>
                                <x-table-body-component>
                                    @foreach($particulars as $index => $particular)
                                    <div wire:key="particular-field-{{ $particular->id }}">
                                        <tr>
                                            <x-td>{{ $index+1 }}</x-td>
                                            <x-td>
                                                <x-form-select wire:model="particulars.{{ $index }}.unit_uuid"
                                                    wire:change="updateParticular({{ $particular->id }})">
                                                    <option value="" selected>Select a unit</option>
                                                    @foreach ($units as $unit)
                                                    <option value="{{ $unit->uuid }}" {{ 'particulars'
                                                        .$index.'unit_uuid'===$unit->uuid? 'selected' : '' }}>
                                                        {{ $unit->building->building .'-'.$unit->unit }}
                                                    </option>
                                                    @endforeach
                                                </x-form-select>
                                            </x-td>
                                            <x-td>
                                                <x-form-select wire:model="particulars.{{ $index }}.vendor_id"
                                                    wire:change="updateParticular({{ $particular->id }})">
                                                    <option value="" selected>Select a unit</option>
                                                    @foreach ($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}" {{ 'particulars'
                                                        .$index.'vendor_id'===$vendor->id? 'selected' : '' }}>{{
                                                        $vendor->biller }}
                                                    </option>
                                                    @endforeach
                                                </x-form-select>
                                            </x-td>
                                            <x-td>
                                                <x-form-input name="item" type="text"
                                                    wire:model="particulars.{{ $index }}.item"
                                                    wire:change="updateParticular({{ $particular->id }})" />

                                            </x-td>
                                            <x-td>
                                                <x-form-input type="number"
                                                    wire:model="particulars.{{ $index }}.quantity"
                                                    wire:change="updateParticular({{ $particular->id }})" />

                                            </x-td>
                                            {{-- @if($request_for === 'payment') --}}
                                            <x-td>
                                                <x-form-input type="number" step="0.001"
                                                    wire:model="particulars.{{ $index }}.price"
                                                    wire:change="updateParticular({{ $particular->id }})" />

                                            </x-td>
                                            <x-td>
                                                {{ number_format((double) $particular->quantity *
                                                (double)$particular->price,2)}}
                                            </x-td>
                                            {{-- @endif --}}
                                            <x-td>
                                                <x-button class="bg-red-500" type="button"
                                                    wire:click="removeParticular({{ $particular->id }})">
                                                    Delete
                                                </x-button>
                                            </x-td>
                                        </tr>
                                    </div>
                                    @endforeach
                                    <tr>
                                        <x-td><b>Total</b></x-td>
                                        <x-th></x-th>
                                        <x-th></x-th>
                                        <x-th></x-th>
                                        <x-th></x-th>
                                        <x-th></x-th>
                                        <x-td><b>{{ number_format((double) $amount, 2)}}</b></x-td>
                                        <x-th></x-th>
                                    </tr>
                                </x-table-body-component>
                            </x-table-component>
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
                                    <x-button wire:click="addNewParticular">
                                        New particular
                                    </x-button>

                                </div>
                            </div>
                            @endif
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <x-label for="vendor" >Bank Details</x-label>
                </div>
                <div class="sm:col-span-2">
                    <x-label for="bank" >Bank</x-label>
                    <x-form-input type="text" wire:model="bank" />
                    <x-validation-error-component name='bank' />
                </div>
                <div class="sm:col-span-2">
                    <x-label for="bank_name" >Bank Name</x-label>
                    <x-form-input type="text" wire:model="bank_name" />
                    <x-validation-error-component name='bank_name' />
                </div>
                <div class="sm:col-span-2">
                    <x-label for="bank_account" >Bank Account</x-label>
                    <x-form-input type="text" wire:model="bank_account" />
                    <x-validation-error-component name='bank_account' />
                </div>
                <div class="sm:col-span-7">
                    <x-label for="" >Please upload the  quotations/bills</x-label>
                </div>
                <div class="sm:col-span-2">
                    <x-label> Quotation/Bill 1</x-label>
                    <div  class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                              <label for="quotation1"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                @if(!$quotation1)
                                <span wire:loading.remove>Upload a file</span>
                                @else
                                <span wire:loading.remove><a target="_blank" href="{{ asset('/storage/'.$accountpayable->quotation1) }}">View
                                        Quotation/Bill 1</a></span>
                                @endif
                                <span wire:loading>Loading...</span>
                                <input id="quotation1" wire:model="quotation1" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($quotation1)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeQuotation('quotation1')">Remove the attachment</a></span>
                                @endif
                            </label>

                            </div>
                         <x-validation-error-component name='quotation1' />
                            @if ($quotation1)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

               <div class="sm:col-span-2">
                    <x-label> Quotation/Bill 2</x-label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation2"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    @if(!$quotation2)
                                    <span wire:loading.remove>Upload a file</span>
                                    @else
                                    <span wire:loading.remove><a target="_blank"
                                            href="{{ asset('/storage/'.$accountpayable->quotation2) }}">View
                                            Quotation/Bill 2</a></span>
                                    @endif
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation2" wire:model="quotation2" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation2)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation2')">Remove the attachment</a></span>
                                    @endif
                                </label>

                            </div>
                            <x-validation-error-component name='quotation2' />
                            @if ($quotation2)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
               <div class="sm:col-span-2">
                    <x-label> Quotation/Bill 3</x-label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation3"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    @if(!$quotation3)
                                    <span wire:loading.remove>Upload a file</span>
                                    @else
                                    <span wire:loading.remove><a target="_blank"
                                            href="{{ asset('/storage/'.$accountpayable->quotation3) }}">View
                                            Quotation/Bill 2</a></span>
                                    @endif
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation3" wire:model="quotation3" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation3)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation3')">Remove the attachment</a></span>
                                    @endif
                                </label>
                            </div>
                            <x-validation-error-component name='quotation3' />
                            @if ($quotation3)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-7">
                    <x-label>Selected Vendor Details</x-label>
                </div>
                <div class="sm:col-span-6">
                    <x-label for="vendor">Select a quotation:</x-label>
                    <x-form-select id="selected_quotation" wire:model="selected_quotation">
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
                    </x-form-select>
                    <x-validation-error-component name='selected_quotation' />
                </div>
                <div class="sm:col-span-3">
                    <x-label for="vendor">Name of the vendor</x-label>
                    <x-form-input type="text" wire:model="vendor" />
                    <x-validation-error-component name='vendor' />
                </div>
                <div class="sm:col-span-3">
                    <x-label for="delivery-date">Delivery Date</x-label>
                    <x-form-input type="date" wire:model="delivery_at" />
                    <x-validation-error-component name='delivery_at' />
                </div>
                <div class="col-start-6 flex items-center justify-end">
                    <x-button class="bg-red-500" wire:click="cancelRequest">Cancel</x-button>
                    &nbsp;
                    <x-button type="submit"> Confirm  </x-button>
                </div>
            </div>
        </form>
    </div>
    @include('modals.instructions.create-vendor-modal')
</div>
