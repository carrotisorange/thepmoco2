<div>
    <div class="max-full mx-auto sm:px-6">
        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="/property/{{ Session::get('property_uuid') }}/collection/pending"><img class="h-5 w-auto"
                                src="{{ asset('/brands/back-button.png') }}"></a>
                    </div>
                </li>
            </ol>
        </nav>
      
            <div class="mt-5 px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-semibold text-gray-700 mt-5">Verify Payments</h1>
                        {{-- <h1 class="text-3xl font-bold text-gray-700 ">Batch #: {{ $paymentRequest->batch_no }}</h1>
                        --}}
                    </div>
                </div>
                <form wire:click.prevent="payBills">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
    
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="created_at" class="block text-sm font-medium text-gray-700">Date:</label>
                                    <input type="text" name="created_at" id="created_at" autocomplete="created_at" readonly
                                        value={{ Carbon\Carbon::parse($paymentRequest->created_at) }}
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
                                    sm:text-sm border border-gray-700 rounded-md">
                                </div>
    
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="tenant_uuid" class="block text-sm font-medium text-gray-700">
                                        Tenant</label>
                                    <input type="text" name="tenant_uuid" id="tenant_uuid" readonly
                                        autocomplete="tenant_uuid" value="{{ $paymentRequest->tenant->tenant }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                </div>
    
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">
                                        Status
                                    </label>
                                    <input type="text" name="status" id="status" autocomplete="status" value={{
                                        $paymentRequest->status }}
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm
                                    sm:text-sm border border-gray-700 rounded-md">
                                </div>
    
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="email-address"
                                        class="block text-sm font-medium text-gray-700">Amount</label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="number"
                                        readonly value="{{ $paymentRequest->amount }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                </div>
    
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="concern" class="block text-sm font-medium text-gray-700">Mode of
                                        Payment:</label>
    
                                    <select name="mode_of_payment" id="mode_of_payment" autocomplete="mode_of_payment"
                                        readonly
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                        <option value="bank" {{ $paymentRequest->mode_of_payment =='bank' ?
                                            'selected':
                                            'Select one' }}>
                                            bank
                                        </option>
                                        <option value="cash" {{ $paymentRequest->mode_of_payment =='cash' ?
                                            'selected':
                                            'Select one' }}>
                                            cash
                                        </option>
                                        <option value="cheque" {{ $paymentRequest->mode_of_payment =='cheque' ?
                                            'selected': 'Select one' }}>
                                            cheque
                                        </option>
                                        <option value="e-wallet" {{ $paymentRequest->mode_of_payment =='e-wallet' ?
                                            'selected': 'Select one' }}>
                                            e-wallet
                                        </option>
                                    </select>
                                </div>
    
    
                                <div class="sm:col-span-3">
                                    <label for="concern" class="block text-sm font-medium text-gray-700">Proof of
                                        payment</label>
                                    <div class="mt-1">
                                        @if(!$paymentRequest->proof_of_payment == null)
    
                                        <a href="{{ asset('/storage/'.$paymentRequest->proof_of_payment) }}" target="_blank"
                                            class="text-indigo-600 hover:text-indigo-900">View
                                            Attachment</a>
    
    
                                        {{-- <a
                                            href="/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/payments_request/{{ $paymentRequest->id }}/download"
                                            class="text-indigo-600 hover:text-indigo-900">View Attachment</a> --}}
                                        @endif
                                    </div>
    
                                </div>
    
    
    
                                <div class="sm:col-span-3">
                                    <fieldset>
                                        <div>
                                            <label for="bill_nos" class="block text-sm font-medium text-gray-700">
                                                Bills Nos to be paid
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="bill_nos" name="bill_nos" rows="3" reaadonly
                                                    class="h-8 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                                    placeholder="">
                                                    {{ $paymentRequest->bill_nos }}
                                                </textarea>
                                            </div>
                                        </div>
    
    
                                </div>
    
                                <div class="sm:col-span-6">
                                    <fieldset>
                                        <div>
                                            <label for="reason_for_rejection"
                                                class="block text-sm font-medium text-gray-700">
                                                Remarks
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="reason_for_rejection" name="reason_for_rejection" rows="10"
                                                    required
                                                    class="h-8 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                                    placeholder="">
                                                                    {{ $paymentRequest->reason_for_rejection }}
                                                    </textarea>
                                            </div>
                                        </div>
    
    
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right sm:px-6">
                                <button type="button"
                                    onclick="window.location.href='/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/payments_request/{{ $paymentRequest->batch_no }}/deny'"
                                    class="inline-flex justify-end py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Deny</button>
    
                                {{-- <a
                                    class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline"
                                    target="_blank"
                                    href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $paymentRequest->tenant_uuid }}/bills">
                                    Pay Bills
                                </a> --}}
                                <button type="submit" class="inline-flex justify-end py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Pay
                                    Bills</button>
                            </div>
                        </div>
                </form>
            </div>
</div>
</div>
